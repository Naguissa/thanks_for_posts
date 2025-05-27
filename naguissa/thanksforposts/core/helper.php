<?php
/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @see https://github.com/Naguissa/thanks_for_posts
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace naguissa\thanksforposts\core;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class helper
{
	protected array $thankers = array();
	protected array $forum_thanks = array();
	protected ?int $max_post_thanks;
	protected int  $max_topic_thanks = 1;
	protected ?int $max_forum_thanks;
	protected array $poster_list_count = array();
	protected \phpbb\config\config $config;
	protected \phpbb\db\driver\driver_interface $db;
	protected \phpbb\auth\auth $auth;
	protected \phpbb\template\template $template;
	protected \phpbb\user $user;
	protected \phpbb\cache\driver\driver_interface $cache;
	protected \phpbb\request\request_interface $request;
	protected \phpbb\notification\manager $notification_manager;
	protected \phpbb\controller\helper $controller_helper;
	protected \phpbb\event\dispatcher_interface $phpbb_dispatcher;
	protected string $phpbb_root_path;
	protected string $php_ext;
	protected string $thanks_table;
	protected string $users_table;
	protected string $posts_table;
	protected string $notifications_table;
	protected string $topics_table;


	public function __construct(
        \phpbb\config\config $config,
        \phpbb\db\driver\driver_interface $db,
        \phpbb\auth\auth $auth,
        \phpbb\template\template $template,
        \phpbb\user $user,
        \phpbb\cache\driver\driver_interface $cache,
        \phpbb\request\request_interface $request,
        \phpbb\notification\manager $notification_manager,
        \phpbb\controller\helper $controller_helper,
        \phpbb\event\dispatcher_interface $phpbb_dispatcher,
        string $phpbb_root_path,
        string $php_ext,
        string $thanks_table,
        string $users_table,
        string $posts_table,
        string $notifications_table,
        string $topics_table
    ) {
		$this->config = $config;
		$this->db = $db;
		$this->auth = $auth;
		$this->template = $template;
		$this->user = $user;
		$this->cache = $cache;
		$this->request = $request;
		$this->notification_manager = $notification_manager;
		$this->controller_helper = $controller_helper;
		$this->phpbb_dispatcher = $phpbb_dispatcher;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
		$this->thanks_table = $thanks_table;
		$this->users_table = $users_table;
		$this->posts_table = $posts_table;
		$this->notifications_table = $notifications_table;
		$this->topics_table = $topics_table;
	}

// Output thanks list
	public function get_thankers() : array
	{
		return $this->thankers;
	}

// Output thanks list
	public function get_thanks($post_id)
	{
		$view = $this->request->variable('view', '');
		$further_thanks_text = $return = '';
		$user_list = array();
		$further_thanks = $count = 0;
		$maxcount = (isset($this->config['thanks_number_post']) ? $this->config['thanks_number_post'] : false);

		foreach ($this->thankers as $thanker)
		{
			if ($thanker['post_id'] == $post_id)
			{
				if ($count >= $maxcount)
				{
					$further_thanks++;
				} else
				{
					$user_list[] = get_username_string('full', $thanker['user_id'], $thanker['username'], $thanker['user_colour']) .
							(($this->config['thanks_time_view'] && $thanker['thanks_time']) ? ' (' . $this->user->format_date($thanker['thanks_time'], false, ($view == 'print') ? true : false) . ')' : '');
					$count++;
				}
			}
		}

		if (!empty($user_list))
		{
			$return = implode(' &bull; ', $user_list);
		}

		if ($further_thanks > 0)
		{
			$further_thanks_text = $this->user->lang('FURTHER_THANKS', $further_thanks, $further_thanks);
		}
		$return = ($return == '') ? false : ($return . $further_thanks_text);
		return $return;
	}

//get thanks number
	public function get_thanks_number($post_id) : int
	{
		$i = 0;
		foreach ($this->thankers as $thanker)
		{
			if ($thanker['post_id'] == $post_id)
			{
				$i++;
			}
		}
		return $i;
	}
	
	
	public function return_ajax_response(bool $result = false, $post_id = 0, $forum_id = 0, $error = '') {
	
		if ($result === true) {
			$this->array_all_thanks(array($post_id), $forum_id);
			$postrow = $this->get_post_row($post_id);
			$postinfo = $this->get_post_info($post_id);
			$row = array_merge(
					$this->get_topic_info($postrow['topic_id']),
					$postinfo
			);
			$row["username"] = $row["post_username"] = $postrow["username"];
			$row["user_colour"] = $postrow["user_colour"];
			$this->output_thanks($this->request->variable('to_id', 0), $postrow, $row, $row, $forum_id);
			$template_vars = array(
				"postrow" => $postrow,
				'S_FORUM_THANKS' => (bool) ($this->auth->acl_get('f_thanks', $forum_id)),
				'S_USER_LOGGED_IN' => ($this->user->data['user_type'] != USER_IGNORE)
			);
			$template_vars["postrow"]["POST_ID"] = $postrow["post_id"];
			$template_vars["postrow"]["POST_AUTHOR"] = $this->get_username_string('username', $postrow['poster_id']);
			$template_vars["postrow"]["POST_AUTHOR_FULL"] = $this->get_username_string('full', $postrow['poster_id']);

            $responseData = array(
				"result" => 1,
				"update" => array(
				)
			);

			$this->template->set_style(array('ext/naguissa/thanksforposts/styles', 'styles'));
			$this->template->assign_vars($template_vars);

            $responseData["update"]["app_list_thanks_" . $post_id] = $this->template->assign_display('event/viewtopic_body_postrow_post_notices_after.html');
			$responseData["update"]["app_thanks_button_" . $post_id] = $this->template->assign_display('event/viewtopic_body_post_buttons_after.html');

			$response = new JsonResponse($responseData);
		} else {
			$response = new JsonResponse(array(
				'result' => 0,
				'error' => $error
			));
		}
        $response->send();
        exit;
	}	
	


// add a user to the thanks list
	public function insert_thanks($post_id, $user_id, $forum_id)
	{
		$to_id = $this->request->variable('to_id', 0);
		$from_id = $this->request->variable('from_id', 0);
		$row = $this->get_post_info($post_id);
        $ajax = $this->request->variable('ajax', false);
		
		if ($this->user->data['user_type'] != USER_IGNORE && !empty($to_id))
		{
			if ($row['poster_id'] != $user_id && $row['poster_id'] == $to_id && !$this->already_thanked($post_id, $user_id) && ($this->auth->acl_get('f_thanks', $row['forum_id']) || (!$row['forum_id'] && (isset($this->config['thanks_global_post']) ? $this->config['thanks_global_post'] : false))) && $from_id == $user_id)
			{
				$thanks_data = array(
					'user_id' => (int) $this->user->data['user_id'],
					'post_id' => $post_id,
					'poster_id' => $to_id,
					'topic_id' => (int) $row['topic_id'],
					'forum_id' => (int) $row['forum_id'],
					'thanks_time' => time(),
				);
				$sql = 'INSERT INTO ' . $this->thanks_table . ' ' . $this->db->sql_build_array('INSERT', $thanks_data);
				$this->db->sql_query($sql);

				$lang_act = 'GIVE';
				$thanks_data = array_merge($thanks_data, array(
					'username' => $this->user->data['username'],
					'lang_act' => $lang_act,
					'post_subject' => $row['post_subject'],
				));
				$this->add_notification($thanks_data);

				if ($ajax)
				{
					return $this->return_ajax_response(true, $post_id, $forum_id);
				} else
				{
					if (isset($this->config['thanks_info_page']) && $this->config['thanks_info_page'])
					{
						meta_refresh(1, append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $post_id . '#p' . $post_id));
						trigger_error($this->user->lang('THANKS_INFO_' . $lang_act) . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $post_id . '#p' . $post_id) . '">', '</a>'));
					} else
					{
						redirect(append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $post_id . '#p' . $post_id));
					}
				}
			} else if (!$row['forum_id'] && (isset($this->config['thanks_global_post']) ? !$this->config['thanks_global_post'] : true))
			{
				if ($ajax)
				{
					return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('GLOBAL_INCORRECT_THANKS'));
				} else
				{
					trigger_error($this->user->lang('GLOBAL_INCORRECT_THANKS') . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $post_id . '#p' . $post_id) . '">', '</a>'));
				}
			} else
			{
				if ($ajax)
				{
					return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('INCORRECT_THANKS'));
				} else
				{
					trigger_error($this->user->lang('INCORRECT_THANKS') . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $post_id . '#p' . $post_id) . '">', '</a>'));
				}
			}
		}
		return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('THANKS_AJAX_INCORRECT_PARAMETERS'));
	}

