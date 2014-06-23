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

function lister_fonctions ($prefixe = null) {
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

	if ($prefixe) {
		// On pourrait faire aussi un contrôle avec array_key_exists()
		// Mais ça risque de fausser le résultat attendu.
		$resultat = $fonctions_user[$prefixe];
	}

	return $resultat;

}

function lister_images ($prefixe = null) {
	$images = find_all_in_path("prive/themes/spip/images/", "\w.\w");

	foreach ($images as $key => $value) {
		// On ne prend que les images issues des thèmes.
		if (est_image($value)) {
			if ($image = preg_split('/-/', $key, -1, PREG_SPLIT_NO_EMPTY)) {
				if (count($image) > 1) {
					$images[$image[0]][] = $value;
				} else {
					$image = explode('.', $image[0]);
					$images[$image[0]][] = $value;
				}
				unset($images[$key]);
			}
		} else {
			// Si ce n'est pas une image, on l'enlève du tableau.
			unset($images[$key]);
		}
	}

	$resultat = $images;

	if ($prefixe) {
		// On pourrait faire aussi un contrôle avec array_key_exists()
		// Mais ça risque de fausser le résultat attendu.
		$resultat = $images[$prefixe];
	}

	return $resultat;

}
/**
 * Cette fonction vérifie si le fichier est une image ou pas.
 * On fait un test selon l'existence des fonctions PHP qui peuvent nous aider.
 * On évite ainsi une alerte PHP
 *
 * @param  string $fichier
 *         url relative du fichier.
 * @return bool
 */
function est_image ($fichier)
{
    $image = false;
    if (function_exists('exif_imagetype')) {
        if (is_numeric(exif_imagetype($fichier))) {
            $image = true;
        }
    } elseif (function_exists('getimagesize')) {
        if (is_array(getimagesize($fichier))) {
            $image = true;
        }
    }
    return $image;
}

?>