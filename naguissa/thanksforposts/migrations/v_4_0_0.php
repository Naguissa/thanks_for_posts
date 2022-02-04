<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace naguissa\thanksforposts\migrations;

class v_4_0_0 extends \phpbb\db\migration\migration
{

	public function effectively_installed()
	{
		return isset($this->config['thanks_for_posts_version']) && version_compare($this->config['thanks_for_posts_version'], '4.4.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\dev');
	}

	public function update_schema()
	{

		if (!$this->db_tools->sql_table_exists($this->table_prefix . 'thanks'))
		{
			return array(
				'add_tables' => array(
					$this->table_prefix . 'thanks' => array(
						'COLUMNS' => array(
							'post_id' => array('UINT', 0),
							'poster_id' => array('UINT', 0),
							'user_id' => array('UINT', 0),
							'topic_id' => array('UINT', 0),
							'forum_id' => array('UINT', 0),
							'thanks_time' => array('UINT:11', 0)
						),
						'PRIMARY_KEY' => array('post_id', 'user_id'),
					)
				),
				'add_index' => array(
					$this->table_prefix . 'thanks' => array(
						'post_id' => array('post_id'),
						'topic_id' => array('topic_id'),
						'forum_id' => array('forum_id'),
						'user_id' => array('user_id'),
						'poster_id' => array('poster_id'),
					)
				)
			);
		} else
		{
			return array();
		}
	}

