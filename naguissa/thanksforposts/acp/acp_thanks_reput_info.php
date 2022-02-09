<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace naguissa\thanksforposts\acp;

class acp_thanks_reput_info
{

	function module()
	{
		return array(
			'filename' => '\naguissa\thanksforposts\acp\acp_thanks_reput_module',
			'title' => 'ACP_THANKS_REPUT_SETTINGS',
			'modes' => array(
				'thanks' => array('title' => 'ACP_THANKS_REPUT_SETTINGS', 'auth' => 'ext_naguissa/thanksforposts && acl_a_board', 'cat' => array('ACP_THANKS')),
			),
		);
	}

}
