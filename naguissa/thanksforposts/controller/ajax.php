<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace naguissa\thanksforposts\controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class ajax {

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\pagination */
	protected $pagination;

	/** @var \phpbb\profilefields\manager */
	protected $profilefields_manager;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var string THANKS_TABLE */
	protected $thanks_table;

	/** @var string USERS_TABLE */
	protected $users_table;

	/** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/** @var string phpEx */
	protected $php_ext;

	/** @var \naguissa\thanksforposts\core\helper */
	protected $helper;

	/** @var \naguissa\thanksforposts\core\template */
	protected $partials;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config                 $config                Config object
	 * @param \phpbb\db\driver\driver_interface    $db                    DBAL object
	 * @param \phpbb\auth\auth                     $auth                  Auth object
	 * @param \phpbb\template\template             $template              Template object
	 * @param \phpbb\user                          $user                  User object
	 * @param \phpbb\cache\driver\driver_interface $cache                 Cache driver object
	 * @param \phpbb\pagination                    $pagination            Pagination object
	 * @param \phpbb\profilefields\manager         $profilefields_manager Profile fields manager object
	 * @param \phpbb\request\request_interface     $request               Request object
	 * @param \phpbb\controller\helper             $controller_helper     Controller helper object
	 * @param string                               $thanks_table          THANKS_TABLE
	 * @param string                               $users_table           USERS_TABLE
	 * @param string                               $phpbb_root_path       phpbb_root_path
	 * @param \naguissa\thanksforposts\core\helper $helper                The extension helper object
	 * @param \naguissa\thanksforposts\core\partials $partials            RenderPartial functionality
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, \phpbb\cache\driver\driver_interface $cache, \phpbb\pagination $pagination, \phpbb\profilefields\manager $profilefields_manager, \phpbb\request\request_interface $request, \phpbb\controller\helper $controller_helper, $thanks_table, $users_table, $phpbb_root_path, $php_ext, $helper, $partials) {
		$this->config = $config;
		$this->db = $db;
		$this->auth = $auth;
		$this->template = $template;
		$this->user = $user;
		$this->cache = $cache;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
		$this->pagination = $pagination;
		$this->profilefields_manager = $profilefields_manager;
		$this->request = $request;
		$this->controller_helper = $controller_helper;
		$this->thanks_table = $thanks_table;
		$this->users_table = $users_table;
		$this->helper = $helper;
		$this->partials = $partials;
	}

	protected function _thank() {
		$post_id = $this->request->variable('pid', 0);
		$forum_id = $this->request->variable('fid', 0);
		return $this->helper->insert_thanks($post_id, $this->user->data['user_id'], $forum_id, true);
	}

	protected function _rthank() {
		$post_id = $this->request->variable('pid', 0);
		$forum_id = $this->request->variable('fid', 0);
		return $this->helper->delete_thanks($post_id, $forum_id, true);
	}

	public function main() {
		$result = false;
		$error = $this->user->lang('THANKS_AJAX_NOT_LOGGED');
		if ($this->user->data['user_type'] != USER_IGNORE) {
			$action = $this->request->variable('action', "empty", true, \phpbb\request\request_interface::POST);
			switch ($action) {
				case "thanks":
					$result = $error = $this->_thank();
					break;
				case "rthanks":
					$result = $error = $this->_rthank();
					break;
				default:
					$error = $this->user->lang('THANKS_AJAX_NOT_ACTION') . ' ' . $action;
			}
		}

		if ($result === true) {
			$post_id = $this->request->variable('pid', 0);
			$forum_id = $this->request->variable('fid', 0);
			$this->helper->array_all_thanks(array($post_id), $forum_id);
			$postrow = $this->helper->get_post_row($post_id);
			$postinfo = $this->helper->get_post_info($post_id);
			$row = array_merge(
					$this->helper->get_topic_info($postrow['topic_id']),
					$postinfo
			);
			$row["username"] = $row["post_username"] = $postrow["username"];
			$row["user_colour"] = $postrow["user_colour"];
			$this->helper->output_thanks($this->request->variable('to_id', 0), $postrow, $row, $row, $this->request->variable('fid', 0));
			$template_vars = array(
				"postrow" => $postrow,
				'S_FORUM_THANKS' => (bool) ($this->auth->acl_get('f_thanks', $forum_id)),
				'S_USER_LOGGED_IN' => ($this->user->data['user_type'] != USER_IGNORE)
			);
			$template_vars["postrow"]["POST_ID"] = $postrow["post_id"];
			$template_vars["postrow"]["POST_AUTHOR"] = $this->helper->get_username_string('username', $postrow['poster_id']);
			$template_vars["postrow"]["POST_AUTHOR_FULL"] = $this->helper->get_username_string('full', $postrow['poster_id']);
			return new JsonResponse(array(
				"result" => 1,
				"update" => array(
					"app_list_thanks_" . $post_id => $this->partials->renderPartial('event/viewtopic_body_postrow_post_notices_after.html', $template_vars),
					"app_thanks_button_" . $post_id => $this->partials->renderPartial('event/viewtopic_body_post_buttons_after.html', $template_vars)
				)
			));
		} else {
			return new JsonResponse(array(
				'result' => 0,
				'error' => $error
			));
		}


		/*
		  $this->template->assign_vars(array(
		  'TOTAL_POSTS'	=> $this->user->lang('TOTAL_POSTS_COUNT', (int) $this->config['num_posts']),
		  'TOTAL_TOPICS'	=> $this->user->lang('TOTAL_TOPICS', (int) $this->config['num_topics']),
		  'TOTAL_USERS'	=> $this->user->lang('TOTAL_USERS', (int) $this->config['num_users']),
		  'NEWEST_USER'	=> $this->user->lang('NEWEST_USER', get_username_string('full', $this->config['newest_user_id'], $this->config['newest_username'], $this->config['newest_user_colour'], false, append_sid("{$this->root_path}memberlist.{$this->php_ext}", 'mode=viewprofile', true, false, true))),
		  ));

		  // Output page
		  page_header('');
		  $this->template->set_filenames(array(
		  'body' => 'ajax_base/statistics.html')
		  );
		  page_footer();
		 */
	}

}