// clear list user's thanks
	public function clear_list_thanks($object_id, $list_thanks = '')
	{
// confirm
		$s_hidden_fields = build_hidden_fields(array(
			'list_thanks' => $list_thanks,
				)
		);
		$lang_act = $field_act = '';
		if (confirm_box(true))
		{
			if (!empty($list_thanks) && $this->auth->acl_get('m_thanks'))
			{
				if ($list_thanks === 'give')
				{
					$lang_act = 'GIVE';
					$field_act = 'user_id';
				} else if ($list_thanks === 'receive')
				{
					$lang_act = 'RECEIVE';
					$field_act = 'poster_id';
				} else if ($list_thanks === 'post')
				{
					$lang_act = 'POST';
					$field_act = 'post_id';
				}

				if (!empty($field_act))
				{
					$sql = "DELETE FROM " . $this->thanks_table . '
						WHERE ' . $field_act . ' = ' . (int) $object_id;
					$result = $this->db->sql_query($sql);

					if ($result != 0)
					{
						if (isset($this->config['thanks_info_page']) ? $this->config['thanks_info_page'] : false)
						{
							if ($list_thanks === 'post')
							{
								meta_refresh(1, append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $object_id . '#p' . $object_id));
								trigger_error($this->user->lang('CLEAR_LIST_THANKS_' . $lang_act) . '<br /><br />' . $this->user->lang('BACK_TO_PREV', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $object_id . '#p' . $object_id) . '">', '</a>'));
							} else
							{
								meta_refresh(1, append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $object_id));
								trigger_error($this->user->lang('CLEAR_LIST_THANKS_' . $lang_act) . '<br /><br />' . $this->user->lang('BACK_TO_PREV', '<a href="' . append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $object_id) . '">', '</a>'));
							}
						} else
						{
							if ($list_thanks === 'post')
							{
								redirect(append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $object_id . '#p' . $object_id));
							} else
							{
								redirect(append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $object_id));
							}
						}
					}
				}
			} else
			{
				if ($list_thanks === 'post')
				{
					trigger_error($this->user->lang('INCORRECT_THANKS') . '<br /><br />' . $this->user->lang('BACK_TO_PREV', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $object_id . '#p' . $object_id) . '">', '</a>'));
				} else
				{
					trigger_error($this->user->lang('INCORRECT_THANKS') . '<br /><br />' . $this->user->lang('BACK_TO_PREV', '<a href="' . append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $object_id) . '">', '</a>'));
				}
			}
		} else
		{
			confirm_box(false, 'CLEAR_LIST_THANKS', $s_hidden_fields);
			if ($list_thanks === 'post')
			{
				redirect(append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $object_id . '#p' . $object_id));
			} else
			{
				redirect(append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $object_id));
			}
		}
		return;
	}

