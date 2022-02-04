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
	 * @param string                               $php_ext               phpEx
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, \phpbb\cache\driver\driver_interface $cache, \phpbb\pagination $pagination, \phpbb\profilefields\manager $profilefields_manager, \phpbb\request\request_interface $request, \phpbb\controller\helper $controller_helper, $thanks_table, $users_table, $phpbb_root_path, $php_ext)
	{
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
	}

	protected function _thank($target, $env, $extra)
	{
		return new JsonResponse(array("a" => 2));
	}

	protected function _rthank($target, $env, $extra)
	{

	}

	public function main()
	{

		$action = $this->request->variable('action', null, true, \phpbb\request\request_interface::POST);
		switch ($action)
		{
			case "thank":
				return $this->_thank($target, $env, $extra);
				break;
			case "rthank":
				return $this->_rthank($target, $env, $extra);
				break;
			default:
				return new JsonResponse(array(
					'action' => $action,
					'target' => $target,
					'env' => $env,
					'extra' => $extra,
					'hola' => $this->request->variable('hola', "no", true, \phpbb\request\request_interface::POST)
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
