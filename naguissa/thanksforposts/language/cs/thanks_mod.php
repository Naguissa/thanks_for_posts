<?php

/**
 *
 * Thanks For Posts extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'CLEAR_LIST_THANKS' => 'Smazat seznam poděkování',
	'CLEAR_LIST_THANKS_CONFIRM' => 'Opravdu chcete vymazat uživatelova poděkování?',
	'CLEAR_LIST_THANKS_GIVE' => 'Seznam poděkovaní odeslaných uživatelem byl smazán.',
	'CLEAR_LIST_THANKS_POST' => 'Seznam poděkování v daném příspěvku byl smazán.',
	'CLEAR_LIST_THANKS_RECEIVE' => 'Seznam poděkování získaných uživatelem byl smazán.',
	'DISABLE_REMOVE_THANKS' => 'Odstranění poděkování bylo zakázáno administrátorem',
	'GIVEN' => 'Udělil poděkování',
	'GLOBAL_INCORRECT_THANKS' => 'Nemůžete poděkovat za globální oznámení, které nemá žádný odkaz na konkrétní fórum.',
	'GRATITUDES' => 'Seznam poděkování',
	'INCORRECT_THANKS' => 'Neplatná poděkování',
	'JUMP_TO_FORUM' => 'Přejít na fórum',
	'JUMP_TO_TOPIC' => 'Přejít na téma',
	'FOR_MESSAGE' => ' za příspěvek',
	'FURTHER_THANKS' => array(
		1 => ' a další uživatel',
		2 => ' a %d více uživatelů'
	),
	'NO_VIEW_USERS_THANKS' => 'Nemáte oprávnění zobrazit seznam poděkování.',
	'NOTIFICATION_THANKS_GIVE' => array(
		1 => '<strong>Přijaté poděkování</strong> od %1$s za příspěvek:',
		2 => '<strong>Přijatá poděkování</strong> od %1$s za příspěvek:',
	),
	'NOTIFICATION_THANKS_REMOVE' => array(
		1 => '<strong>Odstraněné poděkování</strong> od %1$s za příspěvek:',
		2 => '<strong>Odstraněná poděkování</strong> od %1$s za příspěvek:',
	),
	'NOTIFICATION_TYPE_THANKS' => 'Děkujeme za tvou zprávu',
	'NOTIFICATION_TYPE_THANKS_GIVE' => 'Někdo vám děkuje za příspěvek',
	'NOTIFICATION_TYPE_THANKS_REMOVE' => 'Někdo odstranil poděkování za příspěvek',
	'RECEIVED' => 'Obdržel poděkování',
	'REMOVE_THANKS' => 'Odstranit svoje poděkování: ',
	'REMOVE_THANKS_CONFIRM' => 'Opravdu chcete odstranit svoje poděkování?',
	'REMOVE_THANKS_SHORT' => 'Odstranit poděkování',
	'REPUT' => 'Hodnocení',
	'RATING_LOGIN_EXPLAIN' => 'Nemáte oprávnění na zobrazení TOP listu.',
	'REPUT_TOPLIST' => 'Poděkování TOP listu — %d',
	'RATING_NO_VIEW_TOPLIST' => 'Nemáte oprávnění na zobrazení TOP listu.',
	'RATING_VIEW_TOPLIST_NO' => 'TOP list je prázdný nebo zakázaný administrátorem',
	'RATING_FORUM' => 'Fórum',
	'RATING_POST' => 'Příspěvek',
	'RATING_TOP_FORUM' => 'Hodnocení fóra',
	'RATING_TOP_POST' => 'Hodnocení témat',
	'RATING_TOPIC' => 'Téma',
	'THANK' => 'čas',
	'THANK_FROM' => 'od',
	'THANK_TEXT_1' => 'Tito uživatelé poděkovali autorovi ',
	'THANK_TEXT_2' => array(
		1 => ' za příspěvek: ',
		2 => ' za příspěvek (spolu %d):'
	),
	'THANK_POST' => 'Poděkujte autorovi příspěvku: ',
	'THANK_POST_SHORT' => 'Děkuji',
	'THANKS' => array(
		1 => '%d x',
		2 => '%d x',
	),
	'THANKS_BACK' => 'Zpět',
	'THANKS_INFO_GIVE' => 'Právě jste poděkovali za tento příspěvek.',
	'THANKS_INFO_REMOVE' => 'Právě jste odstranili svoje poděkování.',
	'THANKS_LIST' => 'Zobrazit/zavřít seznam',
	'THANKS_PM_MES_GIVE' => 'vám poděkoval za příspěvek',
	'THANKS_PM_MES_REMOVE' => 'odstranil poděkování za příspěvek',
	'THANKS_PM_SUBJECT_GIVE' => 'Děkujeme za příspěvek.',
	'THANKS_PM_SUBJECT_REMOVE' => 'Odstraněné poděkování za příspěvek',
	'THANKS_USER' => 'Seznam poděkování',
	'TOPLIST' => 'Příspěvky TOP list',
	'THANKS_AJAX_NOT_LOGGED' => "Neznámý uživatel",
	'THANKS_AJAX_NOT_ACTION' => "Špatná akce",
	'THANKS_AJAX_INCORRECT_PARAMETERS' => "Špatné parametry"
		));
