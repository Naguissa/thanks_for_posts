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
	'CLEAR_LIST_THANKS' => 'Zmazať zoznam poďakovaní',
	'CLEAR_LIST_THANKS_CONFIRM' => 'Naozaj chcete vymazať užívateľove poďakovania?',
	'CLEAR_LIST_THANKS_GIVE' => 'Zoznam poďakovaní vydaných používateľom bol zmazaný.',
	'CLEAR_LIST_THANKS_POST' => 'Zoznam poďakovaní v správe bol zmazaný.',
	'CLEAR_LIST_THANKS_RECEIVE' => 'Zoznam poďakovaní získaných používateľom bol zmazaný.',
	'DISABLE_REMOVE_THANKS' => 'Odstránenie poďakovania bolo zakázané administrátorom',
	'GIVEN' => 'Udelil poďakovanie',
	'GLOBAL_INCORRECT_THANKS' => 'Nemôžete poďakovať za globálne oznámenie, ktoré nemá žiadny odkaz na konkrétne fórum',
	'GRATITUDES' => 'Zoznam poďakovaní',
	'INCORRECT_THANKS' => 'Neplatná poďakovanie',
	'JUMP_TO_FORUM' => 'Prejsť na fórum',
	'JUMP_TO_TOPIC' => 'Prejsť na tému',
	'FOR_MESSAGE' => ' za príspevok',
	'FURTHER_THANKS' => array(
		1 => ' a ďalší používateľ',
		2 => ' a %d viac používateľov'
	),
	'NO_VIEW_USERS_THANKS' => 'Nemáte oprávnenie na zobrazenie zoznamu poďakovaní.',
	'NOTIFICATION_THANKS_GIVE' => array(
		1 => '<strong>Prijaté poďakovanie</strong> od %1$s za príspevok:',
		2 => '<strong>Prijaté poďakovanie</strong> od %1$s za príspevok:',
	),
	'NOTIFICATION_THANKS_REMOVE' => array(
		1 => '<strong>Odstránené poďakovanie</strong> od %1$s za príspevok:',
		2 => '<strong>Odstránené poďakovanie</strong> od %1$s za príspevok:',
	),
	'NOTIFICATION_TYPE_THANKS' => 'Ďakujem za tvoju správu',
	'NOTIFICATION_TYPE_THANKS_GIVE' => 'Niekto vám ďakuje za príspevok',
	'NOTIFICATION_TYPE_THANKS_REMOVE' => 'Niekto odstránil poďakovanie za príspevok',
	'RECEIVED' => 'Obdržal&nbsp;poďakovanie',
	'REMOVE_THANKS' => 'Odstrániť svoje poďakovania: ',
	'REMOVE_THANKS_CONFIRM' => 'Naozaj chcete odstrániť svoje poďakovania?',
	'REMOVE_THANKS_SHORT' => 'Odstrániť poďakovania',
	'REPUT' => 'Hodnotenie',
	'REPUT_TOPLIST' => 'Poďakovania toplistu — %d',
	'RATING_LOGIN_EXPLAIN' => 'Nemáte oprávnenie na zobrazenie toplistu.',
	'RATING_NO_VIEW_TOPLIST' => 'Nemáte oprávnenie na zobrazenie toplistu.',
	'RATING_VIEW_TOPLIST_NO' => 'Toplist je prázdny alebo zakázaný administrátorom',
	'RATING_FORUM' => 'Fórum',
	'RATING_POST' => 'Príspevok',
	'RATING_TOP_FORUM' => 'Hodnotenie fóra',
	'RATING_TOP_POST' => 'Hodnotenie príspevkov',
	'RATING_TOP_TOPIC' => 'Hodnotenie tém',
	'RATING_TOPIC' => 'Téma',
	'THANK' => 'čas',
	'THANK_FROM' => 'od',
	'THANK_TEXT_1' => 'Títo používatelia poďakovali autorovi ',
	'THANK_TEXT_2' => array(
		1 => ' za príspevok: ',
		2 => ' za príspevok (spolu %d):'
	),
	'THANK_POST' => 'Dajte poďakovanie autorovi príspevku: ',
	'THANK_POST_SHORT' => 'Ďakujem',
	'THANKS' => array(
		1 => '%d x',
		2 => '%d x',
	),
	'THANKS_BACK' => 'Späť',
	'THANKS_INFO_GIVE' => 'Práve ste poďakovali za tento príspevok.',
	'THANKS_INFO_REMOVE' => 'Práve ste odstránili svoje poďakovanie.',
	'THANKS_LIST' => 'Zobraziť/Zatvoriť zoznam',
	'THANKS_PM_MES_GIVE' => 'vám poďakoval za príspevok',
	'THANKS_PM_MES_REMOVE' => 'odstránil poďakovanie za príspevok',
	'THANKS_PM_SUBJECT_GIVE' => 'Ďakujem za príspevok',
	'THANKS_PM_SUBJECT_REMOVE' => 'Odstránené poďakovanie za príspevok',
	'THANKS_USER' => 'Zoznam poďakovaní',
	'TOPLIST' => 'Príspevky toplist'
));
