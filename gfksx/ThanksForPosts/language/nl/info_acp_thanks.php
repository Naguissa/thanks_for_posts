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
	'ACP_DELTHANKS' => 'Verwijderde geregistreerde waarderingen',
	'ACP_POSTS' => 'Aantal berichten',
	'ACP_POSTSEND' => 'Overgebleven berichten met waarderingen',
	'ACP_POSTSTHANKS' => 'Aantal berichten met waarderingen',
	'ACP_THANKS' => 'Waarderingen',
	'ACP_THANKS_DB_VER' => 'Database versie:',
	'ACP_THANKS_TRUNCATE' => 'Verwijder alle waarderingen',
	'ACP_ALLTHANKS' => 'Aantal van toepassing zijnde waarderingen',
	'ACP_THANKSEND' => 'Aantal overgebleven van toepassing zijnde waarderingen',
	'ACP_THANKS_REPUT' => 'Rating Instellingen',
	'ACP_THANKS_REPUT_SETTINGS' => 'Rating Instellingen',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Stel hier de standaard instellingen in voor het waarderen van berichten, onderwerpen en fora, gebaseerd op het waarderingen systeem.<br /> Het onderdeel (bericht, onderwerp of forum) met het grootste aantal waarderingen krijgt de 100% rating.',
	'ACP_THANKS_SETTINGS' => 'Waarderingen Instellingen',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Standaard waarderingen instellingen kunnen hier worden aangepast.',
	'ACP_THANKS_REFRESH' => 'Statistieken bijwerken',
	'ACP_UPDATETHANKS' => 'Bijgewerkte geregistreerde waarderingen',
	'ACP_USERSEND' => 'Overgebleven gebruikers die hebben gewaardeerd',
	'ACP_USERSTHANKS' => 'Aantal gebruikers die hebben gewaardeerd',
	'IMG_THANKPOSTS' => 'Om het bericht te waarderen',
	'IMG_REMOVETHANKS' => 'Annuleer waardering',
	'LOG_CONFIG_THANKS' => 'Configuratie bijgewerkt voor Waarderingen Extensie',
	'REFRESH' => 'Verversen',
	'REMOVE_THANKS' => 'Verwijder waardering',
	'REMOVE_THANKS_EXPLAIN' => 'Gebruikers kunnen waarderingen verwijderen wanneer deze optie is ingeschakeld.',
	'STEPR' => ' - uitgevoerd, stap %s',
	'THANKS_COUNTERS_VIEW' => 'Waarderingen Statistieken',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Indien ingeschakeld, geeft wordt waarderingen statistieken getoond in het gebruikersblok.',
	'THANKS_FORUM_REPUT_VIEW' => 'Toon forum rating',
	'THANKS_GLOBAL_POST' => 'Waarderingen in Globale Aankondigingen',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Indien ingeschakeld, zijn waarderingen in Globale Aankondigingen toegestaan.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Indien ingeschakeld, wordt de forum rating getoond in het forumoverzicht.',
	'THANKS_INFO_PAGE' => 'Informatieve berichten',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Indien ingeschakeld, wordt na het waarderen een informatief bericht getoond.',
	'THANKS_NOTICE_ON' => 'Notificaties zijn beschikbaar',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Indien ingeschakeld, notificaties zijn beschikbaar en de gebruiker kan dit instellen via het profiel',
	'THANKS_NUMBER' => 'Aantal waarderingen getoond in het profiel',
	'THANKS_NUMBER_EXPLAIN' => 'Maximum aantal waarderingen dat wordt getoond in een profiel. <br /> <strong>Indien dit aantal hoger is dan 250, dan heeft dit effect op de prestaties.</strong>',
	'THANKS_NUMBER_DIGITS' => 'Aantal decimalen nauwkeurig voor de rating',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Specificeer de nauwkeurigheid voor de rating waarde.',
	'THANKS_NUMBER_ROW_REPUT' => 'Het aantal rijen in de lijst van topratings',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Specificeer het aantal rijen om weer te geven in de berichten, onderwerpen en forum toprating lijst.',
	'THANKS_NUMBER_POST' => 'Aantal waarderingen dat wordt getoond in een bericht',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Maximum aantal waarderingen dat wordt weergegeven in een bericht. <br /> <strong> Indien dit aantal hoger is dan 250, dan heeft dit effect op de prestaties.</strong>',
	'THANKS_ONLY_FIRST_POST' => 'Alleen het eerste bericht in het onderwerp',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Indien ingeschakeld, kunnen gebruikers alleen het eerste bericht in het onderwerp waarderen.',
	'THANKS_POST_REPUT_VIEW' => 'Toon rating voor berichten',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Indien ingeschakeld, worden ratings in berichten getoond wanneer een onderwerp wordt bekeken.',
	'THANKS_POSTLIST_VIEW' => 'Lijst van waarderingen in bericht',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Indien ingeschakeld, zal een lijst van gebruikers welke het bericht hebben gewaardeerd worden getoond. <br />
	Deze optie is alleen van toepassing indien de beheerder de permissie om waarderingen uit te delen heeft ingeschakeld voor dat forum.',
	'THANKS_PROFILELIST_VIEW' => 'Toon waarderingen in gebruikersprofiel',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Indien ingeschakeld, wordt een complete lijst van waarderingen getoond inclusief de berichten waar de gebruiker voor is gewaardeerd en de berichten die een gebruiker heeft gewaardeerd.',
	'THANKS_REFRESH' => 'Werk waarderingen statistieken bij',
	'THANKS_REFRESH_EXPLAIN' => 'Hier kunnen de statistieken worden bijgewerkt na bulk operaties op berichten/onderwerpen/gebruikers, splitsen/samenvoegen van onderwerpen, instellen/verwijderen globale aankondigingen, in/uitschakelen optie "Alleen het eerste bericht in het onderwerp", wijzigen van bericht eigenaren, etc. Deze operatie kan even duren.<br /><strong>Belangrijk: Deze functie werkt alleen indien MySQL versie 4.1 of hoger wordt gebruikt!<br />Attentie!<br /> - Verversen zal alle waarderingen van gasten verwijderen!<br /> - Verversem zal alle waarderingen op Globale Aankondigingen verwijderen indien de optie "Waarderingen in Globale Aankondigingen" is uitgeschakeld!<br /> - 
	Verversen zal alle waarderingen verwijderen behalve voor eerste berichten in onderwerpen, indien de optie "Alleen het eerste bericht in het onderwerp" is ingeschakeld!</strong>',
	'THANKS_REFRESH_MSG' => 'Deze operatie kan enkele minuten duren. Alle ongeldige waarderingen worden verwijderd! <br /> Deze actie is onomkeerbaar!',
	'THANKS_REFRESHED_MSG' => 'Statistieken bijgewerkt',
	'THANKS_REPUT_GRAPHIC' => 'Grafische weergave van de rating',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Indien ingeschakeld, zal de rating waarde grafisch worden getoond.',
	'THANKS_TIME_VIEW' => 'Tijdstip waardering',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Indien ingeschakeld, zal het bericht de tijd tonen van de waardering.',
	'THANKS_TOP_NUMBER' => 'Aantal gebruikers in de top lijst',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Specificeer het aantal gebruikers om te tonen in de toplijst. Indien 0, wordt de toplijst niet getoond.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Toon onderwerp rating',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Indien ingeschakeld, dan wordt de onderwerp rating getoond bij het bekijken van het forum.',
	'TRUNCATE' => 'Verwijder',
	'TRUNCATE_THANKS' => 'Verwijder waarderingen',
	'TRUNCATE_THANKS_EXPLAIN' => 'Deze procedure verwijderd alle statistieken. <br /> Deze actie is onomkeerbaar!!',
	'TRUNCATE_THANKS_MSG' => 'Waardingen statistieken gerest.',
	'REFRESH_THANKS_CONFIRM' => 'Weet je zeker dat je de waarderingen statistieken wilt verversen?',
	'TRUNCATE_THANKS_CONFIRM' => 'Weet je zeker dat je de waarderingen statistieken wilt verwijderen?',
	'TRUNCATE_NO_THANKS' => 'Operatie geannuleerd',
	'ALLOW_THANKS_PM_ON' => 'Geef een notificatie per PB indien iemand mijn bericht waardeert',
	'ALLOW_THANKS_EMAIL_ON' => 'Geef een notificatie per e-mail indien iemand mijn bericht waardeert',
	'THANKS_POST_VIEW_GUESTS' => 'Toon aan niet geidentificeerde gebruikers (gasten)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Indien ingeschakeld, zullen waarderingen en reputatie (indien ingeschakeld) worden getoond aan niet geidentificeerde gebruikers (gasten).',
	'THANKS_POST_VIEW_ROBOTS' => 'Toon aan zoekmachines (bots)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Indien ingeschakeld, dan worden de waarderingen en reputatie (indien ingeschakeld) getoond aan zoekmachines (bots).'
		));
