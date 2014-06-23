<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Une fonction récursive pour joliment afficher #ENV, #GET, #SESSION...
 *		en squelette : [(#ENV|bel_env)], [(#GET|bel_env)], [(#SESSION|bel_env)]
 *		ou encore [(#ARRAY{0,1, a,#SESSION, 1,#ARRAY{x,y}}|bel_env)]
 *
 * @param string|array $env
 *		si une string est passée elle doit être le serialize d'un array 
 *
 * @return string
 *		une chaîne html affichant une <table>
**/
function bel_env($env) {
	$env = str_replace(array('&quot;', '&#039;'), array('"', '\''), $env);
	if (is_array($env_tab = @unserialize($env))) {
		$env = $env_tab;
	}
	if (!is_array($env)) {
		return '';
	}
	$style = " style='border:1px solid #ddd;'";
	$res = "<table style='border-collapse:collapse;'>\n";
	foreach ($env as $nom => $val) {
		if (is_array($val) || is_array(@unserialize($val))) {
			$val = bel_env($val);
		}
		else {
			$val = entites_html($val);
		}
		$res .= "<tr>\n<td$style><strong>". entites_html($nom).
		"&nbsp;:&nbsp;</strong></td><td$style>" .$val. "</td>\n</tr>\n";
	}
	$res .= "</table>";
	return $res;
}

function lister_fonctions ($nom = null) {
	$fonctions = get_defined_functions();

	$fonctions_user = $fonctions["user"];
	sort($fonctions_user);

	foreach ($fonctions_user as $value) {
		if ($fonction = preg_split('/_/', $value, -1, PREG_SPLIT_NO_EMPTY)) {
			$fonctions_user[$fonction[0]][] = $value;
			if (($key = array_search($value, $fonctions_user)) !== false) {
				unset($fonctions_user[$key]);
			}
		}
	}
	$resultat = $fonctions_user;

	if ($nom) {
		// On pourrait faire aussi un contrôle avec array_key_exists()
		// Mais ça risque de fausser le résultat attendu.
		$resultat = $fonctions_user[$nom];
	}

	return $resultat;

}
?>