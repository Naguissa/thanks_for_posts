<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace gfksx\ThanksForPosts\migrations;

class v_3_1_3 extends \phpbb\db\migration\migration
{

	protected $thanks_table_exists;
	protected $poster_id_field_exists;

	public function effectively_installed()
	{
		return isset($this->config['thanks_for_posts_version']) && version_compare($this->config['thanks_for_posts_version'], '3.1.3', '>=');
	}

	static public function depends_on()
	{
		return array('\gfksx\ThanksForPosts\migrations\v_3_1_2');
	}

	public function update_data()
	{
		return array(
			// Version update
			array('config.update', array('thanks_for_posts_version', '3.1.3'))
		);
	}

}
