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
	'CLEAR_LIST_THANKS' => 'Teşekkürler Listesini temizle',
	'CLEAR_LIST_THANKS_CONFIRM' => 'Gerçekten kullanıcının Teşekkürler Listesini silmek istiyor musunuz?',
	'CLEAR_LIST_THANKS_GIVE' => 'Kullanıcı tarafından verilen teşekkür listesi silindi.',
	'CLEAR_LIST_THANKS_POST' => 'Mesajdaki teşekkür listesi silindi.',
	'CLEAR_LIST_THANKS_RECEIVE' => 'Kullanıcı tarafından sağlanan teşekkür listesi silindi.',
	'DISABLE_REMOVE_THANKS' => 'Teşekkür silme yönetici tarafından devre dışı bırakıldı',
	'GIVEN' => 'Teşekkür etti',
	'GLOBAL_INCORRECT_THANKS' => 'Belli bir foruma atıfta bulunmayan bir Genel Duyuru için teşekkür edemezsiniz.',
	'GRATITUDES' => 'Teşekkür listesi',
	'INCORRECT_THANKS' => 'Geçersiz teşekkür',
	'JUMP_TO_FORUM' => 'Foruma Git',
	'JUMP_TO_TOPIC' => 'Konuya Git',
	'FOR_MESSAGE' => ' Mesaj için',
	'FURTHER_THANKS' => array(
		1 => ' ve başka bir kullanıcı',
		2 => ' ve %d diğer kullanıcılar'
	),
	'NO_VIEW_USERS_THANKS' => 'Teşekkür Listesi´ni görüntülemeye yetkili değilsiniz.',
	'NOTIFICATION_THANKS_GIVE' => array(
		1 => 'Mesaj için %1$s´den <strong> teşekkür aldınız </strong>:',
		2 => 'Mesaj için %1$s´den <strong> teşekkürler </strong>:',
	),
	'NOTIFICATION_THANKS_REMOVE' => array(
		1 => 'Mesaj için %1$s´den <strong> teşekkür kaldırıldı</strong>:',
		2 => 'Mesaj için %1$s´den <strong> teşekkürler kaldırıldı </strong>:',
	),
	'NOTIFICATION_TYPE_THANKS' => 'Mesajın için teşekkürler',
	'NOTIFICATION_TYPE_THANKS_GIVE' => 'Birisi mesajın için sana teşekkür etti.',
	'NOTIFICATION_TYPE_THANKS_REMOVE' => 'Birisi teşekkürlerini mesajınızdan kaldırdı',
	'RECEIVED' => 'Teşekkür edildi',
	'REMOVE_THANKS' => 'Teşekkürlerinizi kaldırın: ',
	'REMOVE_THANKS_CONFIRM' => 'Teşekkürlerinizi kaldırmak istediniz emin misiniz?',
	'REMOVE_THANKS_SHORT' => 'Teşekkürlerini kaldır',
	'REPUT' => 'Değerlendirme',
	'REPUT_TOPLIST' => 'En iyi Teşekkür listesi — %d',
	'RATING_LOGIN_EXPLAIN' => 'En iyi listeyi görüntüleme yetkiniz yok.',
	'RATING_NO_VIEW_TOPLIST' => 'En iyi listeyi görüntüleme yetkiniz yok.',
	'RATING_VIEW_TOPLIST_NO' => 'En iyi liste boşta veya yönetici tarafından devre dışı bırakıldı',
	'RATING_FORUM' => 'Forum',
	'RATING_POST' => 'Mesaj',
	'RATING_TOP_FORUM' => 'Forumların değerlendirmesi',
	'RATING_TOP_POST' => 'Mesajların değerlendirmesi',
	'RATING_TOP_TOPIC' => 'Konuların değerlendirilmesi',
	'RATING_TOPIC' => 'Konu',
	'THANK' => 'zaman',
	'THANK_FROM' => 'itibaren',
	'THANK_TEXT_1' => 'Bu kullanıcılar mesajınıza teşekkür etti ',
	'THANK_TEXT_2' => array(
		1 => ' mesajı için: ',
		2 => ' mesajı için (toplam %d):'
	),
	'THANK_POST' => 'Mesaj yazarına teşekkür ederim: ',
	'THANK_POST_SHORT' => 'Teşekkürler',
	'THANKS' => array(
		1 => '%d kez',
		2 => '%d kez',
	),
	'THANKS_BACK' => 'Geri dön',
	'THANKS_INFO_GIVE' => 'Mesaj için teşekkür ettiniz.',
	'THANKS_INFO_REMOVE' => 'Sadece teşekkürlerinizi kaldırdınız.',
	'THANKS_LIST' => 'Listeyi Görüntüle/Kapat',
	'THANKS_PM_MES_GIVE' => 'Mesaj için teşekkür etti.',
	'THANKS_PM_MES_REMOVE' => 'Mesajın teşekkürünü kaldırdı',
	'THANKS_PM_SUBJECT_GIVE' => 'Mesaj için teşekkürler',
	'THANKS_PM_SUBJECT_REMOVE' => 'Mesajın teşekkürünü kaldırıldı',
	'THANKS_USER' => 'Teşekkürler listesi',
	'TOPLIST' => 'Mesajların üst listesi'
));
