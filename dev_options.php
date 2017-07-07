<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

defined('_LOG_FILTRE_GRAVITE') || define('_LOG_FILTRE_GRAVITE', 8);
defined('_DEBUG_AUTORISER')    || define('_DEBUG_AUTORISER', true);

$GLOBALS['test_i18n'] = true; // signaler les trads manquantes

if(!defined('_DEBUG_MINIPRES'))
	define('_DEBUG_MINIPRES', true);

function affiche_usage_memoire() {
	if (
		(!defined('_AJAX') or !_AJAX)
		and isset($GLOBALS['auteur_session']['webmestre'])
		and $GLOBALS['auteur_session']['webmestre'] == 'oui'
		and !_request('action')
		and !preg_match('#(\.css|\.js)#', _request('page'))
		and !preg_match('#(\.css|\.js)#', _request('file'))
	) {
		chdir(_ROOT_CWD); // precaution
		echo "<style type='text/css'>.stats_hit { position:fixed;top:0;left:0;color:#fff;background:#666;padding:5px;z-index:1010; }</style>\n";
		echo "<div class='stats_hit' onclick=\"this.style.display = 'none';\">";
		echo number_format(memory_get_usage() / 1024 / 1024, 1) . ' Mo';
		foreach ($GLOBALS['connexions'] as $serveur => $connexion) {
			if (isset($connexion['total_requetes'])) {
				echo " | " . ($serveur ? $serveur . " : " : "") . $connexion['total_requetes'] . " requetes";
			}
		}
		if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
			echo " | " . number_format((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]), 2) . " s";
		} else if (isset($GLOBALS['page_start_time'])) {
			// définir $GLOBALS['page_start_time'] = microtime(true); le plus tôt possible (dans mes_options)
			// pour afficher le temps de calcul de la page
			echo " | " . number_format((microtime(true) - $GLOBALS['page_start_time']), 2) . " s";
		}
		echo "</div>";
		if (isset($GLOBALS['_debug'])) {
			echo var_export($GLOBALS['_debug'], true);
		}
	}
}
register_shutdown_function('affiche_usage_memoire');
