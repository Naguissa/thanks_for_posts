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
	'ACP_DELTHANKS' => 'Gràcies esborrades',
	'ACP_POSTS' => 'Tots els missatges',
	'ACP_POSTSEND' => 'Missatges agraïts',
	'ACP_POSTSTHANKS' => 'Tots els missatges amb gràcies',
	'ACP_THANKS' => 'Thanks for posts',
	'ACP_THANKS_DB_VER' => 'Versió de la base de dades:',
	'ACP_THANKS_TRUNCATE' => 'Esborra la llista de gràcies',
	'ACP_ALLTHANKS' => 'Gràcies tingudes en compte',
	'ACP_THANKSEND' => 'Gràcies per tenir en compte',
	'ACP_THANKS_REPUT' => 'Opcions de valoració',
	'ACP_THANKS_REPUT_SETTINGS' => 'Opcions de valoració',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Aquí pot establir la configuració per defecte per a la valoració de missatges, temes i fòrums, basada en el sistema de gràcies. <br /> L´objecte (missatge, tema o fòrum) que tingui un major nombre de gràcies comptarà com el 100%.',
	'ACP_THANKS_SETTINGS' => 'Configuració de gràcies',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Aquí pot establir la configuració per defecte per a Thanks for posts.',
	'ACP_THANKS_REFRESH' => 'Actualitza comptadors',
	'ACP_UPDATETHANKS' => 'Agraïments enregistrats actualitzats',
	'ACP_USERSEND' => 'Usuaris que han agraït',
	'ACP_USERSTHANKS' => 'Tots els usuaris que han agraït',
	'IMG_THANKPOSTS' => 'Per a agrair un missatge',
	'IMG_REMOVETHANKS' => 'Per a retirar l´agraïment',
	'LOG_CONFIG_THANKS' => 'Configuració de Thanks for posts actualitzada',
	'REFRESH' => 'Actualitza',
	'REMOVE_THANKS' => 'Eliminar l´agraïement',
	'REMOVE_THANKS_EXPLAIN' => 'Els usuaris poden retirar l´agraïment si s´activa aquesta opció.',
	'STEPR' => ' - executat, passa %s',
	'THANKS_COUNTERS_VIEW' => 'Comptadors de gràcies',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Si s´activa, el bloc d´informació sobre l´autor mostrarà el nombre de gràcies donades i rebudes.',
	'THANKS_FORUM_REPUT_VIEW' => 'Mostra la qualificació en els fòrums',
	'THANKS_GLOBAL_POST' => 'Gràcies en Anuncis Globals',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Si s´activa, es podran agrair els Anuncis Globals.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Si s´activa, es mostrarà la qualificació a la llista de fòrums..',
	'THANKS_INFO_PAGE' => 'Missatges informatius',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Si s´activa, es mostraran missatges informatius després de donar i cancel·lar agraïments.',
	'THANKS_NOTICE_ON' => 'Avisos disponibles',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Si s´activa, s´emetran avisos i l´usuari els pot configurar a través del seu perfil.',
	'THANKS_NUMBER' => 'Nombre d´agraïments a la llista del perfil',
	'THANKS_NUMBER_EXPLAIN' => 'Nombre màxim d´agraïments a mostrar en un perfil. <br /> <strong>Recorda que es notarà una relentització en valors superiors a 250. </strong>',
	'THANKS_NUMBER_DIGITS' => 'Nombre de xifres decimals en les qualificacions',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Especifica el nombre de xifres decimals per a les qualificacions.',
	'THANKS_NUMBER_ROW_REPUT' => 'Nombre d´entrades a la llista de qualificació',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Especifica el nombre de files a mostrar en les llistes de missatges, temes i fòrums amb més agraïments.',
	'THANKS_NUMBER_POST' => 'Nombre d´agraïments a mostrar en un missatge',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Nombre màxim d´agraiments que es mostraran en veure un missatge. <br /> <strong>Recorda que es notarà una relentització en valors superiors a 250. </strong>',
	'THANKS_ONLY_FIRST_POST' => 'Només per al primer missatge en un tema',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Si s´activa, els usuaris només podran agrair el primer missatge en un tema..',
	'THANKS_POST_REPUT_VIEW' => 'Mostra la qualificació als missatges',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Si s´activa, es mostrarà la qualificació del missatge en veure un tema..',
	'THANKS_POSTLIST_VIEW' => 'Mostra els agraïments en el missatge',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Si s´activa, es mostrarà una llista dels usuaris que han agraït el missatge. <br/> Això només serà efectiu si s´ha activat el permís per agrair el missatge en aquest fòrum.',
	'THANKS_PROFILELIST_VIEW' => 'Mostra els agraïments en el perfil',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Si s´activa, es mostrarà una llista completa dels agraïments, incloent el nombre de gràcies i en quins missatges un usuari ha rebut gràcies.',
	'THANKS_REFRESH' => 'Actualitza comptadors d´agraïments',
	'THANKS_REFRESH_EXPLAIN' => 'Aquí pots actualitzar els comptadors d´agraïments després d´esborrar molts de missatges, temes o usuaris, separar o juntar temes, establir o llevar Anuncis Globals, (des)activar l´opció "Només per al primer missatge en un tema", canviar l´autor de missatges, etc. Això pot portar algun temps.<br /><strong>Important: Perque funcioni correctament, aquesta funció necessita MySQL 4.1 o superior!<br />Atenció!<br /> - L´actualització esborrarà tots els agraïments pels missatges de convidats!<br /> - L´actualització esborrarà els agraïments dels Anuncis Globals, si l´opció "Gràcies en Anuncis Globals" està desactivada!<br /> - L´actualitzció esborrarà tots els agraïments per a totes les posicions excepte la primera en el tema si l´opció "Només per al primer missatge en un tema" està activada!</strong>',
	'THANKS_REFRESH_MSG' => 'Això pot trigar uns minuts a completar-se. Tots els agraïments incorrectes s´esborraran! <br /> Això és irreversible!',
	'THANKS_REFRESHED_MSG' => 'Comptadors actualitzats',
	'THANKS_REPUT_GRAPHIC' => 'Mostra la qualificació gràficament',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Si s´activa, el valor de la qualificació es mostrarà gràficament.',
	'THANKS_TIME_VIEW' => 'Temps de l´agraïment',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Si s´activa, es mostrarà quan un usuari va agrair un missatge.',
	'THANKS_TOP_NUMBER' => 'Nombre d´usuaris a la llista de més agraïts',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Especifica el nombre d´usuaris que es mostraran a la llista d´usuaris més agraïts a la pàgina principal. 0 - no es mostra la llista.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Mostra la qualificació del tema',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Si s´activa, la qualificació del tema es mostrarà a la llista de temes.',
	'TRUNCATE' => 'Esborrar',
	'TRUNCATE_THANKS' => 'Esborrar els agraïments',
	'TRUNCATE_THANKS_EXPLAIN' => 'Aquest procés esborra completament tots els agraïments realitzats. <br /> Això no és reversible!',
	'TRUNCATE_THANKS_MSG' => 'Agraïments esborrats.',
	'REFRESH_THANKS_CONFIRM' => 'Realment vols actualitzar els agraïments?',
	'TRUNCATE_THANKS_CONFIRM' => 'Realment vols esborrar els agraïments?',
	'TRUNCATE_NO_THANKS' => 'Operació cancel·lada',
	'ALLOW_THANKS_PM_ON' => 'Envia´m un PM si s´agraeix un missatge meu',
	'ALLOW_THANKS_EMAIL_ON' => 'Envia´m un email si s´agraeix un missatge meu',
	'THANKS_POST_VIEW_GUESTS' => 'Mostrar als usuaris no identificats (convidats)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Si es actiu, es mostrarán els agraeiments i la valoració (si és activa) als usuaris sense identificar (convidats).',
	'THANKS_POST_VIEW_ROBOTS' => 'Mostrar als robots',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Si es actiu, es mostrarán els agraeiments i la valoració (si és activa) als usuaris identificats com robots.',
		));
