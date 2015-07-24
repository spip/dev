<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

defined('_LOG_FILTRE_GRAVITE') || define('_LOG_FILTRE_GRAVITE', 8);
defined('_DEBUG_AUTORISER')    || define('_DEBUG_AUTORISER', true);

$GLOBALS['test_i18n'] = true; // signaler les trads manquantes

if(!defined('_DEBUG_MINIPRES'))
	define('_DEBUG_MINIPRES',true);

function affiche_usage_memoire(){
	if (
		(!defined('_AJAX') OR !_AJAX)
		AND $GLOBALS['auteur_session']['webmestre'] == 'oui'
		AND !_request('action')
		AND !preg_match('#(\.css|\.js)#', _request('page'))
		AND !preg_match('#(\.css|\.js)#', _request('file'))
	) {
		chdir(_ROOT_CWD); // precaution
		echo "<div style='position:fixed;top:0;left:0;color:#fff;background:#666;padding:5px;z-index:1010;'>";
		echo round(memory_get_usage() / 1024 / 1024, 1) . ' Mo';
		foreach ($GLOBALS['connexions'] as $serveur => $connexion) {
			if (isset($connexion['total_requetes'])) {
				echo " | " . ($serveur ? $serveur . " : " : "") . $connexion['total_requetes'] . " requetes";
			}
		}
		// définir $GLOBALS['page_start_time'] = microtime(true); le plus tôt possible (dans mes_options)
		// pour afficher le temps de calcul de la page
		if (isset($GLOBALS['page_start_time'])) {
			echo " | " . number_format((microtime(true) - $GLOBALS['page_start_time']), 2) . " s";
		}
		echo "</div>";
		if (isset($GLOBALS['_debug'])) {
			echo var_export($GLOBALS['_debug'], true);
		}
	}
}
register_shutdown_function('affiche_usage_memoire');

