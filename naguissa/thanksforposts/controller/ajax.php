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

class ajax
{

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\auth\auth */
	protected $auth;

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
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\user $user, \phpbb\cache\driver\driver_interface $cache, \phpbb\pagination $pagination, \phpbb\profilefields\manager $profilefields_manager, \phpbb\request\request_interface $request, \phpbb\controller\helper $controller_helper, $thanks_table, $users_table, $phpbb_root_path, $php_ext, $helper, $partials)
	{
		$this->config = $config;
		$this->db = $db;
		$this->auth = $auth;
		$this->partials = $partials;
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
	}

	protected function _thank()
	{
		return $this->helper->insert_thanks($this->request->variable('pid', 0), $this->user->data['user_id'], $this->request->variable('fid', 0), true);
	}

	protected function _rthank()
	{
		return $this->helper->delete_thanks($this->request->variable('pid', 0), $this->request->variable('fid', 0), true);
	}

	public function main()
	{
		$result = false;
		$error = $this->user->lang('THANKS_AJAX_NOT_LOGGED');
		if ($this->user->data['user_type'] != USER_IGNORE)
		{
			$action = $this->request->variable('action', "empty", true, \phpbb\request\request_interface::POST);
			switch ($action)
			{
				case "thank":
					$result = $error = $this->_thank();
					break;
				case "rthank":
					$result = $error = $this->_rthank();
					break;
				default:
					$error = $this->user->lang('THANKS_AJAX_NOT_ACTION') . ' ' . $action;
			}
		}

		if ($result === true)
		{
			$this->partials->assign_vars(array(
				'TOTAL_USERS' => 'a',
				'U_THANKS' => 'b',
				'S_THANKS' => 'c',
				'STAR_RATING' => array('full', 'full', 'middle')
			));
			return new JsonResponse(array(
				"result" => 1,
//				"test" => $this->partials->renderPartial('event/viewtopic_body_postrow_custom_fields_after.html'/* , $this->template->get_template_vars() */)
				"test" => $this->partials->renderPartial('partials/star_rating.html')
			));
		} else
		{
			return new JsonResponse(array(
				'result' => 0,
				'error' => $error
				// DEBUG
				,
				'pid' => $this->request->variable('pid', 0),
				'uid' => $this->user->data['user_id'],
				'fid' => $this->request->variable('fid', 0)
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
