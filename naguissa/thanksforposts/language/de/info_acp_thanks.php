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
	'ACP_DELTHANKS' => 'Entfernte Danksagungen',
	'ACP_POSTS' => 'Beiträge insgesamt',
	'ACP_POSTSEND' => 'Verbleibende Beiträge mit Danksagungen',
	'ACP_POSTSTHANKS' => 'Beiträge mit Danksagungen',
	'ACP_THANKS' => 'Danksagungen für Beiträge',
	'ACP_THANKS_DB_VER' => 'Datenbankversion:',
	'ACP_THANKS_TRUNCATE' => 'Die Liste der Danksagungen löschen',
	'ACP_ALLTHANKS' => 'Zu löschende Danksagungen',
	'ACP_THANKSEND' => 'Verbleibende zu löschende Danksagungen',
	'ACP_THANKS_REPUT' => 'Bewertungseinstellungen',
	'ACP_THANKS_REPUT_SETTINGS' => 'Bewertungseinstellungen',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Setze die Standardeinstellungen für die Bewertung von Beiträgen, Themen und Foren, für die Erweiterung "Danksagungen für Beiträge".<br />Der betreffende Typ (Beitrag, Thema, Forum) mit der höchsten Anzahl an Danksagungen erhält eine 100% Bewertung.',
	'ACP_THANKS_SETTINGS' => 'Danksagungseinstellungen',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Die Standardeinstellungen für die Erweiterung "Danksagungen für Beiträge" kann hier geändert werden.',
	'ACP_THANKS_REFRESH' => 'Danksagungen aktualisieren',
	'ACP_UPDATETHANKS' => 'Danksagungen wurden aktualisiert',
	'ACP_USERSEND' => 'Verbleibende Benutzer, die sich bedankten',
	'ACP_USERSTHANKS' => 'Benutzer, die sich bedankten',
	'IMG_THANKPOSTS' => 'Für den Beitrag bedanken',
	'IMG_REMOVETHANKS' => 'Danksagung entfernen',
	'LOG_CONFIG_THANKS' => 'Konfiguration für die Erweiterung "Danksagungen für Beiträge" aktualisiert.',
	'REFRESH' => 'Aktualisieren',
	'REMOVE_THANKS' => 'Danksagungen entfernen',
	'REMOVE_THANKS_EXPLAIN' => 'Falls diese Option aktiviert ist, können Benutzer ihre Danksagungen entfernen.',
	'STEPR' => ' - ausgeführt, Schritt %s',
	'THANKS_COUNTERS_VIEW' => 'Danksagungszähler',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Falls aktiviert, wird im Informationsblock des Autors die Anzahl an Danksagungen und erhaltenen Danksagungen angezeigt.',
	'THANKS_FORUM_REPUT_VIEW' => 'Forenbewertungen anzeigen',
	'THANKS_GLOBAL_POST' => 'Danksagungen in globalen Ankündigungen aktivieren',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Falls aktiviert, werden Danksagungen in globalen Akündigungen angezeigt.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Falls aktiviert, wird die Forenbewertung in der Forenliste angezeigt.',
	'THANKS_INFO_PAGE' => 'Bestätigungsmeldungen aktivieren',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Falls aktiviert, wird nach dem Bedanken oder nach dem Entfernen einer Danksagung eine Bestätigungsmeldung angezeigt.',
	'THANKS_NOTICE_ON' => 'Benachrichtigungen aktivieren',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Falls aktiviert, wird der Benutzer über Danksagungen und entfernte Danksagungen benachrichtigt.<br />Der Benutzer kann die Benachrichtigungen in seinem Persönlichen Bereich konfigurieren.',
	'THANKS_NUMBER' => 'Anzahl an Danksagungen im Profil anzeigen',
	'THANKS_NUMBER_EXPLAIN' => 'Maximale Anzahl an Danksagungen, die im Profil angezeigt werden.<br /><strong>Hinweis: Die Leistung kann negativ beeinträchtigt werden, wenn dieser Wert über 250 gesetzt ist.</strong>',
	'THANKS_NUMBER_DIGITS' => 'Anzahl an Nachkommastellen bei Bewertungen',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Setze die Anzahl an Nachkommastellen bei Bewertungen.',
	'THANKS_NUMBER_ROW_REPUT' => 'Anzahl der Zeilen in der Bewertungstopliste',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Setze die Anzahl der Zeilen, die in den Beitrags-, Themen- und Forentoplisten angezeigt werden sollen.',
	'THANKS_NUMBER_POST' => 'Anzahl an angezeigten Danksagungen in einem Beitrag',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Maximale Anzahl an Danksagungen, die für einen Beitrag angezeigt werden.<br /><strong>Hinweis: Die Leistung kann negativ beeinträchtigt werden, wenn dieser Wert über 250 gesetzt ist.</strong>',
	'THANKS_ONLY_FIRST_POST' => 'Nur für den ersten Beitrag in einem Thema',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Falls aktiviert, können sich die Benutzer nur für den ersten Beitrag in einem Thema bedanken.',
	'THANKS_POST_REPUT_VIEW' => 'Bewertungen für Beiträge anzeigen',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Falls aktiviert, werden die Bewertungen für Beiträge angezeigt.',
	'THANKS_POSTLIST_VIEW' => 'Danksagungsliste im Beitrag anzeigen',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Falls aktiviert, wird eine Liste der Benutzer, die sich beim Autor bedankt haben angezeigt.<br/>Beachte, dass diese Option nur wirksam wird, wenn der Administrator die Berechtigung aktiviert hat, sich für einen Beitrag im Forum zu bedanken.',
	'THANKS_PROFILELIST_VIEW' => 'Danksagunsliste im Profil anzeigen',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Falls aktiviert, wird eine Liste aller Danksagungen, inklusive der Anzahl der Danksagungen und für welche Beiträge der Benutzer Danksagungen erhalten hat, angezeigt.',
	'THANKS_REFRESH' => 'Danksagungszähler aktualisieren',
	'THANKS_REFRESH_EXPLAIN' => 'Hier kannst du die Danksagungszähler aktualisieren, falls viele Beiträge, Themen oder Benutzt gelöscht wurden, Themen geteilt oder zusammengeführt wurden, globale Ankündigungen erstellt oder gelöscht wurden, die Einstellung "Nur für den ersten Beitrag in einem Thema" geändert wurde, Autoren von Themen geändert wurden, usw. Dies kann eine Weile dauern.<br /><strong>Hinweis: Damit diese Funktion richtig funkntioniert, wird MySQL in der Version 4.1 oder höher benötigt!<br />Achtung:<br /> - Das Aktualisieren wird alle Danksagungen in Gastbeiträgen löschen!<br /> - Das Aktualisieren wird alle Danksagungen in globalen Ankündigungen löschen, falls die Einstellung "Danksagungen in globalen Ankündigungen aktivieren" deaktiviert ist!<br /> - Das Aktualisieren wird alle Danksagungen, außer im ersten Beitrag eines Themas löschen, falls die Einstellung "Nur für den ersten Beitrag in einem Thema" aktiviert ist!</strong>',
	'THANKS_REFRESH_MSG' => 'Dies kann einige Minuten dauern. Alle ungültigen Danksagungen werden gelöscht!<br />Diese Aktion ist nicht umkehrbar!',
	'THANKS_REFRESHED_MSG' => 'Danksagungszähler aktualisiert.',
	'THANKS_REPUT_GRAPHIC' => 'Grafische Darstellung von Bewertungen',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Falls aktiviert, werden Bewertungen grafisch angezeigt.',
	'THANKS_TIME_VIEW' => 'Zeit der Danksagung anzeigen',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Falls aktiviert, wird die Zeit der Danksagung angezeigt.',
	'THANKS_TOP_NUMBER' => 'Anzahl der Benutzer in der Topliste',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Die Anzahl der Benutzer, die in der Topliste angezeigt werden. Der Wert "0" deaktiviert die Anzeige der Topliste.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Themenbewertung anzeigen',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Falls aktiviert, wird die Themenbewertung in der Forenliste angezeigt.',
	'TRUNCATE' => 'Löschen',
	'TRUNCATE_THANKS' => 'Die Liste der Danksagungen löschen',
	'TRUNCATE_THANKS_EXPLAIN' => 'Dieser Prozess löscht alle Danksagungszähler.<br />Diese Aktion ist nicht umkehrbar!',
	'TRUNCATE_THANKS_MSG' => 'Danksagungen wurden gelöscht.',
	'REFRESH_THANKS_CONFIRM' => 'Möchtest du wirklich alle Danksagungszähler aktualisieren?',
	'TRUNCATE_THANKS_CONFIRM' => 'Möchtest du wirklich alle Danksagungen löschen?',
	'TRUNCATE_NO_THANKS' => 'Aktion wurde abgebrochen',
	'ALLOW_THANKS_PM_ON' => 'Mich mittels Privater Nachricht benachrichtigen, wenn sich jemand bei mir bedankt.',
	'ALLOW_THANKS_EMAIL_ON' => 'Mich mittels E-Mail benachrichtigen, wenn sich jemand bei mir bedankt.',
	'THANKS_POST_VIEW_GUESTS' => 'Zeigen an nicht identifizierte Benutzer (Gäste)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Wenn aktiv, zeigt es Dank und Ruf (falls aktiv) an nicht identifizierte Benutzer (Gäste).',
	'THANKS_POST_VIEW_ROBOTS' => 'Zeigen an Suchmaschinen (Bots)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Wenn aktiv, zeigt es Dank und Ruf (falls aktiv) an Suchmaschinen (Bots).',
	'THANKS_SYMBOL_THANKS' => 'Danke-Button-Symbol',
	'THANKS_SYMBOL_THANKS_EXPLAIN' => 'Symbol aus der Schriftart FontAwesome für den Danke-Button. Standard ist: fa-thumbs-o-up',
	'THANKS_SYMBOL_REMOVE' => 'Danke-Button-Symbol entfernen',
	'THANKS_SYMBOL_REMOVE_EXPLAIN' => 'Symbol aus der FontAwesome-Schriftart für die Danke-Entfernen-Schaltfläche. Standard ist: fa-recycle',
	'THANKS_AJAX' => "Mit AJAX Dank sagen oder entfernen",
	'THANKS_AJAX_EXPLAIN' => "Wenn die Schaltflächen 'Danke geben' oder 'Danke entfernen' aktiv sind, wird keine neue Seite geladen. ACHTUNG: Wenn aktiv, funktionieren die Informations- und Bestätigungsdialoge nicht."
		));