// remove a user's thanks
	public function delete_thanks($post_id, $forum_id)
	{
        $ajax = $this->request->variable('ajax', false);
		$to_id = $this->request->variable('to_id', 0);
		$forum_id = ($forum_id) ?: $this->request->variable('f', 0);
		$row = $this->get_post_info($post_id);
// confirm
		$hidden = build_hidden_fields(array(
			'to_id' => $to_id,
			'rthanks' => $post_id,
		));

		/**
		 * This event allows to interrupt before a thanks is deleted
		 *
		 * @event naguissa.thanksforposts.delete_thanks_before
		 * @var	int		post_id		The post id
		 * @var	int		forum_id	The forum id
		 * @since 2.0.3
		 */
		$vars = array('post_id', 'forum_id');
		extract($this->phpbb_dispatcher->trigger_event('naguissa.thanksforposts.delete_thanks_before', compact($vars)));

		if (isset($this->config['remove_thanks']) ? !$this->config['remove_thanks'] : true)
		{
			if ($ajax)
			{
				return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('DISABLE_REMOVE_THANKS'));
			} else
			{
				trigger_error($this->user->lang('DISABLE_REMOVE_THANKS') . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id") . '">', '</a>'));
			}
		}

		if ($ajax || confirm_box(true, 'REMOVE_THANKS', $hidden))
		{
			if ($this->user->data['user_type'] != USER_IGNORE && !empty($to_id) && ($ajax || $this->auth->acl_get('f_thanks', $forum_id)))
			{
				$sql = "DELETE FROM " . $this->thanks_table . '
					WHERE post_id =' . (int) $post_id . " AND user_id = " . (int) $this->user->data['user_id'];
				$this->db->sql_query($sql);
				$result = $this->db->sql_affectedrows($sql);
				if ($result != 0)
				{
					$lang_act = 'REMOVE';
					$thanks_data = array(
						'user_id' => (int) $this->user->data['user_id'],
						'post_id' => $post_id,
						'poster_id' => $to_id,
						'topic_id' => (int) $row['topic_id'],
						'forum_id' => $forum_id,
						'thanks_time' => time(),
						'username' => $this->user->data['username'],
						'lang_act' => $lang_act,
						'post_subject' => $row['post_subject'],
					);
					$this->add_notification($thanks_data, 'naguissa.thanksforposts.notification.type.thanks_remove');

					if ($ajax)
					{
    					return $this->return_ajax_response(true, $post_id, $forum_id);
					} else
					{


						if (isset($this->config['thanks_info_page']) && $this->config['thanks_info_page'])
						{
							meta_refresh(1, append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id"));
							trigger_error($this->user->lang('THANKS_INFO_' . $lang_act) . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id") . '">', '</a>'));
						} else
						{
							redirect(append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id"));
						}
					}
				} else
				{
					if ($ajax)
					{
				        return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('INCORRECT_THANKS'));
					} else
					{
						trigger_error($this->user->lang('INCORRECT_THANKS') . '<br /><br />' . $this->user->lang('RETURN_POST', '<a href="' . append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id") . '">', '</a>'));
					}
				}
			} else
			{
		        return $this->return_ajax_response(false, $post_id, $forum_id, $this->user->lang('THANKS_AJAX_INCORRECT_PARAMETERS'));
			}
		} else
		{
			confirm_box(false, 'REMOVE_THANKS', $hidden);
			redirect(append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", "f=$forum_id&amp;p=$post_id#p$post_id"));
		}
		return;
	}

// display the text/image saying either to add or remove thanks
	public function get_thanks_text($post_id) : array
	{
		if ($this->already_thanked($post_id, $this->user->data['user_id']))
		{
			return array(
				'THANK_ALT' => $this->user->lang('REMOVE_THANKS'),
				'THANK_ALT_SHORT' => $this->user->lang('REMOVE_THANKS_SHORT'),
				'THANKS_IMG' => isset($this->config['thanks_symbol_remove']) && !empty($this->config['thanks_symbol_remove']) ? $this->config['thanks_symbol_remove'] : 'fa-recycle',
			);
		}
		return array(
			'THANK_ALT' => $this->user->lang('THANK_POST'),
			'THANK_ALT_SHORT' => $this->user->lang('THANK_POST_SHORT'),
			'THANKS_IMG' => isset($this->config['thanks_symbol_thanks']) && !empty($this->config['thanks_symbol_thanks']) ? $this->config['thanks_symbol_thanks'] : 'fa-thumbs-o-up',
		);
	}

// change the variable sent via the link to avoid odd errors
	public function get_thanks_link($post_id) : string
	{
		if ($this->already_thanked($post_id, $this->user->data['user_id']))
		{
			return 'rthanks';
		}
		return 'thanks';
	}

// check if the user has already thanked that post
	public function already_thanked($post_id, $user_id) : bool
	{
		foreach ($this->thankers as $thanker)
		{
			if ($thanker['post_id'] == $post_id && $thanker['user_id'] == $user_id)
			{
				return true;
			}
		}
		return false;
	}

// stuff goes here to avoid over-editing memberlist.php
	public function output_thanks_memberlist($user_id, $ex_fid_ary) : void
	{
		$thanks = array();
		$thanked = array();
		$poster_limit = isset($this->config['thanks_number']) ? $this->config['thanks_number'] : false;

// Thanks received:
		$sql = 'SELECT poster_id, COUNT(*) AS poster_receive_count
			FROM ' . $this->thanks_table . '
			WHERE poster_id = ' . (int) $user_id . ' AND (' . $this->db->sql_in_set('forum_id', $ex_fid_ary, true) . ' OR forum_id = 0)
			GROUP BY poster_id';
		$result = $this->db->sql_query($sql);
		$poster_receive_count = (int) $this->db->sql_fetchfield('poster_receive_count');
		$this->db->sql_freeresult($result);

		$sql_array = array(
			'SELECT' => 't.*, u.username, u.user_colour',
			'FROM' => array($this->thanks_table => 't', $this->users_table => 'u'),
		);
		$sql_array['WHERE'] = 't.poster_id =' . (int) $user_id . ' AND ';
		$sql_array['WHERE'] .= 'u.user_id = t.user_id AND ';
		$sql_array['WHERE'] .= '(' . $this->db->sql_in_set('t.forum_id', $ex_fid_ary, true) . ' OR t.forum_id = 0)';
		$sql_array['ORDER_BY'] = 't.post_id DESC';
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query_limit($sql, (int) $poster_limit);
		while ($row = $this->db->sql_fetchrow($result))
		{
			if ($row['poster_id'] == $user_id)
			{
				$this->template->assign_block_vars('THANKEDLIST', array(
					'user' => get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
					'url' => append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $row['post_id'] . '#p' . $row['post_id'])
				));
			}
		}
		$this->db->sql_freeresult($result);

		$further_thanked_text = ($poster_receive_count > $poster_limit ? $this->user->lang('FURTHER_THANKS', $poster_receive_count - $poster_limit, $poster_receive_count - $poster_limit) : '');

// Thanks given:
		$sql = 'SELECT user_id, COUNT(*) AS poster_give_count
			FROM ' . $this->thanks_table . "
			WHERE user_id = " . (int) $user_id . ' AND (' . $this->db->sql_in_set('forum_id', $ex_fid_ary, true) . ' OR forum_id = 0)
			GROUP BY user_id';
		$result = $this->db->sql_query($sql);
		$poster_give_count = (int) $this->db->sql_fetchfield('poster_give_count');
		$this->db->sql_freeresult($result);

		$sql_array = array(
			'SELECT' => 't.*, u.username, u.user_colour',
			'FROM' => array($this->thanks_table => 't', $this->users_table => 'u'),
		);
		$sql_array['WHERE'] = 't.user_id =' . (int) $user_id . ' AND ';
		$sql_array['WHERE'] .= 'u.user_id = t.poster_id AND ';
		$sql_array['WHERE'] .= '(' . $this->db->sql_in_set('t.forum_id', $ex_fid_ary, true) . ' OR t.forum_id = 0)';
		$sql_array['ORDER_BY'] = 't.post_id DESC';
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query_limit($sql, (int) $poster_limit);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if ($row['user_id'] == $user_id)
			{
				$this->template->assign_block_vars('THANKSLIST', array(
					'user' => get_username_string('full', $row['poster_id'], $row['username'], $row['user_colour']),
					'url' => append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'p=' . $row['post_id'] . '#p' . $row['post_id'])
				));
			}
		}
		$this->db->sql_freeresult($result);

		$further_thanks_text = ($poster_give_count > $poster_limit ? $this->user->lang('FURTHER_THANKS', $poster_give_count - $poster_limit, $poster_give_count - $poster_limit) : '');

		$l_poster_receive_count = ($poster_receive_count) ? $this->user->lang('THANKS', $poster_receive_count) : '';
		$l_poster_give_count = ($poster_give_count) ? $this->user->lang('THANKS', $poster_give_count) : '';

		$this->template->assign_vars(array(
			'POSTER_RECEIVE_COUNT' => $l_poster_receive_count,
			'MORE_THANKS' => $further_thanks_text,
			'POSTER_GIVE_COUNT' => $l_poster_give_count,
			'MORE_THANKED' => $further_thanked_text,
			'THANKS_PROFILELIST_VIEW' => isset($this->config['thanks_profilelist_view']) ? $this->config['thanks_profilelist_view'] : false,
			'S_MOD_THANKS' => $this->auth->acl_get('m_thanks'),
			'U_CLEAR_LIST_THANKS_GIVE' => append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $user_id . '&amp;list_thanks=give'),
			'U_CLEAR_LIST_THANKS_RECEIVE' => append_sid($this->phpbb_root_path . "memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . $user_id . '&amp;list_thanks=receive'),
			'POSTER_RECEIVE_COUNT_LINK' => $this->controller_helper->route('naguissa_thanksforposts_thankslist_controller_user', array('mode' => 'givens', 'author_id' => $user_id, 'give' => 'false')),
			'POSTER_GIVE_COUNT_LINK' => $this->controller_helper->route('naguissa_thanksforposts_thankslist_controller_user', array('mode' => 'givens', 'author_id' => $user_id, 'give' => 'true'))
		));
	}

	public function output_thanks($poster_id, &$postrow, $row, $topic_data, $forum_id) : void
	{
		if (!empty($postrow))
		{
			$thanks_ajax = (bool) $this->config['thanks_ajax'];
			$thanks_text = $this->get_thanks_text($row['post_id']);
			$thank_mode = $this->get_thanks_link($row['post_id']);
			$already_thanked = $this->already_thanked($row['post_id'], $this->user->data['user_id']);
			$l_poster_receive_count = (isset($this->poster_list_count[$poster_id]['R']) && $this->poster_list_count[$poster_id]['R']) ? $this->user->lang('THANKS', (int) $this->poster_list_count[$poster_id]['R']) : '';
			$l_poster_give_count = (isset($this->poster_list_count[$poster_id]['G']) && $this->poster_list_count[$poster_id]['G']) ? $this->user->lang('THANKS', (int) $this->poster_list_count[$poster_id]['G']) : '';

// Correctly form URLs
			$u_receive_count_url = $this->controller_helper->route('naguissa_thanksforposts_thankslist_controller_user', array('mode' => 'givens', 'author_id' => $poster_id, 'give' => 'false'));
			$u_give_count_url = $this->controller_helper->route('naguissa_thanksforposts_thankslist_controller_user', array('mode' => 'givens', 'author_id' => $poster_id, 'give' => 'true'));

			$reputation_pct = round($this->get_thanks_number($row['post_id']) / (($this->max_post_thanks > 0 ? $this->max_post_thanks : 1) / 100), $this->config['thanks_number_digits']);

            $thanks_link = append_sid($this->phpbb_root_path . "viewtopic." . $this->php_ext, 'f=' . $forum_id . '&amp;p=' . $row['post_id'] . '&amp;' . $thank_mode . '=' . $row['post_id'] . '&amp;to_id=' . $poster_id . '&amp;from_id=' . $this->user->data['user_id'] . ($thanks_ajax ? "&amp;ajax=1" : ""));
            $thanks_link_class_add = $thanks_ajax ? 'app_thanks_ajax' : '';


			$postrow = array_merge($postrow, $thanks_text, array(
				'COND' => ($already_thanked) ? true : false,
				'THANKS' => $this->get_thanks($row['post_id']),
				'THANKS_AJAX' => $thanks_ajax,
				'THANK_MODE' => $thank_mode,
				'THANKS_LINK' => $thanks_link,
				'THANKS_LINK_CLASS_ADD' => $thanks_link_class_add,
				'THANK_TEXT' => $this->user->lang('THANK_TEXT_1'),
				'THANK_TEXT_2' => $this->user->lang('THANK_TEXT_2', $this->get_thanks_number($row['post_id'])),
				'THANKS_FROM' => $this->user->lang('THANK_FROM'),
				'POSTER_RECEIVE_COUNT' => $l_poster_receive_count,
				'POSTER_GIVE_COUNT' => $l_poster_give_count,
				'POSTER_RECEIVE_COUNT_LINK' => $u_receive_count_url,
				'POSTER_GIVE_COUNT_LINK' => $u_give_count_url,
				'S_IS_OWN_POST' => ($this->user->data['user_id'] == $poster_id) ? true : false,
				'S_POST_ANONYMOUS' => ($poster_id == ANONYMOUS) ? true : false,
				'THANK_IMG' => ($already_thanked) ? $this->user->img('removethanks', $this->user->lang('REMOVE_THANKS') . get_username_string('username', $poster_id, $row['username'], $row['user_colour'], $row['post_username'])) : $this->user->img('thankposts', $this->user->lang('THANK_POST') . get_username_string('username', $poster_id, $row['username'], $row['user_colour'], $row['post_username'])),
				'THANKS_POSTLIST_VIEW' => isset($this->config['thanks_postlist_view']) ? $this->config['thanks_postlist_view'] : false,
				'THANKS_COUNTERS_VIEW' => isset($this->config['thanks_counters_view']) ? $this->config['thanks_counters_view'] : false,
				'S_ALREADY_THANKED' => $already_thanked,
				'S_REMOVE_THANKS' => isset($this->config['remove_thanks']) ? $this->config['remove_thanks'] : false,
				'S_FIRST_POST_ONLY' => isset($this->config['thanks_only_first_post']) ? $this->config['thanks_only_first_post'] : false,
				'POST_REPUT' => $reputation_pct > 0 ? $reputation_pct . '%' : '',
				'S_THANKS_POST_REPUT_VIEW' => isset($this->config['thanks_post_reput_view']) ? (bool) $this->config['thanks_post_reput_view'] : false,
				'S_THANKS_REPUT_GRAPHIC' => isset($this->config['thanks_reput_graphic']) ? $this->config['thanks_reput_graphic'] : false,
				'THANKS_REPUT_GRAPHIC_TEXT' => $reputation_pct > 0 ? $this->get_reputation_stars_from_rating($reputation_pct) : '',
				'S_GLOBAL_POST_THANKS' => ($topic_data['topic_type'] == POST_GLOBAL) ? (isset($this->config['thanks_global_post']) ? !$this->config['thanks_global_post'] : true) : false,
				'U_CLEAR_LIST_THANKS_POST' => append_sid($this->phpbb_root_path . "viewtopic.$this->php_ext", 'f=' . $forum_id . '&amp;p=' . $row['post_id'] . '&amp;list_thanks=post'),
				'S_MOD_THANKS' => $this->auth->acl_get('m_thanks'),
				'S_ONLY_TOPICSTART' => ($topic_data['topic_first_post_id'] == $row['post_id']) ? true : false,
				'THANKS_POST_VIEW_GUESTS' => isset($this->config['thanks_post_view_guests']) && $this->config['thanks_post_view_guests'],
				'THANKS_POST_VIEW_ROBOTS' => isset($this->config['thanks_post_view_robots']) && $this->config['thanks_post_view_robots']
			));
		}
	}

//refresh counts if post delete
	public function delete_post_thanks($post_ids) : void
	{
		$sql = 'DELETE FROM ' . $this->thanks_table . '
				WHERE ' . $this->db->sql_in_set('post_id', $post_ids);
		$this->db->sql_query($sql);
	}

// create an array of all thanks info
	public function array_all_thanks($post_list, $forum_id) : void
	{
		$poster_list = array();
        $this->thankers = array();

// max post thanks
		if (isset($this->config['thanks_post_reput_view']) && $this->config['thanks_post_reput_view'])
		{
			$sql = 'SELECT MAX(tally) AS max_post_thanks
				FROM (SELECT post_id, COUNT(*) AS tally FROM ' . $this->thanks_table . ' GROUP BY post_id) t';
			$result = $this->db->sql_query($sql);
			$this->max_post_thanks = (int) $this->db->sql_fetchfield('max_post_thanks');
			if ($this->max_post_thanks == 0)
			{
				$this->max_post_thanks = 1;
			}
			$this->db->sql_freeresult($result);
		} else
		{
			$this->max_post_thanks = 1;
		}

//array all user who say thanks on viewtopic page
		if ($this->auth->acl_get('f_thanks', $forum_id) || ($this->user->data['user_id'] == ANONYMOUS && $this->config['thanks_post_view_guests']) || ($this->config['thanks_post_view_robots'] && $this->user->data['is_bot']))
		{
			$sql_array = array(
				'SELECT' => 't.*, u.username, u.username_clean, u.user_colour',
				'FROM' => array($this->thanks_table => 't', $this->users_table => 'u'),
				'WHERE' => 'u.user_id = t.user_id AND ' . $this->db->sql_in_set('t.post_id', $post_list),
				'ORDER_BY' => 't.thanks_time ASC',
			);
			$sql = $this->db->sql_build_query('SELECT', $sql_array);
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->thankers[] = array(
					'user_id' => $row['user_id'],
					'poster_id' => $row['poster_id'],
					'post_id' => $row['post_id'],
					'thanks_time' => $row['thanks_time'],
					'username' => $row['username'],
					'username_clean' => $row['username_clean'],
					'user_colour' => $row['user_colour'],
				);
			}
			$this->db->sql_freeresult($result);
		}

//array thanks_count for all poster on viewtopic page
		if (isset($this->config['thanks_counters_view']) ? $this->config['thanks_counters_view'] : false)
		{
			$sql = 'SELECT DISTINCT poster_id FROM ' . $this->posts_table . ' WHERE ' . $this->db->sql_in_set('post_id', $post_list);
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$poster_list[] = $row['poster_id'];
				$this->poster_list_count[$row['poster_id']] = ['R' => 0, 'G' => 0];
			}
			$this->db->sql_freeresult($result);

			$ex_fid_ary = array_keys($this->auth->acl_getf('!f_read', true));
			$ex_fid_ary = (sizeof($ex_fid_ary)) ? $ex_fid_ary : false;

			$sql = 'SELECT poster_id, COUNT(poster_id) AS poster_count FROM ' . $this->thanks_table . '
				WHERE ' . $this->db->sql_in_set('poster_id', $poster_list) . '
					AND ' . $this->db->sql_in_set('forum_id', $ex_fid_ary, true) . '
				GROUP BY poster_id';
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->poster_list_count[$row['poster_id']]['R'] = $row['poster_count'];
			}
			$this->db->sql_freeresult($result);

			$sql = 'SELECT user_id, COUNT(user_id) AS user_count FROM ' . $this->thanks_table . '
				WHERE ' . $this->db->sql_in_set('user_id', $poster_list) . '
					AND ' . $this->db->sql_in_set('forum_id', $ex_fid_ary, true) . '
				GROUP BY user_id';
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->poster_list_count[$row['user_id']]['G'] = $row['user_count'];
			}
			$this->db->sql_freeresult($result);
		}
		return;
	}

