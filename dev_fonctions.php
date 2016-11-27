<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Une fonction récursive pour joliment afficher #ENV, #GET, #SESSION...
 *		en squelette : [(#ENV|bel_env)], [(#GET|bel_env)], [(#SESSION|bel_env)]
 *		ou encore [(#ARRAY{0,1, a,#SESSION, 1,#ARRAY{x,y}}|bel_env)]
 *
 * @param string|array $env
 *		si une string est passée elle doit être le serialize d'un array 
 * @param bool         $afficher_en_clair
 *      si vrai indique qu'il faut afficher la chaine vide, la valeur null
 *      et les booleens respectivement comme `''`, `null`, `true` ou `false`.
 *
 * @return string
 *		une chaîne html affichant une <table>
**/
function bel_env($env, $afficher_en_clair = false) {
	if (!$afficher_en_clair) {
		$env = str_replace(array('&quot;', '&#039;'), array('"', '\''), $env);
	}
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
			$val = bel_env($val, $afficher_en_clair);
		}
		elseif (($val === null) and $afficher_en_clair) {
			$val = '<i>null</i>';
		}
		elseif (($val === '') and $afficher_en_clair) {
			$val = "<i>''</i>";
		}
		elseif (($val === true) and $afficher_en_clair) {
			$val = '<i>true</i>';
		}
		elseif (($val === false) and $afficher_en_clair) {
			$val = '<i>false</i>';
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
