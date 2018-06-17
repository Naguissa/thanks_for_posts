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
	'ACP_DELTHANKS' => 'Vymazáno zaznamenané poděkování',
	'ACP_POSTS' => 'Celkem příspěvků',
	'ACP_POSTSEND' => 'Zůstavající příspěvky s poděkováním',
	'ACP_POSTSTHANKS' => 'Celkem příspěvků s poděkováním',
	'ACP_THANKS' => 'Poděkování za příspěvky',
	'ACP_THANKS_DB_VER' => 'Verze databáze:',
	'ACP_THANKS_TRUNCATE' => 'Vyčistit seznam poděkování',
	'ACP_ALLTHANKS' => 'Poděkování zohledněné v rámci',
	'ACP_THANKSEND' => 'Poděkování, které zůstává zohlednit',
	'ACP_THANKS_REPUT' => 'Monosti hodnocení',
	'ACP_THANKS_REPUT_SETTINGS' => 'Možnosti hodnocení',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Nastavte přednastavené nastavení hodnocení příspěvků, témata a fór na základě systému poděkování. <br /> Předmět (příspěvek, téma nebo fórum), který má největší celkový počet poděkování, dostal 100% hodnocení.',
	'ACP_THANKS_SETTINGS' => 'Nastavení poděkování',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Předvolené nastavení příspěvků poděkování je možné změnit zde.',
	'ACP_THANKS_REFRESH' => 'Aktualizovat počítadla',
	'ACP_UPDATETHANKS' => 'Aktualizované zaznamenané poděkování',
	'ACP_USERSEND' => 'Zůstávající počet uživatelů, kteří poděkovali',
	'ACP_USERSTHANKS' => 'Celkový počet uživatelů, kteří poděkovali',
	'IMG_THANKPOSTS' => 'Děkujeme za příspěvek',
	'IMG_REMOVETHANKS' => 'Zrušit poděkování',
	'LOG_CONFIG_THANKS' => 'Aktualizovaná konfigurace pro rozšíření Thanks for post',
	'REFRESH' => 'Obnovit',
	'REMOVE_THANKS' => 'Odstranit poděkování',
	'REMOVE_THANKS_EXPLAIN' => 'Uživatelé mohou odstranit poděkování, pokud je tato možnost povolená',
	'STEPR' => '- vykonané, krok %s',
	'THANKS_COUNTERS_VIEW' => 'Počítadla poděkování',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Pokud je tato možnost povolená, bude se u autora zobrazovat blok informací s udělenými a obdrženými poděkováními.',
	'THANKS_FORUM_REPUT_VIEW' => 'Zobrazit hodnocení fóra',
	'THANKS_GLOBAL_POST' => 'Poděkování v globálních oznámeních',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Povolí poděkování v globálních oznámeních.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Pokud je povolené, hodnocení fóra se zobrazí v seznamu fór.',
	'THANKS_INFO_PAGE' => 'Notifikace',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Pokud je povolené, po poděkování/odstranění poděkování za příspěvek se zobrazí notifikace.',
	'THANKS_NOTICE_ON' => 'Oznámení jsou k dispozici.',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Pokud je povolené, jsou oznámení k dispozici a uživatel může nastavit upozornění ve svém profilu.',
	'THANKS_NUMBER' => 'Počet poděkování ze seznamu zobrazeného v profilu',
	'THANKS_NUMBER_EXPLAIN' => 'Maximální počet poděkování zobrazených při prohlížení profilu.<br /> <strong> Upozornění: Dojde ke zpomalení, pokud je hodnota nastavena na 250.</strong>',
	'THANKS_NUMBER_DIGITS' => 'Počet desetinných míst pro hodnocení.',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Zadejte počet desetinných míst pro hodnotu hodnocení.',
	'THANKS_NUMBER_ROW_REPUT' => 'Počet řádku v TOP listu na hodnocení.',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Zadejte počet řádků, které se mají zobrazit v příspěvcích, tématech a fórech hodnidnocení toplist.',
	'THANKS_NUMBER_POST' => 'Počet poděkování uvedených v příspěvku.',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Maximální počet poděkování zobrazený při prohlížení příspěvku. <br /> <strong> Upozornění: Dojde ke zpomalení, pokud je hodnota nastavena na 250.',
	'THANKS_ONLY_FIRST_POST' => 'Pouze pro první příspěvek v tématu.',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Pokud je povoleno, mohou uživatelé poděkovat pouze za první příspěvek v tématu.',
	'THANKS_POST_REPUT_VIEW' => 'Zobrazit hodnocení příspěvků',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Pokud je povoleno, hodnocení příspěvků se zobrazí při prohlížení tématu.',
	'THANKS_POSTLIST_VIEW' => 'Seznam poděkování v příspěvku',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Pokud je povoleno, zobrazení se seznam uživatelů, kteří poděkovali autorovi za příspěvek.<br />Upozorňujeme, že tato možnost bude účeinná pouze tehdy, kdy administrátor povolil poděkování za příspěvek v tomto fóru.',
	'THANKS_PROFILELIST_VIEW' => 'Seznam poděkování v profilu.',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Pokud je povoleno, zobrazí se úplný seznam poděkování, včertně počtu poděkování a příspěvků, kterým uživatel poděkoval.',
	'THANKS_REFRESH' => 'Aktualizace počítadla poděkování',
	'THANKS_REFRESH_EXPLAIN' => 'Zde můžete aktualizovat počítadlo poděkování po hromadném odstranění příspevků(témat/uživatelů, rodělení/sloučení témat, nastavení/odstranění globálních oznámení, aktivaci/deaktivaci a možnosti "Je pro první příspěvek v tématu", změně vlastníků příspěvků, atd. To může chvíli trvat. <br /> <strong> Důležité: Aby obnova počítadlas fungovala správně, je třeba používat MySQL verzi 4.1 nebo novější.<br /> Pozor! <br /> - Obnovení vymaže všechna poděkování za příspěvky hostů. <br />  - Obnovení vymaže všechny poděkování za globální oznámení pokud je volba `Thanks in Global Announcements` vypnutá! <br /> - Obnovení vymaže všechny poděkování za všechny pozice, s výjimkou první v tématu, pokud je zapnutá volba "Jen pro první příspěvek v tématu."  </strong>',
	'THANKS_REFRESH_MSG' => 'Může to trvat několik minut. Všechna nesprávná zadaní poděkování budou odstraněna. <br /> Akce jsou nevratné!',
	'THANKS_REFRESHED_MSG' => 'Počítadla byla aktualizována',
	'THANKS_REPUT_GRAPHIC' => 'Grafické zobrazení hodnocení',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Pokud je povoleno, hodnota hodnocení se zobrazí graficky.',
	'THANKS_TIME_VIEW' => 'Čas poděkování',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Pokud je povoleno, v příspěvku se zobrazí čas poděkování.',
	'THANKS_TOP_NUMBER' => 'Počet uživatelů v TOP listu',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Zadejte počet uživatelů, kteří se mají zobrazit v indexu TOP listu. 0 - vypnutí zobrazování TOP listu.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Zobrazit hodnocené tématu',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Pokud je povoleno, bude při rozebrazení fóra zobrazené hodnocení témat.',
	'TRUNCATE' => 'Vyčistit',
	'TRUNCATE_THANKS' => 'Vyčistit seznam podekování',
	'TRUNCATE_THANKS_EXPLAIN' => 'Tato akce úplně smaže všechny počítadla poděkování (odstraní všechna poděkování). <br /> Akce je nevratná!',
	'TRUNCATE_THANKS_MSG' => 'Počítadlo poděkování bylo vyčištěno.',
	'REFRESH_THANKS_CONFIRM' => 'Jste si jisti, že chcete obnovit počítadla poděkování?',
	'TRUNCATE_THANKS_CONFIRM' => 'Jste si jisti, že chcete vymazat počítadla poděkování?',
	'TRUNCATE_NO_THANKS' => 'Akce byla zrušena',
	'ALLOW_THANKS_PM_ON' => 'Pošlete mi soukrovou správu, pokud někdo poděkuje méme příspěvku.',
	'ALLOW_THANKS_EMAIL_ON' => 'Pošlete mi e-mail, pokud někdo poděkuje méme příspěvku.',
	'THANKS_POST_VIEW_GUESTS' => 'Zobrazit neidentifikovatelným uživatelům (hostům)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Pokud je povoleno, zobrazí poděkování a reputaci (pokud je aktivní) neidentifikovatelným uživatelům (hostům).',
	'THANKS_POST_VIEW_ROBOTS' => 'Zobrazit pro vyhledávače (boty).',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Pokud je povoleno, zobrazí poděkování a reputaci (pokud je aktivníú vyhledávačům (botům).'
		));