// topic reput
	public function get_thanks_topic_reput($topic_id, $max_topic_thanks, $topic_thanks) : array
	{
	    if ($max_topic_thanks < 1) {
	        $max_topic_thanks = 1;
        }
		$reputation_pct = (isset($topic_thanks[$topic_id])) ? round((int) $topic_thanks[$topic_id] / ($max_topic_thanks / 100), (int) $this->config['thanks_number_digits']) : '';
		return array(
			'TOPIC_REPUT' => $reputation_pct == '' ? '' : $reputation_pct . '%',
			'S_THANKS_TOPIC_REPUT_VIEW' => isset($this->config['thanks_topic_reput_view']) ? (bool) $this->config['thanks_topic_reput_view'] : false,
			'S_THANKS_REPUT_GRAPHIC' => isset($this->config['thanks_reput_graphic']) ? $this->config['thanks_reput_graphic'] : false,
			'THANKS_REPUT_GRAPHIC_TEXT' => $reputation_pct == '' ? '' : $this->get_reputation_stars_from_rating($reputation_pct)
		);
	}

// topic thanks number
	public function get_thanks_topic_number($topic_list) : array
	{
		$topic_thanks = array();
		if ($this->config['thanks_topic_reput_view'])
		{
			$sql = 'SELECT topic_id, COUNT(*) AS topic_thanks
				FROM ' . $this->thanks_table . "
				WHERE " . $this->db->sql_in_set('topic_id', $topic_list) . '
				GROUP BY topic_id';
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$topic_thanks[$row['topic_id']] = $row['topic_thanks'];
			}
			$this->db->sql_freeresult($result);
		}
		return $topic_thanks;
	}

