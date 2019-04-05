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

$lang = array_merge($lang, array(
	'ACP_DELTHANKS' => 'Cancella ringraziamenti registrati',
	'ACP_POSTS' => 'Post totali',
	'ACP_POSTSEND' => 'Posts rimasti con ringraziamento',
	'ACP_POSTSTHANKS' => 'Totale post con ringraziamenti',
	'ACP_THANKS' => 'Ringraziamento per i post',
	'ACP_THANKS_DB_VER' => 'Versione database:',
	'ACP_THANKS_TRUNCATE' => 'Azzera lista ringraziamenti',
	'ACP_ALLTHANKS' => 'Ringraziamenti ricevuti dall account',
	'ACP_THANKSEND' => 'Ringraziamenti inviati dall account',
	'ACP_THANKS_REPUT' => 'Opzioni Classifica',
	'ACP_THANKS_REPUT_SETTINGS' => 'Opzioni Classifica',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Scegli il settaggio per la classifica dei post, topic e forum, basata sul numero di ringraziamenti. <br />Il messaggio che hai il maggior numero di ringraziamenti rappresenta il 100%.',
	'ACP_THANKS_SETTINGS' => 'Settaggio ringraziamenti',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Qua si possono definire i settaggi predefiniti per il ringraziamento dei post.',
	'ACP_THANKS_REFRESH' => 'Aggiorna contatori',
	'ACP_UPDATETHANKS' => 'Aggiornamento ringraziamenti registrati',
	'ACP_USERSEND' => 'Utenti rimanenti che hanno fatto ringraziamenti',
	'ACP_USERSTHANKS' => 'Totale utenti che hanno ringraziato',
	'IMG_THANKPOSTS' => 'To thank for the post',
	'IMG_REMOVETHANKS' => 'Rimuovi ringraziamenti',
	'LOG_CONFIG_THANKS' => 'Aggiornata configurazione estensione del ringraziamento dei post',
	'REFRESH' => 'Aggiorna',
	'REMOVE_THANKS' => 'Rimuovi ringraziamenti',
	'REMOVE_THANKS_EXPLAIN' => 'Gli utenti possono rimuovere i ringraziamenti se questa opzione è attiva.',
	'STEPR' => ' - eseguito, passo %s',
	'THANKS_COUNTERS_VIEW' => 'Contatori ringraziamenti',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Se abilitato, la pagina informazione utente mostrerà il numero di ringraziamenti fatti/ricevuti.',
	'THANKS_FORUM_REPUT_VIEW' => 'Mostra classifica forums',
	'THANKS_GLOBAL_POST' => 'Ringraziamenti per gli Annunci Globali',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Se abilitato, sarà possibile effettuare ringraziamenti negli Annunci Globali.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Se abilitato, la classifica forum verrà visualizzare nella lista forum.',
	'THANKS_INFO_PAGE' => 'Messaggi informativi (notifiche)',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Se abilitato, verranno mostrati messaggi di notifica sulle azioni di mettere o togliere i ringraziamenti.',
	'THANKS_NOTICE_ON' => 'Disponibilità notifiche',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Se abilitato, utente può scegliere il tipo di notifica attraverso il pannello profilo utente',
	'THANKS_NUMBER' => 'Numero di ringraziamenti mostrati nella lista del profilo utente',
	'THANKS_NUMBER_EXPLAIN' => 'Numero massimo di ringraziamenti visualizzati nel profilo utente. <br /> <strong> Un valore superiore a 250 può causare il rallentamento della board. </strong>',
	'THANKS_NUMBER_DIGITS' => 'Numero di decimali visualizzati nel valore di classifica',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Specifica quanti decimali visualizzare nel valori di classifica.',
	'THANKS_NUMBER_ROW_REPUT' => 'Posizioni da mostrare nella classifica',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Specifica quante posizioni visualizzare nella classifica di post, topic e forum.',
	'THANKS_NUMBER_POST' => 'Numero di ringraziamenti da mostare nel post',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Numero massimo di ringraziamenti da visualizare in fondo al post. <br /> <strong> Un valore superiore a 250 può causare il rallentamento della board. </strong>',
	'THANKS_ONLY_FIRST_POST' => 'Solo per il primo messaggio (post) dell argomento',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Se abilitato, gli utenti possono ringraziare solo il primo messaggio (post) dell argomento.',
	'THANKS_POST_REPUT_VIEW' => 'Mostrare il valore di classifica del post',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Se abilitato, mostra il valore di classifica del post.',
	'THANKS_POSTLIST_VIEW' => 'Mostra ringraziamenti nel post',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Se abilitato, viene mostrata in fondo al post, la lista degli utenti che hanno ringraziato. <br/> Nota: funzionerà solo se sono stati concessi gli opportuni permessi relativi i ringraziamenti.',
	'THANKS_PROFILELIST_VIEW' => 'Mostra ringraziamenti nel profile utente',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Se abilitato, verrà visualizzata una lista completa di post con il numero di ringraziamenti ricevuti.',
	'THANKS_REFRESH' => 'Aggiorna contatore ringraziamenti',
	'THANKS_REFRESH_EXPLAIN' => 'Qua puoi aggiornare i contatori relativi i ringraziamenti dopo una rimozione consistente di post/topic/utenti, divisione/unione di post, inserimento/rimozione di Annunci Globali, abilita/disabilita opzione "Solo per il primo messaggio dell argomento", cambio propietà messaggio, eccetera. L operazione può durare a lungo.<br /><strong>Importante: il riconteggio funziona bene solo se MySQL è alla versione 4.1 o superiore!<br />Attentione!<br /> - Verranno cancellati tutti i grazie degli utenti "ospite"!<br /> - Verranno cancellati tutti i ringraziamenti negli Annunci Globali, se l`opzione "Ringraziamenti negli Annunci Globali" non è attiva!<br /> - Verranno cancellati tutti i ringraziamenti di messaggi successivi al primo se l opzione "Ringraziamenti solo nel primo messaggio" è attiva!</strong>',
	'THANKS_REFRESH_MSG' => 'Questa operazione può durare a lungo. Tutte i ringraziamenti "errati" verrano cancellati! <br /> Azione irreversibile!',
	'THANKS_REFRESHED_MSG' => 'Contatori aggiornati.',
	'THANKS_REPUT_GRAPHIC' => 'Visualizzazione grafica del valore di classifica',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Se abilitato, il valore di classifica verrà rappresentato anche graficamente.',
	'THANKS_TIME_VIEW' => 'Riferimento temporale del ringraziamento',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Se abilitato, verrà visualizzato quando è stato messo il ringraziamento.',
	'THANKS_TOP_NUMBER' => 'Numero utenti da mostrare nella classifica',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Specifica quanti utenti visualizzare nella classifica. Mettendo 0, la classifica non viene mostarta.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Mostra valore di classifica dei post',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Se abilitato, quando si visualizza il forum, il vaolore di classifica dei suoi post verrà mostrato.',
	'TRUNCATE' => 'Azzerare',
	'TRUNCATE_THANKS' => 'Azzera lista dei ringraziamenti',
	'TRUNCATE_THANKS_EXPLAIN' => 'Questa procedura azzera qualsiasi ringraziamento dato. <br /> Azione irreversibile!',
	'TRUNCATE_THANKS_MSG' => 'Contatori ringraziamenti azzerati.',
	'REFRESH_THANKS_CONFIRM' => 'Vuoi veramente aggiornare i contatori dei ringraziamenti?',
	'TRUNCATE_THANKS_CONFIRM' => 'Vuoi veramente azzerare i contatori dei ringraziamenti?',
	'TRUNCATE_NO_THANKS' => 'Operazione cancellata',
	'ALLOW_THANKS_PM_ON' => 'Notificami con PM se qualcuno mi ringrazia',
	'ALLOW_THANKS_EMAIL_ON' => 'Notificami con e-mail se qualcuno mi ringrazia',
	'THANKS_POST_VIEW_GUESTS' => 'Mostra agli utenti ospiti (nessun accesso effettuato)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Se abilitato, i ringraziamenti e la reputazione verrà mostarta agli utenti ospiti.',
	'THANKS_POST_VIEW_ROBOTS' => 'Mostra ai motori di ricerca (bots)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Se abilitato, i ringraziamenti e la reputazione verrà mostrata ai motori di ricerca (bots).'
		));
