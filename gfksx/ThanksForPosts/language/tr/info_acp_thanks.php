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
	'ACP_DELTHANKS' => 'Kayıtlı silinmiş teşekkürler',
	'ACP_POSTS' => 'Toplam mesajlar',
	'ACP_POSTSEND' => 'Kalan Mesajların Teşekkürleri',
	'ACP_POSTSTHANKS' => 'Toplam teşekkür mesajları',
	'ACP_THANKS' => 'Mesajlarınız için teşekkürler',
	'ACP_THANKS_DB_VER' => 'Veritabanı sürümü:',
	'ACP_THANKS_TRUNCATE' => 'Teşekkür listesini temizle',
	'ACP_ALLTHANKS' => 'Dikkate alınmış olan teşekkürler',
	'ACP_THANKSEND' => 'Dikkate alınması gereken kalan teşekkürler',
	'ACP_THANKS_REPUT' => 'Oylama Seçenekleri',
	'ACP_THANKS_REPUT_SETTINGS' => 'Oylama Seçenekleri',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Buradaki teşekkür sistemine dayanarak mesajların, konuların ve forumların derecelendirmesinin varsayılan ayarlarını yapın. <br /> En büyük toplam teşekkür sayısına sahip olan konu (posta, konu veya forum)% 100 puan almaktadır.',
	'ACP_THANKS_SETTINGS' => 'Teşekkürler Ayarları',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Varsayılan Mesajlar için teşekkürler ayarları buradan değiştirilebilir.',
	'ACP_THANKS_REFRESH' => 'Sayaçları güncelle',
	'ACP_UPDATETHANKS' => 'Güncel kaydedilmiş teşekkürler',
	'ACP_USERSEND' => 'Diğerlerine teşekkür eden kalan kullanıcılar',
	'ACP_USERSTHANKS' => 'Toplam teşekkür eden kullanıcılar',
	'IMG_THANKPOSTS' => 'Mesajlar için teşekkür ederim',
	'IMG_REMOVETHANKS' => 'Teşekkürü İptal et',
	'LOG_CONFIG_THANKS' => 'Meajlarınız iin teşekkürler güncelleştirilmiş yapılandırma',
	'REFRESH' => 'Yenile',
	'REMOVE_THANKS' => 'Teşekkürü kaldır',
	'REMOVE_THANKS_EXPLAIN' => 'Bu seçenek etkinleştirildiyse kullanıcılar teşekkürlerini kaldırabilir.',
	'STEPR' => ' - idam, adım %s',
	'THANKS_COUNTERS_VIEW' => 'Teşekkür Sayaçları',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Etkinleştirilirse, yazarla ilgili blok bilgisi, verilen/gönderilen teşekkür sayısını gösterir.',
	'THANKS_FORUM_REPUT_VIEW' => 'Forum değerlendirme listesini göster',
	'THANKS_GLOBAL_POST' => 'Global Duyurular´a Teşekkürler',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Etkinleştirilirse, Global Duyuru etkinliği için teşekkür edilebilir.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Etkinleştirilirse forumların derecelendirilmesi forum listesinde görüntülenir.',
	'THANKS_INFO_PAGE' => 'Bilgilendirici mesajlar',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Etkinleştirilirse, yazıya teşekkür / kaldırdıktan sonra bilgilendirici mesajlar görüntülenir.',
	'THANKS_NOTICE_ON' => 'Bildirimler mevcut',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Etkinleştirilirse bildirimler kullanılabilir ve kullanıcılar bildirimlerini profiliyle yapılandırabilir.',
	'THANKS_NUMBER' => 'Profilde listelenen teşekkür sayısı',
	'THANKS_NUMBER_EXPLAIN' => 'Bir profili görüntülerken görüntülenen maksimum teşekkür sayısıdır. <br /> <strong> Bu değer 250´nin üzerine çıkarsa yavaşlamanın fark edileceğini unutmayın. </strong>',
	'THANKS_NUMBER_DIGITS' => 'Derecelendirme için ondalık basamak sayısı',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Derecelendirme değeri için ondalık basamak sayısını belirtin.',
	'THANKS_NUMBER_ROW_REPUT' => 'Sıralamanın en üstündeki satır sayısı',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Yayınların, konuların ve forumların en beğenilen listesini görüntülemek için satır sayısını belirtin.',
	'THANKS_NUMBER_POST' => 'Bir mesajda listelenen teşekkür sayısı',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Bir mesajı görüntülerken görüntülenen maksimum teşekkür sayısıdır. <br /> <strong> Bu değer 250´nin üzerine çıkarsa yavaşlamanın fark edileceğini unutmayın. </strong>',
	'THANKS_ONLY_FIRST_POST' => 'Sadece konudaki ilk yazı için',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Etkinleştirilirse, kullanıcılar yalnızca konudaki ilk yayın için teşekkür edebilir.',
	'THANKS_POST_REPUT_VIEW' => 'Mesajlar için derecelendirmeyi göster',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Etkinleştirilirse, bir konuyu görüntülerken mesaj derecelendirmesi görüntülenir.',
	'THANKS_POSTLIST_VIEW' => 'Mesaj listesinde teşekkür',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Etkinleştirilirse, yazar adına yazara teşekkür eden bir liste görüntülenir. <br/> Bu seçeneğin ancak yöneticinin bu forumdaki yazı için teşekkür etme iznini etkinleştirmesi durumunda etkili olacağını unutmayın.',
	'THANKS_PROFILELIST_VIEW' => 'Profilinde teşekkürleri listele',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Etkinleştirildiğinde, teşekkür sayısı ve bir kullanıcının teşekkür ettiği yazıları içeren tam bir teşekkür listesi görüntülenir.',
	'THANKS_REFRESH' => 'Teşekkür sayaçlarını güncelleme',
	'THANKS_REFRESH_EXPLAIN' => 'Burada yazıların/konuların/ kullanıcıların toplu kaldırılması, konuların bölünmesi/birleştirilmesi, Global Duyurunun ayarlanması/kaldırılması, "Sadece konudaki ilk yayın için" etkinleştirme/devre dışı bırakma seçenekleri, mesaj sahipleri ve diğerleri değiştirme gibi teşekkür sayaçlarını güncelleyebilirsiniz. Bu biraz zaman alabilir.<br /><strong>Önemli: Doğru çalışması için yenileme sayaçları işlevi MySQL sürüm 4.1 veya sonrasına ihtiyaç duyar!<br />Dikkat!<br /> - Yenileme, misafir gönderilerindeki tüm teşekkürleri silecek!<br /> - "Global Duyurular´a Teşekkürler" seçeneği kapalı ise yenileme Global duyurular için tüm teşekkürleri silecek!<br /> - Yenileme, "Sadece konudaki ilk yazı için" seçeneği etkinleştirilmişse, konuların ilk iletileri haricinde konu iletilerinden gelen tüm bildirimleri kaldırır!</strong>',
	'THANKS_REFRESH_MSG' => 'Bu işlemin tamamlanması birkaç dakika sürebilir. Tüm hatalı teşekkürler silinmiş olacak! <br /> Bu eylem geri döndürülemez!',
	'THANKS_REFRESHED_MSG' => 'Sayaçlar güncellendi',
	'THANKS_REPUT_GRAPHIC' => 'Sıralamanın grafiksel gösterimi',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Etkinleştirilirse, derecelendirme değeri aşağıdaki görüntüleri kullanarak grafiksel olarak gösterilir.',
	'THANKS_TIME_VIEW' => 'Teşekkür zamanı',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Etkinleştirilirse, mesaj teşekkür zamanı görüntüler.',
	'THANKS_TOP_NUMBER' => 'En çok listelenen kullanıcı sayısı',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Dizindeki en üst listede gösterilecek kullanıcı sayısını belirtin. 0 - kapalı en üst listeyi görüntüler.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Konu derecelendirmesini göster',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Etkinleştirilirse, bir forum görüntülerken konu derecelendirmesi görüntülenir.',
	'TRUNCATE' => 'Temizle',
	'TRUNCATE_THANKS' => 'Teşekkür listesini temizle',
	'TRUNCATE_THANKS_EXPLAIN' => 'Bu işlem tüm teşekkür sayaçlarını tamamen siler (tüm teşekkürler kaldırılır). <br /> Bu eylem geri döndürülemez!',
	'TRUNCATE_THANKS_MSG' => 'Teşekkürler sayaçlar temizlendi.',
	'REFRESH_THANKS_CONFIRM' => 'Teşekkür sayaçlarını yenilemek ister misiniz?',
	'TRUNCATE_THANKS_CONFIRM' => 'Teşekkür sayaçlarını gerçekten silmek istiyor musunuz?',
	'TRUNCATE_NO_THANKS' => 'İşlem iptal edildi',
	'ALLOW_THANKS_PM_ON' => 'Birisi benim mesajlarımdan birine teşekkür ettiyse bana özel mesajla bildir',
	'ALLOW_THANKS_EMAIL_ON' => 'Birisi mesajlarımdan birine teşekkür ettiyse bana e-posta ile bildir',
	'THANKS_POST_VIEW_GUESTS' => 'Tanımlanmayan kullanıcılara göster (misafir)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Eğer aktifse, tanımlanmamış kullanıcılara (misafirlere) teşekkür ve itibar gösterecektir..',
	'THANKS_POST_VIEW_ROBOTS' => 'Arama motorlarına göster (botlar)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Etkinse, arama motorlarına (aktifse) teşekkür ve itibar gösterecektir (botlar)'
		));