// max topic thanks
	public function get_max_topic_thanks() : int
	{
		if ($this->config['thanks_topic_reput_view'])
		{
			$sql = 'SELECT MAX(tally) AS max_topic_thanks
				FROM (SELECT topic_id, COUNT(*) AS tally FROM ' . $this->thanks_table . ' GROUP BY topic_id) t';
			$result = $this->db->sql_query($sql);
			$this->max_topic_thanks = (int) ($this->db->sql_fetchfield('max_topic_thanks') ?? 1);
			$this->db->sql_freeresult($result);
			return $this->max_topic_thanks;
		}
		return 1;
	}

// max post thanks for toplist
	public function get_max_post_thanks() : int
	{
		$sql = 'SELECT MAX(tally) AS max_post_thanks
			FROM (SELECT post_id, COUNT(*) AS tally FROM ' . $this->thanks_table . ' GROUP BY post_id) t';
		$result = $this->db->sql_query($sql);
		$this->max_post_thanks = (int) $this->db->sql_fetchfield('max_post_thanks');
		if ($this->max_post_thanks == 0)
		{
			$this->max_post_thanks = 1;
		}
		$this->db->sql_freeresult($result);
		return $this->max_post_thanks;
	}

// Generate thankslist if required ...
	public function get_toplist_index($ex_fid_ary) : string
	{
		$thanks_list = '';

		$sql = 'SELECT t.poster_id, COUNT(t.user_id) AS tally, u.user_id, u.username, u.user_colour
			FROM ' . $this->users_table . ' u
			LEFT JOIN ' . $this->thanks_table . ' t ON (u.user_id = t.poster_id)
			WHERE ' . $this->db->sql_in_set('t.forum_id', $ex_fid_ary, true) . ' OR t.forum_id = 0
			GROUP BY t.poster_id
			ORDER BY tally DESC';
		$result = $this->db->sql_query_limit($sql, (int) $this->config['thanks_top_number']);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$thanks_list .= (($thanks_list != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']) . ' (' . $row['tally'] . ')';
		}
		$this->db->sql_freeresult($result);
		return $thanks_list;
	}

// forum reput
	public function get_thanks_forum_reput($forum_id) : array
	{
		$reputation_pct = (isset($this->forum_thanks[$forum_id])) ? round($this->forum_thanks[$forum_id] / ($this->max_forum_thanks / 100), ($this->config['thanks_number_digits'])) : '';
		return array(
			'FORUM_REPUT' => $reputation_pct == '' ? '' : $reputation_pct . '%',
			'S_THANKS_FORUM_REPUT_VIEW' => isset($this->config['thanks_forum_reput_view']) ? (bool) $this->config['thanks_forum_reput_view'] : false,
			'S_THANKS_REPUT_GRAPHIC' => isset($this->config['thanks_reput_graphic']) ? $this->config['thanks_reput_graphic'] : false,
			'THANKS_REPUT_GRAPHIC_TEXT' => $reputation_pct == '' ? '' : $this->get_reputation_stars_from_rating($reputation_pct)
		);
	}

// forum thanks number
	public function get_thanks_forum_number()
	{
		if ($this->config['thanks_forum_reput_view'])
		{
			if ($forum_thanks_rating = $this->cache->get('_forum_thanks_rating'))
			{
				$sql = 'SELECT forum_id, COUNT(*) AS forum_thanks
					FROM ' . $this->thanks_table . "
					WHERE " . $this->db->sql_in_set('forum_id', $forum_thanks_rating) . '
					GROUP BY forum_id';
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$this->forum_thanks[$row['forum_id']] = $row['forum_thanks'];
				}
				$this->db->sql_freeresult($result);
			}
			return $this->forum_thanks;
		}
	}

