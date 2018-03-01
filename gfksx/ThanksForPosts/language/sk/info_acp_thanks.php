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
	'ACP_DELTHANKS' => 'Vymazané zaznamenané poďakovania',
	'ACP_POSTS' => 'Celkom príspevkov',
	'ACP_POSTSEND' => 'Zostávajúce príspevky s poďakovaním',
	'ACP_POSTSTHANKS' => 'Celkom príspevkov s poďakovaním',
	'ACP_THANKS' => 'Poďakovanie za príspevky',
	'ACP_THANKS_DB_VER' => 'Verzia databázy:',
	'ACP_THANKS_TRUNCATE' => 'Vyčistiť zoznam poďakovaní',
	'ACP_ALLTHANKS' => 'Poďakovanie zohľadnené v rámci',
	'ACP_THANKSEND' => 'Poďakovanie, ktoré zostáva zohľadniť',
	'ACP_THANKS_REPUT' => 'Možnosti hodnotenia',
	'ACP_THANKS_REPUT_SETTINGS' => 'Možnosti hodnotenia',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Nastavte predvolené nastavenia hodnotenia príspevkov, tém a fór na základe systému poďakovania. <br /> Predmet (príspevok, téma alebo fórum), ktorý má najväčší celkový počet poďakovaní, dostal 100% hodnotenie.',
	'ACP_THANKS_SETTINGS' => 'Nastavenie poďakovania',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Predvolené nastavenia príspevkov poďakovania za príspevky je možné zmeniť tu.',
	'ACP_THANKS_REFRESH' => 'Aktualizovať počítadlá',
	'ACP_UPDATETHANKS' => 'Aktualizované zaznamenané poďakovania',
	'ACP_USERSEND' => 'Zostávajúci počet používateľov, ktorí poďakovali',
	'ACP_USERSTHANKS' => 'Celkový počet používateľov, ktorí poďakovali',
	'IMG_THANKPOSTS' => 'Ďakujem za príspevok',
	'IMG_REMOVETHANKS' => 'Zrušiť poďakovanie',
	'LOG_CONFIG_THANKS' => 'Aktualizovaná konfigurácia pre rozšírenie Thanks for post',
	'REFRESH' => 'Obnoviť',
	'REMOVE_THANKS' => 'Odstrániť poďakovanie',
	'REMOVE_THANKS_EXPLAIN' => 'Používatelia môžu odstrániť poďakovanie, ak je táto možnosť povolená.',
	'STEPR' => '- vykonané, krok %s',
	'THANKS_COUNTERS_VIEW' => 'Počítadlá poďakovaní',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Ak je táto možnosť povolená, bude sa u autora zobrazovať blok informácíí s udelenými a obdržanými poďakovaniami.',
	'THANKS_FORUM_REPUT_VIEW' => 'Zobraziť hodnotenie fóra',
	'THANKS_GLOBAL_POST' => 'Poďakovanie v globálnych oznámeniach',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Povolí poďakovanie v globálnych oznámeniach.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Ak je povolené, hodnotenie fóra sa zobrazí v zozname fór.',
	'THANKS_INFO_PAGE' => 'Informatívne správy',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Ak je povolené, informatívne správy sa zobrazia po poďakovaní/odstránení poďakovania za príspevok.',
	'THANKS_NOTICE_ON' => 'Oznámenia sú k dispozícii',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Ak je povolené, je k dispozícii upozornenie a používateľ môže nakonfigurovať upozornenie prostredníctvom svojho profilu.',
	'THANKS_NUMBER' => 'Počet poďakovaní zo zoznamu zobrazeného v profile',
	'THANKS_NUMBER_EXPLAIN' => 'Maximálny počet poďakovaní zobrazených pri prezeraní profilu. <br /> <strong> Pamätajte, že bude zaznamenané spomalenie, ak je táto hodnota nastavená na 250. </strong>',
	'THANKS_NUMBER_DIGITS' => 'Počet desatinných miest pre hodnotenie',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Zadajte počet desatinných miest pre hodnotu hodnotenia.',
	'THANKS_NUMBER_ROW_REPUT' => 'Počet riadkov v topliste na hodnotenie',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Zadajte počet riadkov, ktoré sa majú zobraziť v príspevkoch, témach a fórach hodnotenia toplist.',
	'THANKS_NUMBER_POST' => 'Počet poďakovaní uvedených v príspevku',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Maximálny počet poďakovaní zobrazených pri prezeraní príspevku. <br /> <strong> Pamätajte, že bude zaznamenané spomalenie, ak je táto hodnota nastavená na 250. </strong>',
	'THANKS_ONLY_FIRST_POST' => 'Iba pre prvý príspevok v téme',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Ak je povolené, môžu používatelia poďakovať iba za prvý príspevok v téme.',
	'THANKS_POST_REPUT_VIEW' => 'Zobraziť hodnotenie príspevkov',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Ak je povolené, hodnotenie príspevkov sa zobrazí pri prezeraní témy.',
	'THANKS_POSTLIST_VIEW' => 'Zoznam poďakovaní v príspevku',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Ak je povolený, zobrazí sa zoznam používateľov, ktorí poďakovali autorovi za príspevok. <br /> Upozorňujeme, že táto možnosť bude účinná iba vtedy, ak administrátor povolil povolenie, aby vám poďakoval za príspevok v tomto fóre.',
	'THANKS_PROFILELIST_VIEW' => 'Zoznam poďakovaní v profile',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Ak je povolené, zobrazí sa úplný zoznam poďakovaní, vrátane počtu poďakovaní a príspevkov, ktorým používateľ poďakoval.',
	'THANKS_REFRESH' => 'Aktualizácia počítadiel poďakovaní',
	'THANKS_REFRESH_EXPLAIN' => 'Tu môžete aktualizovať počítadlo poďakovaní po hromadnom odstránení príspevkov/tém/užívateľov, rozdelenie/zlúčenie tém, nastavenie/odstránenie globálnych oznámení, aktivácia/deaktivácia možnosti"Iba pre prvý príspevok v téme ", zmena vlastníkov príspevkov atď. To môže chvíľu trvať. <br /> <strong> Dôležité: Ak chcete pracovať správne, funkcia čítačky obnovy potrebuje MySQL verziu 4.1 alebo novšiu! <br /> Pozor! <br /> - Obnovenie vymaže všetky poďakovania za príspevky hostí! <br />  - Obnovenie vymaže všetky poďakovania za globálne oznámenia, ak je voľba `Thanks in Global Announcements` vypnutá! <br /> - Obnovenie vymaže všetky poďakovania za všetky pozície, s výnimkou prvej v téme, ak je zapnutá voľba "Len pre prvý príspevok v téme"! </strong>',
	'THANKS_REFRESH_MSG' => 'Môže to trvať niekoľko minút. Všetky nesprávne zadania poďakovania budú odstránené! <br /> Akcie sú nenávratné!',
	'THANKS_REFRESHED_MSG' => 'Počítadlá boli aktualizované',
	'THANKS_REPUT_GRAPHIC' => 'Grafické zobrazenie hodnotenia',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Ak je povolená, grafická hodnota sa zobrazí graficky.',
	'THANKS_TIME_VIEW' => 'Čas poďakovania',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Ak je povolené,  v príspevoku sa zobrazí čas poďakovania.',
	'THANKS_TOP_NUMBER' => 'Počet používateľov v top liste',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Zadajte počet používateľov, ktorí sa majú zobraziť v indexe toplist. 0 - vypnutie zobrazovania toplistu.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Zobraziť hodnotenie témy',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Ak je táto možnosť zapnutá, bude pri zobrazení fóra zobrazené hodnotenieí tém.',
	'TRUNCATE' => 'Vyčistiť',
	'TRUNCATE_THANKS' => 'Vyčistiť zoznam poďakovaní',
	'TRUNCATE_THANKS_EXPLAIN' => 'Táto akcia úplne vymaže všetky počítadlá poďakovaní (odstráni všetky poďakovania). <br /> Akcia je nevratná!',
	'TRUNCATE_THANKS_MSG' => 'Počítadlo poďakovaní vyčistené.',
	'REFRESH_THANKS_CONFIRM' => 'Naozaj chcete obnoviť počítadlá poďakovaní?',
	'TRUNCATE_THANKS_CONFIRM' => 'Naozaj chcete vymazať počítadlá poďakovaní?',
	'TRUNCATE_NO_THANKS' => 'Operácia bola zrušená',
	'ALLOW_THANKS_PM_ON' => 'Oznámte mi  v PM, ak niekto poďakuje môjmu príspevku',
	'ALLOW_THANKS_EMAIL_ON' => 'Oznámte mi e-mailom, ak niekto poďakuje môjmu príspevku',
	'THANKS_POST_VIEW_GUESTS' => 'Zobraziť neidentifikovaných používateľov (hostí)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Ak je aktívna, zobrazí poďakovanie a reputáciu (ak je aktívna) neidentifikovaným používateľom (hosťom).',
	'THANKS_POST_VIEW_ROBOTS' => 'Zobraziť pre vyhľadávače (bot)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Ak je aktívna, zobrazí poďakovanie a reputáciu (ak je aktívna) pre vyhľadávače (bot).'
		));
