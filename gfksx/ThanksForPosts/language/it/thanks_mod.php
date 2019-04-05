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
	'CLEAR_LIST_THANKS' => 'Azzera lista ringraziamaneti',
	'CLEAR_LIST_THANKS_CONFIRM' => 'Vuoi veramente azzerare la lista utente dei ringraziamenti?',
	'CLEAR_LIST_THANKS_GIVE' => 'La lista dei ringraziamenti fatti è stata azzerata.',
	'CLEAR_LIST_THANKS_POST' => 'La lista dei ringraziamenti del messaggio è stata azzerata.',
	'CLEAR_LIST_THANKS_RECEIVE' => 'La lista dei ringraziamenti ricevuti è stata azzerata.',
	'DISABLE_REMOVE_THANKS' => 'Amministartore non permette la cancellazione della lista dei ringraziamenti',
	'GIVEN' => 'Ha ringraziato',
	'GLOBAL_INCORRECT_THANKS' => 'Non puoi ringraziare un annuncio globale non riferito ad un forum specifico.',
	'GRATITUDES' => 'Lista ringraziamenti',
	'INCORRECT_THANKS' => 'ringraziamento invalido',
	'JUMP_TO_FORUM' => 'Vai al forum',
	'JUMP_TO_TOPIC' => 'Vai al topic',
	'FOR_MESSAGE' => ' per il post',
	'FURTHER_THANKS' => array(
		1 => ' ed un altro utente',
		2 => ' ed altri %d utenti'
	),
	'NO_VIEW_USERS_THANKS' => 'Non sei autorizzato a vedere la lista dei ringraziamenti.',
	'NOTIFICATION_THANKS_GIVE' => array(
		1 => '<strong>ringraziamento ricevuto</strong> da %1$s per il post:',
		2 => '<strong>ringraziamenti ricevuti</strong> da %1$s per il post:',
	),
	'NOTIFICATION_THANKS_REMOVE' => array(
		1 => '<strong>ringraziamento rimosso</strong> da %1$s per il post:',
		2 => '<strong>ringraziamenti rimossi</strong> da %1$s per il post:',
	),
	'NOTIFICATION_TYPE_THANKS' => 'Grazie per il tuo messaggio',
	'NOTIFICATION_TYPE_THANKS_GIVE' => 'Qualcuno ti ha ringraziato per il tuo post',
	'NOTIFICATION_TYPE_THANKS_REMOVE' => 'Qualcuno ha rimosso il grazie al tuo post',
	'RECEIVED' => 'Sei stato &nbsp;ringraziato',
	'REMOVE_THANKS' => 'Rimuovi il tuo grazie: ',
	'REMOVE_THANKS_CONFIRM' => 'Sei sicuro di voler rimuovere il grazie?',
	'REMOVE_THANKS_SHORT' => 'Grazie rimosso',
	'REPUT' => 'Reputazione',
	'REPUT_TOPLIST' => 'Classifica ringraziamenti, primi %d posti',
	'RATING_LOGIN_EXPLAIN' => 'Non sei autorizzato a vedere la classifica dei ringraziamenti.',
	'RATING_NO_VIEW_TOPLIST' => 'Non sei autorizzato a vedere la classifica dei ringraziamenti.',
	'RATING_VIEW_TOPLIST_NO' => 'La classifica è vuota o disabilitata',
	'RATING_FORUM' => 'Forum',
	'RATING_POST' => 'Post',
	'RATING_TOP_FORUM' => 'Classifica forums',
	'RATING_TOP_POST' => 'Classifica posts',
	'RATING_TOP_TOPIC' => 'Classifica topics',
	'RATING_TOPIC' => 'Topic',
	'THANK' => 'volte',
	'THANK_FROM' => 'da',
	'THANK_TEXT_1' => 'Questi utenti hanno ringraziato l autore ',
	'THANK_TEXT_2' => array(
		1 => ' per il post: ',
		2 => ' per questi %d post:'
	),
	'THANK_POST' => 'Riingrazia l autore del post: ',
	'THANK_POST_SHORT' => 'Grazie',
	'THANKS' => array(
		1 => '%d volta',
		2 => '%d volte',
	),
	'THANKS_BACK' => 'Ritorno',
	'THANKS_INFO_GIVE' => 'Hai appena ringraziato per il post.',
	'THANKS_INFO_REMOVE' => 'Hai appena rimosso il tuo grazie per il post.',
	'THANKS_LIST' => 'Vedi/Chiudi lista',
	'THANKS_PM_MES_GIVE' => 'ti ha ringraziato per il post',
	'THANKS_PM_MES_REMOVE' => 'ha rimosso il grazie per il post',
	'THANKS_PM_SUBJECT_GIVE' => 'Grazie per il post',
	'THANKS_PM_SUBJECT_REMOVE' => 'Rimosso il grazie per il post',
	'THANKS_USER' => 'Lista dei ringraziamenti',
	'TOPLIST' => 'Classifica Posts'
));
