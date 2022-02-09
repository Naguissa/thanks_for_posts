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
	'CLEAR_LIST_THANKS' => 'Wyczyść Listę Podziękowań',
	'CLEAR_LIST_THANKS_CONFIRM' => 'Czy na pewno chcesz wyczyścic listę podziekowań użytkownika?',
	'CLEAR_LIST_THANKS_GIVE' => 'Lista Podziękowań wystawiona przez użytkownika została wyczyszczona.',
	'CLEAR_LIST_THANKS_POST' => 'Lista Podziękowań w wiadomościach została wyczyszczona',
	'CLEAR_LIST_THANKS_RECEIVE' => 'Lista Podziękowań otrzymana przez użytowanika została wyczyszczona.',
	'DISABLE_REMOVE_THANKS' => 'Usuwanie PODZIĘKOWAŃ wyłączone przez administratora',
	'GIVEN' => 'Podziękował;',
	'GLOBAL_INCORRECT_THANKS' => 'Nie moźesz podziekować w Globalnym Ogłoszeniu ponieważ nie mają one odniesienia do konkretnego forum..',
	'GRATITUDES' => 'Podziękowania',
	'INCORRECT_THANKS' => 'Nieważne podziękowania',
	'JUMP_TO_FORUM' => 'Skocz do działu',
	'JUMP_TO_TOPIC' => 'Skocz do tematu',
	'FOR_MESSAGE' => 'za post',
	'FURTHER_THANKS' => array(
		1 => ' i jeszcze jeden użytkownik',
		2 => ' i %d użytkowników'
	),
	'NO_VIEW_USERS_THANKS' => 'Nie posiadasz odpowiednich uprawnień, aby przeglądać listę podziękowań.',
	'NOTIFICATION_THANKS_GIVE' => array(
		1 => '<strong>Otrzymane podziękowanie</strong> od %1$s za post:',
		2 => '<strong>Otrzymane podziękowania</strong> od %1$s za post:',
	),
	'NOTIFICATION_THANKS_REMOVE' => array(
		1 => '<strong>Usuniete podziekowanie</strong> od %1$s za post:',
		2 => '<strong>Usunięte podziekowania</strong> od %1$s za post:',
	),
	'NOTIFICATION_TYPE_THANKS' => 'Dzięki za wiadomość',
	'NOTIFICATION_TYPE_THANKS_GIVE' => 'Ktoś Ci podziękował za post',
	'NOTIFICATION_TYPE_THANKS_REMOVE' => 'Ktoś usunął podziękowanie za twój post',
	'RECEIVED' => 'Otrzymał&nbsp;podziękowań',
	'REMOVE_THANKS' => 'Usuń swoje podziękowanie: ',
	'REMOVE_THANKS_CONFIRM' => 'Czy jesteś pewien, że chcesz usunąć podziękowanie?',
	'REMOVE_THANKS_SHORT' => 'Usuń podziękowanie',
	'REPUT' => 'Ocena',
	'REPUT_TOPLIST' => 'Lista Podziękowań — %d',
	'RATING_LOGIN_EXPLAIN' => 'Nie masz uprawnień, aby zobaczyć topliste.',
	'RATING_NO_VIEW_TOPLIST' => 'Nie masz uprawnień, aby zobaczyć topliste.',
	'RATING_VIEW_TOPLIST_NO' => 'Toplista jest pusta lub została wyłączona przez administratora',
	'RATING_FORUM' => 'Forum',
	'RATING_POST' => 'Post',
	'RATING_TOP_FORUM' => 'Ocena for',
	'RATING_TOP_POST' => 'Ocena postów',
	'RATING_TOP_TOPIC' => 'Ocena tematów',
	'RATING_TOPIC' => 'Wątek',
	'THANK' => 'razy',
	'THANK_FROM' => 'z',
	'THANK_TEXT_1' => 'Za ten post autor ',
	'THANK_TEXT_2' => array(
		1 => ' otrzymał podziękowanie: ',
		2 => ' otrzymał podziękowania (total %d):'
	),
	'THANK_POST' => 'Kliknij aby podziękować autorowi posta: ',
	'THANK_POST_SHORT' => 'Podziękowanie',
	'THANKS' => array(
		1 => '%d raz',
		2 => '%d razy',
	),
	'THANKS_BACK' => 'Powrót',
	'THANKS_INFO_GIVE' => 'Właśnie podziękowałeś autorowi tego posta.',
	'THANKS_INFO_REMOVE' => 'Usunąłeś podziękowanie przyznane za ten post.',
	'THANKS_LIST' => 'Pokaż/Ukryj listę',
	'THANKS_PM_MES_GIVE' => 'Podziękuj za wiadomość',
	'THANKS_PM_MES_REMOVE' => 'Usunięto podziękowanie',
	'THANKS_PM_SUBJECT_GIVE' => 'Podziękowanie za post',
	'THANKS_PM_SUBJECT_REMOVE' => 'Usunięto podziękowanie za post',
	'THANKS_USER' => 'Lista podziekowań',
	'TOPLIST' => 'Toplista',
	'THANKS_AJAX_NOT_LOGGED' => "Niezidentyfikowany użytkownik",
	'THANKS_AJAX_NOT_ACTION' => "Niewłaściwe działanie",
	'THANKS_AJAX_INCORRECT_PARAMETERS' => "Nieprawidłowe parametry"
		));
