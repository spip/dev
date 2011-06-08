<?php

define('_LOG_FILTRE_GRAVITE',8);
$GLOBALS['test_i18n'] = true; // signaler les trads manquantes

function affiche_usage_memoire(){
	chdir(_ROOT_CWD); // precaution
	// dans l'espace prive uniquement, et si la fonction taille_en_octets est deja chargee
	if (test_espace_prive()
	    AND function_exists('taille_en_octets')
			AND !_request('action'))
		echo "<div style='position:fixed;top:0;right:0;color:#fff;background:#666;padding:5px;z-index:1000;'>"
		 . taille_en_octets(memory_get_usage())
		 . '</div>';
}
register_shutdown_function('affiche_usage_memoire');