	public function update_notifications_serialization()
	{
		$types = array();
		$types[] = array(
			'notification_type_name_old' => 'thanks',
			'notification_type_name' => 'gfksx.thanksforposts.notification.type.thanks',
			'notification_type_name_new' => 'naguissa.thanksforposts.notification.type.thanks'
		);
		$types[] = array(
			'notification_type_name_old' => 'thanks_remove',
			'notification_type_name' => 'gfksx.thanksforposts.notification.type.thanks_remove',
			'notification_type_name_new' => 'naguissa.thanksforposts.notification.type.thanks_remove'
		);

		foreach ($types as $item)
		{
			$notification_type_name_old_mod = explode('type.', $item['notification_type_name']);
			// Migrate very old ones if exists
			$sql_update = "INSERT INTO" . NOTIFICATION_TYPES_TABLE . "
				SET notification_type_name = '" . $this->db->sql_escape($item['notification_type_name_new']) . "', notification_type_enabled = 1
				WHERE notification_type_name = '" . $this->db->sql_escape($notification_type_name_old_mod[1]) . "' OR notification_type_name = '" . $this->db->sql_escape($item['notification_type_name']) . "'";
			$this->db->sql_query($sql_update);

			$sql_update = 'UPDATE ' . USER_NOTIFICATIONS_TABLE . "
				SET item_type = '" . $this->db->sql_escape($item['notification_type_name_new']) . "'
				WHERE item_type = '" . $this->db->sql_escape($notification_type_name_old_mod[1]) . "' OR item_type = '" . $this->db->sql_escape($item['notification_type_name']) . "'";
			$this->db->sql_query($sql_update);
		}
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('if', array((!isset($this->config['thanks_number_post'])), array('config.add', array('thanks_number_post', 10)))),
			array('if', array((!isset($this->config['thanks_post_reput_view'])), array('config.add', array('thanks_post_reput_view', 1)))),
			array('if', array((!isset($this->config['thanks_topic_reput_view'])), array('config.add', array('thanks_topic_reput_view', 1)))),
			array('if', array((!isset($this->config['thanks_forum_reput_view'])), array('config.add', array('thanks_forum_reput_view', 0)))),
			array('if', array((!isset($this->config['thanks_number_digits'])), array('config.add', array('thanks_number_digits', 2)))),
			array('if', array((!isset($this->config['thanks_number_row_reput'])), array('config.add', array('thanks_number_row_reput', 5)))),
			array('if', array((!isset($this->config['thanks_reput_graphic'])), array('config.add', array('thanks_reput_graphic', 1)))),
			array('if', array((!isset($this->config['thanks_time_view'])), array('config.add', array('thanks_time_view', 1)))),
			array('if', array((!isset($this->config['thanks_top_number'])), array('config.add', array('thanks_top_number', 0)))),
			array('if', array((!isset($this->config['thanks_global_announce'])), array('config.add', array('thanks_global_announce', 1)))),
			array('if', array((!isset($this->config['thanks_post_view_guests'])), array('config.add', array('thanks_post_view_guests', 1)))),
			array('if', array((!isset($this->config['thanks_post_view_robots'])), array('config.add', array('thanks_post_view_robots', 1)))),
			array('if', array((isset($this->config['thanks_reput_height'])), array('config.remove', array('thanks_reput_height', 15)))),
			array('if', array((isset($this->config['thanks_reput_level'])), array('config.remove', array('thanks_reput_level', 10)))),
			array('if', array((isset($this->config['thanks_reput_image'])), array('config.remove', array('thanks_reput_image')))),
			array('if', array((isset($this->config['thanks_reput_image_back'])), array('config.remove', array('thanks_reput_image_back')))),
			array('if', array((isset($this->config['thanks_forum_reput_view_column'])), array('config.remove', array('thanks_forum_reput_view_column', 0)))),
			array('if', array((isset($this->config['thanks_topic_reput_view_column'])), array('config.remove', array('thanks_topic_reput_view_column', 0)))),
			array('if', array((!isset($this->config['thanks_symbol_thanks'])), array('config.add', array('thanks_symbol_thanks', 'fa-thumbs-o-up')))),
			array('if', array((!isset($this->config['thanks_symbol_remove'])), array('config.add', array('thanks_symbol_remove', 'fa-recycle')))),
			// Add permissions
			array('permission.add', array('u_viewthanks', true)),
			array('permission.add', array('u_viewtoplist', true)),
			array('permission.add', array('m_thanks', true)),
			array('permission.add', array('f_thanks', true)),
			// Add permission sets
			array('permission.permission_set', array('REGISTERED', 'u_viewtoplist', 'group', true)),
			array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_viewtoplist', 'role', true)),
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_thanks', 'role', true)),
			array('permission.permission_set', array('GLOBAL_MODERATORS', 'm_thanks', 'group', true)),
			array('permission.permission_set', array('ROLE_FORUM_FULL', 'f_thanks', 'role', true)),
			array('permission.permission_set', array('ROLE_FORUM_POLLS', 'f_thanks', 'role', true)),
			array('permission.permission_set', array('ROLE_FORUM_LIMITED', 'f_thanks', 'role', true)),
			array('permission.permission_set', array('ROLE_FORUM_LIMITED_POLLS', 'f_thanks', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_FULL', 'u_viewtoplist', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_FULL', 'u_viewthanks', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_LIMITED', 'u_viewtoplist', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_LIMITED', 'u_viewthanks', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_NOAVATAR', 'u_viewtoplist', 'role', true)),
			array('permission.permission_set', array('ROLE_USER_NOAVATAR', 'u_viewthanks', 'role', true)),
			// Version update
//			array('if', array(
//					(isset($this->config['thanks_for_posts_version'])),
//					array('config.update', array('thanks_for_posts_version', '4.4.0')),
//					array('config.add', array('thanks_for_posts_version', '4.4.0'))
//				)
//			),
			array('config.add', array('thanks_for_posts_version', '4.4.0')),
			array('config.update', array('thanks_for_posts_version', '4.4.0')),
			// Notifications
			array('custom', array(array($this, 'update_notifications_serialization'))),
			// ACP Modules:
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_THANKS')),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\naguissa\thanksforposts\acp\acp_thanks_module',
						'module_langname' => 'ACP_THANKS_SETTINGS',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_naguissa/thanksforposts && acl_a_board'
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\naguissa\thanksforposts\acp\acp_thanks_refresh_module',
						'module_langname' => 'ACP_THANKS_REFRESH',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_naguissa/thanksforposts && acl_a_board'
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\naguissa\thanksforposts\acp\acp_thanks_truncate_module',
						'module_langname' => 'ACP_THANKS_TRUNCATE',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_naguissa/thanksforposts && acl_a_board'
					))),
			array('module.add', array('acp', 'ACP_THANKS', array(
						'module_basename' => '\naguissa\thanksforposts\acp\acp_thanks_reput_module',
						'module_langname' => 'ACP_THANKS_REPUT_SETTINGS',
						'module_mode' => 'thanks',
						'module_auth' => 'ext_naguissa/thanksforposts && acl_a_board'
					)))
		);
	}

	public function revert_schema()
	{
		return [
			'drop_tables' => [$this->table_prefix . 'thanks'],
		];
	}

	public function revert_data()
	{
		return [
			// Remove configs
			['config.remove', ['thanks_for_posts_version']]
		];
	}

}
