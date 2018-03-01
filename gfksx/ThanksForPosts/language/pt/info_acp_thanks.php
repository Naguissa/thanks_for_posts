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
	'ACP_DELTHANKS' => 'Registos de mensagens de agradecimento apagados',
	'ACP_POSTS' => 'Total de mensagens',
	'ACP_POSTSEND' => 'Restantes mensagens com agradecimentos',
	'ACP_POSTSTHANKS' => 'Total de mensagens com agradecimentos',
	'ACP_THANKS' => 'Obrigado pela mensagem',
	'ACP_THANKS_DB_VER' => 'Versão do banco de dados:',
	'ACP_THANKS_TRUNCATE' => 'Limpar lista de agradecimentos',
	'ACP_ALLTHANKS' => 'Agradecimentos considerados',
	'ACP_THANKSEND' => 'Restantes agradecimentos:',
	'ACP_THANKS_REPUT' => 'Opções de avaliação',
	'ACP_THANKS_REPUT_SETTINGS' => 'Opções de avaliação',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN' => 'Aqui pode definir as configurações padrão para a classificação de mensagens, tópicos e fóruns, com base no sistema de agradecimentos. <br /> O máximo de 100% é atribuída à Mensagem, Tópico ou Fórum com o maior número total de agradecimentos.',
	'ACP_THANKS_SETTINGS' => 'Configurar agradecimentos',
	'ACP_THANKS_SETTINGS_EXPLAIN' => 'Aqui pode configurar as funções da Modificação de agradecimento às mensagens.',
	'ACP_THANKS_REFRESH' => 'Atualizar contadores',
	'ACP_UPDATETHANKS' => 'Atualizar recorde de agradecimentos',
	'ACP_USERSEND' => 'Restantes utilizadores com agradecimentos',
	'ACP_USERSTHANKS' => 'Total de utilizadores com agradecimentos',
	'IMG_THANKPOSTS' => 'Para agradecer à mensagem',
	'IMG_REMOVETHANKS' => 'Cancelar agradecimento',
	'LOG_CONFIG_THANKS' => 'Modificação Thanks for post atualizada',
	'REFRESH' => 'Atualizar',
	'REMOVE_THANKS' => 'Eliminar agradecimentos',
	'REMOVE_THANKS_EXPLAIN' => 'Permite aos Utilizadores eliminar os agradecimentos que fizeram.',
	'STEPR' => ' - passo %s executado',
	'THANKS_COUNTERS_VIEW' => 'Contadores de Agradecimentos',
	'THANKS_COUNTERS_VIEW_EXPLAIN' => 'Se ativado, o bloco informações sobre o autor vai mostrar o número de agradecimentos dados/recebidos.',
	'THANKS_FORUM_REPUT_VIEW' => 'Ver avaliação Tópicos',
	'THANKS_GLOBAL_POST' => 'Agradecido no Anúncio Global',
	'THANKS_GLOBAL_POST_EXPLAIN' => 'Se ativado, permite agradecer nos anúncios globais',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN' => 'Se ativado, será exibida a avaliação na lista de fóruns',
	'THANKS_INFO_PAGE' => 'Mensagem de informação',
	'THANKS_INFO_PAGE_EXPLAIN' => 'Se ativado, aparece uma mensagem de informação após dar/retirar um agradecimento.',
	'THANKS_NOTICE_ON' => 'Avisos ativados',
	'THANKS_NOTICE_ON_EXPLAIN' => 'Se ativado os utilizadores poderão configurar os avisos no seu perfil.',
	'THANKS_NUMBER' => 'Máximo de agradecimentos na lista',
	'THANKS_NUMBER_EXPLAIN' => 'Número máximo de agradecimentos exibidos no perfil de utilizadores. <br /> <strong> Valores superiores a 250 podem tornar o sistema mais lento.</strong>',
	'THANKS_NUMBER_DIGITS' => 'O número de casas decimais para a classificação',
	'THANKS_NUMBER_DIGITS_EXPLAIN' => 'Especifique o número de casas decimais a usar na avaliação.',
	'THANKS_NUMBER_ROW_REPUT' => 'O número de linhas na toplist de classificação',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN' => 'Especifique o número de linhas da avaliação a mostrar na toplist de Mensagens, Tópicos e Fóruns.',
	'THANKS_NUMBER_POST' => 'Número de agradecimentos na lista das mensagens',
	'THANKS_NUMBER_POST_EXPLAIN' => 'Máximo de agradecimentos a serem exibidos. <br /> <strong> Valores superiores a 250 podem tornar o sistema mais lento.</strong>',
	'THANKS_ONLY_FIRST_POST' => 'Agradecimentos só na primeira mensagem do tópico.',
	'THANKS_ONLY_FIRST_POST_EXPLAIN' => 'Se ativado, apenas pode agradecer a primeira mensagem do tópico.',
	'THANKS_POST_REPUT_VIEW' => 'Avaliação das mensagens',
	'THANKS_POST_REPUT_VIEW_EXPLAIN' => 'Se ativada, mostra o valor da avaliação das mensagens nos tópicos.',
	'THANKS_POSTLIST_VIEW' => 'Lista de agradecimentos na mensagem',
	'THANKS_POSTLIST_VIEW_EXPLAIN' => 'Se ativado, a mensagem exibirá a lista de utilizadores que agradeceram ao autor pela mensagem. <br /> Note que esta opção somente será visível se o utilizador tiver permissões para fazer agradecimentos nesse fórum.',
	'THANKS_PROFILELIST_VIEW' => 'Listas de agradecimentos no perfil',
	'THANKS_PROFILELIST_VIEW_EXPLAIN' => 'Se ativado, quando visualizar um perfil de utilizador será exibida a lista de agradecimentos dados e recebidos',
	'THANKS_REFRESH' => 'Atualizar contadores de agradecimentos',
	'THANKS_REFRESH_EXPLAIN' => 'Aqui pode atualizar os contadores de agradecimento. Esta ação pode demorar algum tempo.',
	'THANKS_REFRESH_MSG' => 'Aguarde! Esta ação pode demorar algum tempo.',
	'THANKS_REFRESHED_MSG' => 'Contadores atualizados',
	'THANKS_REPUT_GRAPHIC' => 'Visualização gráfica da avaliação',
	'THANKS_REPUT_GRAPHIC_EXPLAIN' => 'Se ativado, a avaliação será exibida numa escala gráfica',
	'THANKS_TIME_VIEW' => 'Data do agradecimento',
	'THANKS_TIME_VIEW_EXPLAIN' => 'Se ativado, a mensagem mostrará a data do agradecimento.',
	'THANKS_TOP_NUMBER' => 'Número de Utilizadores na toplist',
	'THANKS_TOP_NUMBER_EXPLAIN' => 'Especifique o número de Utilizadores a exibir na toplist.',
	'THANKS_TOPIC_REPUT_VIEW' => 'Avaliação dos Tópicos',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN' => 'Se ativado será exibida a avaliação do Tópico ao ver o Fórum.',
	'TRUNCATE' => 'Limpar',
	'TRUNCATE_THANKS' => 'Limpar a lista de agradecimentos',
	'TRUNCATE_THANKS_EXPLAIN' => 'Se avançar com esta ação, os contadores de agradecimentos serão limpos (apaga todos os agradecimentos)',
	'TRUNCATE_THANKS_MSG' => 'Contadores de agradecimentos limpos.',
	'REFRESH_THANKS_CONFIRM' => 'Tem a certeza que deseja atualizar os contadores de mensagens?',
	'TRUNCATE_THANKS_CONFIRM' => 'Tem a certeza que deseja limpar os contadores de mensagens?',
	'TRUNCATE_NO_THANKS' => 'Operação cancelada',
	'ALLOW_THANKS_PM_ON' => 'Notificar-me por Mensagem Privada dos agradecimentos às minhas mensagens',
	'ALLOW_THANKS_EMAIL_ON' => 'Notificar-me por email dos agradecimentos às minhas mensagens',
	'THANKS_POST_VIEW_GUESTS' => 'Mostrar para usuários não identificados (convidados)',
	'THANKS_POST_VIEW_GUESTS_EXPLAIN' => 'Se estiver ativo, mostrará agradecimentos e reputação (se ativos) para usuários não identificados (convidados).',
	'THANKS_POST_VIEW_ROBOTS' => 'Mostrar para motores de busca (bots)',
	'THANKS_POST_VIEW_ROBOTS_EXPLAIN' => 'Se estiver ativo, mostrará agradecimentos e reputação (se ativos) aos motores de busca (bots).'
));
