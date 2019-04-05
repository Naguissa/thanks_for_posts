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
	'ACP_DELTHANKS'						=> 'Usunięte zapisane podziękowania',
	'ACP_POSTS'							=> 'Ilość wszystkich postów',
	'ACP_POSTSEND'						=> 'Pozostałe posty z podziękowaniami',
	'ACP_POSTSTHANKS'					=> 'Ilość wszystkich postów z podziękowaniami',
	'ACP_THANKS'						=> 'Podziękowania za posty',
	'ACP_THANKS_DB_VER' 				=> 'Wersja bazy danych:',
	'ACP_THANKS_TRUNCATE'				=> 'Wyczyść listę podziekowań',
	'ACP_ALLTHANKS'						=> 'Zostały uwzględnione w liście podziękowań',
	'ACP_THANKSEND'						=> 'Pozostają do uwzględnienia w liście podziękowań',
	'ACP_THANKS_REPUT'					=> 'Opcje oceniania',
	'ACP_THANKS_REPUT_SETTINGS'			=> 'Opcje oceniania',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN'	=> 'Tutaj możesz ustawić domyślne opcje oceniania postów, tematów i działów, opartych na systemie podziękowań. <br /> Temat (post, temat lub dział), który posiada największą liczbę podziękowań jest uważany za 100% w systemie ocen.',
	'ACP_THANKS_SETTINGS'				=> 'Ustawienia podziękowań',
	'ACP_THANKS_SETTINGS_EXPLAIN'		=> 'Ustawienia domyślne podziekowań mogą być tutaj zmienione.',
	'ACP_THANKS_REFRESH'				=> 'Aktualizuj licznik',
	'ACP_UPDATETHANKS'					=> 'Aktualizacja zapisanych podziękowań',
	'ACP_USERSEND'						=> 'Pozostała liczba użytkowników którzy podziękowali',
	'ACP_USERSTHANKS'					=> 'Wszyscy użytkownicy którzy podziekowali',
	'IMG_THANKPOSTS'					=> 'Naciśnij aby podziękować za post',
	'IMG_REMOVETHANKS'					=> 'Naciśnij aby usunąć podziękowanie',
    'LOG_CONFIG_THANKS'					=> 'Aktualizacja konfiguracji Modyfikacji Podziekowanie za post',
	'REFRESH'							=> 'Odswież',
	'REMOVE_THANKS'						=> 'Usuń podziękowania',
	'REMOVE_THANKS_EXPLAIN'				=> 'Jeśli włączone użytkownicy będą mogli usuwać podziękowania',
	'STEPR'								=> ' - wykonano, krok %s',
	'THANKS_COUNTERS_VIEW'				=> 'Licznik podziekowań',
	'THANKS_COUNTERS_VIEW_EXPLAIN'		=> 'Jeśli włączone, blok informacyjny o autorze będzie pokazywał ilość otrzymanych/wystawionych podziękowań.',
	'THANKS_FORUM_REPUT_VIEW'			=> 'Pokaż oceny dla forów',
	'THANKS_GLOBAL_POST'				=> 'Podziękowania w Globalnych Ogłoszeniach',
	'THANKS_GLOBAL_POST_EXPLAIN'		=> 'Jeśli opcja jest włączona, Podziękowania w Globalnych Ogłoszeniach są aktywne.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN'	=> 'Jeśli opcja jest włączona, Ocena forum będzie wyświetlana na liście forów.',
	'THANKS_INFO_PAGE'					=> 'Wiadomości informacyjne',
	'THANKS_INFO_PAGE_EXPLAIN'			=> 'Jeśli włączone, po wystawieniu/usunięciu podziękowania wyświetla informację',
	'THANKS_NOTICE_ON'					=> 'Powiadomienia są dostępne',
	'THANKS_NOTICE_ON_EXPLAIN'			=> 'Jeśli opcja jest włączona, powiadomienia są dostępne, a użytkownik może skonfigurować powiadomienie w swoim profilu.',
	'THANKS_NUMBER'						=> 'Ilość podziękowań w liście',
	'THANKS_NUMBER_EXPLAIN'				=> 'Maksymalna ilość podziękowań pokazywana podczas przeglądania tematów lub przeglądania profilu. <br /> <strong> Pamiętaj, może nastąpić opóźnienie wczytywania strony jeżeli ta wartość jest ustawiona powyżej 250. </strong>',
	'THANKS_NUMBER_DIGITS'				=> 'Ilość cyfr po przecinku dla ocen',
	'THANKS_NUMBER_DIGITS_EXPLAIN'		=> 'Określ ilość cyfr po przecinku dla wartości ocen.',
    'THANKS_NUMBER_ROW_REPUT'			=> 'Ilość wierszy w topliście ocen.',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN'	=> 'Określ liczbę wierszy do wyświetlenia w topliście oceny postów, tematów i działów.',
	'THANKS_NUMBER_POST'				=> 'Liczba podziękowań w poście',
	'THANKS_NUMBER_POST_EXPLAIN'		=> 'Maksymalna liczba podziękowań która będzie wyświetlana w poście. <br /> <strong> Pamiętaj że ładowanie strony może być wolniejsze jeżeli liczba ustawiona jest na więcej niż 250. </strong>',
	'THANKS_ONLY_FIRST_POST'			=> 'Podziękowania tylko dla pierwszego postu w temacie',
	'THANKS_ONLY_FIRST_POST_EXPLAIN'	=> 'Jeśli włączone, podziękowania będzie można wystawiać tylko dla pierwszego postu w temacie.',
	'THANKS_POST_REPUT_VIEW'			=> 'Pokaż oceniane posty',
	'THANKS_POST_REPUT_VIEW_EXPLAIN'	=> 'Jeśli włączone, wartości ocen będą wyświetlane dla postów podczas przeglądania tematu.',
	'THANKS_POSTLIST_VIEW'				=> 'Pokaż listę podziękowań w temacie',
	'THANKS_POSTLIST_VIEW_EXPLAIN'		=> 'Jeśli ta opcja jest włączona, informacje o podziękowaniach takie jak kto podziękował i ile podziękowań użytkownik otrzymał lub ile razy podziękował będą pokazywane podczas przeglądania tematów. <br/> Uwaga informacje o podziękowaniach będą pokazywane tylko jeżeli użytkownicy posiadają uprawnienia do dziękowania na forum.',
	'THANKS_PROFILELIST_VIEW'			=> 'Pokaż listę podziękowań w profilu',
	'THANKS_PROFILELIST_VIEW_EXPLAIN'	=> 'Jeśli ta opcja jest włączona, kompletna informacja o podziękowaniach łącznie z ilością podziękowań i za który post użytkownik otrzymał podziękowanie będzie pokazywana.',
	'THANKS_REFRESH'					=> 'Przelicz ponownie wszystkie podziękowania',
	'THANKS_REFRESH_EXPLAIN'			=> 'Tutaj możesz aktualizować licznik podziękowań po masowym usunięciu postów/tematów/użytkowników. Może to zająć trochę czasu. <br /> - Refreshing will erase all thanks for the Global Announcements, if the option `Thanks in Global Announcements` is OFF!<br /> - Refreshing will erase all thanks for all positions excepting the first in the topic, if the option `Only for the first post in the topic` is ON!</strong>',
	'THANKS_REFRESH_MSG'				=> 'Aktualizacja może zająć kilka minut',
	'THANKS_REFRESHED_MSG'				=> 'Licznik został zaktualizowany',
	'THANKS_REPUT_GRAPHIC'				=> 'Graficzne wyświetlanie ocen',
	'THANKS_REPUT_GRAPHIC_EXPLAIN'		=> 'Jeśli włączone, wartość oceny będzie wyświetlana w postaci grafiki znajdującej',	
	'THANKS_TIME_VIEW' 					=> 'Czas podziekowań',
	'THANKS_TIME_VIEW_EXPLAIN'			=> 'Jeśli włączone, czas podziękowania zostanie wyświetlony w poście.',
	'THANKS_TOP_NUMBER'					=> 'Ilość użytkowników w top liście',
	'THANKS_TOP_NUMBER_EXPLAIN'			=> 'Określ liczbę użytkowników która zostanie wyświetlona w topliście.',
	'THANKS_TOPIC_REPUT_VIEW'			=> 'Oceny dla tematów',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN'	=> 'Jeśli włączone, oceny tematów beda wyświetlone podczas przeglądania działów.',
	'TRUNCATE'							=> 'Wyczyść',
	'TRUNCATE_THANKS'					=> 'Wyczyść listę podziękowań',
	'TRUNCATE_THANKS_EXPLAIN'			=> 'Jeśli zaznaczysz tę opcję, wszystkie wystawione podziękowania zostaną usunięte <br /> Akcja jest nieodwracalna!',
	'TRUNCATE_THANKS_MSG'				=> 'Licznik podziękowań został zresetowany.',
	'REFRESH_THANKS_CONFIRM'			=> 'Czy napewno chcesz odświeżyć liczniki podziękowań?',
	'TRUNCATE_THANKS_CONFIRM'			=> 'Czy napewno chcesz wyczyścić liczniki podziękowań?',
	'TRUNCATE_NO_THANKS'				=> 'Operacja anulowana',
	'ALLOW_THANKS_PM_ON'				=> 'Informuj mnie poprzez PM, jeśli ktoś podziękuje za mój post',
	'ALLOW_THANKS_EMAIL_ON'				=> 'Informuj mnie poprzez e-mail, jeśli ktoś podziękuje za mój post',
	'THANKS_POST_VIEW_GUESTS' 			=> 'Pokaż niezidentyfikowanym użytkownikom (gościom)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' 	=> 'Jeśli jest aktywny, pokaże podziękowania i reputację (jeśli jest aktywna) dla niezidentyfikowanych użytkowników (gości).',
	'THANKS_POST_VIEW_ROBOTS' 			=> 'Pokaż do wyszukiwarek (botów)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' 	=> 'Jeśli jest aktywny, pokazuje podziękowanie i reputację (jeśli jest aktywna) w wyszukiwarkach (botach).'
));
