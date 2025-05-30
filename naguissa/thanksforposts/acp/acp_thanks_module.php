<?php
/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @see https://github.com/Naguissa/thanks_for_posts
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace naguissa\thanksforposts\acp;

/**
 * @package acp
 */
class acp_thanks_module
{

	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $config, $request, $user, $phpbb_container, $template;

		$submit = $request->is_set_post('submit') ? true : false;

		$form_key = 'acp_thanks';
		add_form_key($form_key);
		/**
		 * 	Validation types are:
		 * 		string, int, bool,
		 * 		script_path (absolute path in url - beginning with / and no trailing slash),
		 * 		rpath (relative), rwpath (realtive, writable), path (relative path, but able to escape the root), wpath (writable)
		 */
		$display_vars = array(
			'title' => 'ACP_THANKS_SETTINGS',
			'vars' => array(
				'legend' => 'GENERAL_OPTIONS',
				'thanks_ajax' => array('lang' => 'THANKS_AJAX', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'remove_thanks' => array('lang' => 'REMOVE_THANKS', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_only_first_post' => array('lang' => 'THANKS_ONLY_FIRST_POST', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_post_view_guests' => array('lang' => 'THANKS_POST_VIEW_GUESTS', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_post_view_robots' => array('lang' => 'THANKS_POST_VIEW_ROBOTS', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_global_post' => array('lang' => 'THANKS_GLOBAL_POST', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_info_page' => array('lang' => 'THANKS_INFO_PAGE', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_postlist_view' => array('lang' => 'THANKS_POSTLIST_VIEW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_number_post' => array('lang' => 'THANKS_NUMBER_POST', 'validate' => 'int:1:250', 'type' => 'text:4:6', 'explain' => true),
				'thanks_time_view' => array('lang' => 'THANKS_TIME_VIEW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_counters_view' => array('lang' => 'THANKS_COUNTERS_VIEW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_profilelist_view' => array('lang' => 'THANKS_PROFILELIST_VIEW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'thanks_number' => array('lang' => 'THANKS_NUMBER', 'validate' => 'int:1', 'type' => 'text:4:4', 'explain' => true),
				'thanks_top_number' => array('lang' => 'THANKS_TOP_NUMBER', 'validate' => 'int:0', 'type' => 'text:4:6', 'explain' => true),
				'thanks_symbol_thanks' => array('lang' => 'THANKS_SYMBOL_THANKS', 'validate' => 'text:1:30', 'type' => 'text:10:30', 'explain' => true),
				'thanks_symbol_remove' => array('lang' => 'THANKS_SYMBOL_REMOVE', 'validate' => 'text:1:30', 'type' => 'text:10:30', 'explain' => true)
			)
		);

		if (isset($display_vars['lang']))
		{
			$user->add_lang($display_vars['lang']);
		}

		$this->new_config = $config;
		$cfg_array = utf8_normalize_nfc($request->raw_variable('config', array()));
		if ($cfg_array === array())
		{
			$cfg_array = $this->new_config;
		}
		$error = array();

		// We validate the complete config if whished
		validate_config_vars($display_vars['vars'], $cfg_array, $error);

		if ($submit && !check_form_key($form_key))
		{
			$error[] = $user->lang('FORM_INVALID');
		}
		// Do not write values if there is an error
		if (sizeof($error))
		{
			$submit = false;
		}

		// We go through the display_vars to make sure no one is trying to set variables he/she is not allowed to...
		foreach ($display_vars['vars'] as $config_name => $null)
		{
			if (!isset($cfg_array[$config_name]) || strpos($config_name, 'legend') !== false)
			{
				continue;
			}

			$this->new_config[$config_name] = $config_value = $cfg_array[$config_name];

			if ($submit)
			{
				$config->set($config_name, $config_value);
			}
		}

		if ($submit)
		{
			$phpbb_log = $phpbb_container->get('log');
			$phpbb_log->add('admin', $user->data['user_id'], $user->ip, 'LOG_CONFIG_' . strtoupper($mode));

			trigger_error($user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
		}

		$this->tpl_name = 'acp_thanks';
		$this->page_title = $display_vars['title'];

		$template->assign_vars(array(
			'L_TITLE' => $user->lang($display_vars['title']),
			'L_TITLE_EXPLAIN' => $user->lang($display_vars['title'] . '_EXPLAIN'),
			'L_ACP_THANKS_DB_VER' => $user->lang('ACP_THANKS_DB_VER'),
			'THANKS_DB_VERSION' => isset($config['thanks_for_posts_version']) ? $config['thanks_for_posts_version'] : false,
			'S_ERROR' => (sizeof($error)) ? true : false,
			'ERROR_MSG' => implode('<br />', $error),
			'U_ACTION' => $this->u_action)
		);

		// Output relevant page
		foreach ($display_vars['vars'] as $config_key => $vars)
		{
			if (!is_array($vars) && strpos($config_key, 'legend') === false)
			{
				continue;
			}

			if (strpos($config_key, 'legend') !== false)
			{
				$template->assign_block_vars('options', array(
					'S_LEGEND' => true,
					'LEGEND' => $user->lang($vars)
				));

				continue;
			}
			$type = explode(':', $vars['type']);

			$l_explain = '';
			if ($vars['explain'] && isset($vars['lang_explain']))
			{
				$l_explain = $user->lang($vars['lang_explain']);
			} else if ($vars['explain'])
			{
				$l_explain = $user->lang($vars['lang'] . '_EXPLAIN');
			}

			$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);

			if (empty($content))
			{
				continue;
			}

			$template->assign_block_vars('options', array(
				'KEY' => $config_key,
				'TITLE' => $user->lang($vars['lang']),
				'S_EXPLAIN' => $vars['explain'],
				'TITLE_EXPLAIN' => $l_explain,
				'CONTENT' => $content,
					)
			);

			unset($display_vars['vars'][$config_key]);
		}
	}

}
