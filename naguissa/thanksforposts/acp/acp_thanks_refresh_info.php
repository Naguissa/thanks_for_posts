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

class acp_thanks_refresh_info
{

	function module()
	{
		return array(
			'filename' => '\naguissa\thanksforposts\acp\acp_thanks_refresh_module',
			'title' => 'ACP_THANKS_REFRESH',
			'modes' => array(
				'thanks' => array('title' => 'ACP_THANKS_REFRESH', 'auth' => 'ext_naguissa/thanksforposts && acl_a_board', 'cat' => array('ACP_THANKS')),
			),
		);
	}

}