// max forum thanks
	public function get_max_forum_thanks()
	{
		if ($this->config['thanks_forum_reput_view'])
		{
			$sql = 'SELECT MAX(tally) AS max_forum_thanks
				FROM (SELECT forum_id, COUNT(*) AS tally FROM ' . $this->thanks_table . ' GROUP BY forum_id) t
				WHERE forum_id <> 0';
			$result = $this->db->sql_query($sql);
			$this->max_forum_thanks = (int) $this->db->sql_fetchfield('max_forum_thanks');
			if ($this->max_forum_thanks == 0)
			{
				$this->max_forum_thanks = 1;
			}
			$this->db->sql_freeresult($result);
			return $this->max_forum_thanks;
		}
	}

// Add notifications
	public function add_notification($notification_data, $notification_type_name = 'naguissa.thanksforposts.notification.type.thanks')
	{
		if ($this->notification_exists($notification_data, $notification_type_name))
		{
			$this->notification_manager->update_notifications($notification_type_name, $notification_data);
		} else
		{
			$this->notification_manager->add_notifications($notification_type_name, $notification_data);
		}
	}

	public function notification_exists($thanks_data, $notification_type_name)
	{
		$notification_type_id = $this->notification_manager->get_notification_type_id($notification_type_name);
		$sql = 'SELECT notification_id FROM ' . $this->notifications_table . '
			WHERE notification_type_id = ' . (int) $notification_type_id . '
				AND item_id = ' . (int) $thanks_data['post_id'];
		$result = $this->db->sql_query($sql);
		$item_id = $this->db->sql_fetchfield('notification_id');
		$this->db->sql_freeresult($result);

		return ($item_id) ?: false;
	}

	public function notification_markread($item_ids)
	{
		// Mark post notifications read for this user in this topic
		$this->notification_manager->mark_notifications_read(array('naguissa.thanksforposts.notification.type.thanks', 'naguissa.thanksforposts.notification.type.thanks_remove'), $item_ids, $this->user->data['user_id']);
	}

	public function get_post_info($post_id = false) : array
	{
		if (!$post_id)
		{
			return array();
		}
		$sql_array = array(
			'SELECT' => 'p.post_id, p.poster_id, p.topic_id, p.forum_id, p.post_subject',
			'FROM' => array($this->posts_table => 'p'),
			'WHERE' => 'p.post_id =' . (int) $post_id);
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row ? $row : array();
	}

	/**
	 * R
	 *
	 * @param float $rating (percent)
	 * @return String Reputation text using FontAwesome
	 */
	public function get_reputation_stars_from_rating($rating) : array
	{
		$ratingRounded = round($rating / 10);
		$count = 2;
		$output = array();

		for (; $count < $ratingRounded; $count += 2)
		{
			$output[] = "fa-solid fa-star";
		}

		if ($ratingRounded < 1)
		{
			$output[] = "fa-regular fa-star fa-star-o";
		} elseif (($ratingRounded % 2) === 0)
		{
			$output[] = "fa-solid fa-star";
		} else
		{
			$output[] = "fa-regular fa-star-half-stroke fa-star-half-o";
		}
		$count += 2;
		for (; $count <= 10; $count += 2)
		{
			$output[] = "fa-regular fa-star fa-star-o";
		}
		return $output;
	}

	// Get user needed info
	public function get_post_row($post_id) : array
	{
		if (!$post_id)
		{
			return array();
		}
		$sql_array = array(
			'SELECT' => 'p.*, u.username, u.username_clean, u.user_colour',
			'FROM' => array($this->posts_table => 'p', $this->users_table => 'u'),
			'WHERE' => 'p.post_id =' . (int) $post_id
		);
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row ? $row : array();
	}

	// Get user needed info
	public function get_topic_info($topic_id) : array
	{
		if (!$topic_id)
		{
			return array();
		}
		$sql_array = array(
			'SELECT' => 't.*',
			'FROM' => array($this->topics_table => 't'),
			'WHERE' => 't.topic_id =' . (int) $topic_id
		);
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row ? $row : array();
	}

// Generate thankslist if required ...
	public function get_username_string($part, $user_id) : string
	{
		$thanks_list = '';

		$sql = 'SELECT u.username, u.user_colour
			FROM ' . $this->users_table . ' u
			WHERE u.user_id = ' . (int) $user_id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		if ($row)
		{
			return get_username_string($part, $user_id, $row['username'], $row['user_colour']);
		}
		return "";
	}

}
