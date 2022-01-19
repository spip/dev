<?php

if (!defined('_ECRIRE_INC_VERSION')) { 
	return;
}

/**
 * Chargement des valeurs
 * @param string $suffixe
 *     Suffixe pour utiliser plusieurs fois le formulaire sur la même page
 * @return array
 */
function formulaires_charter_charger_dist(string $suffixe = '') {

	$valeurs = [
		'suffixe' => $suffixe,
	];
	for ($i = 1; $i <= 36; $i++) {
		$valeurs["saisie_$i"] = '';
	}

	return $valeurs;
}

/**
 * Verifier la saisie
 * on simule des erreurs si on a clique sur annuler
 * @param string $suffixe
 *   Suffixe pour utiliser plusieurs fois le formulaire sur la même page
 * @return array
 */
function formulaires_charter_verifier_dist(string $suffixe = '') {
	$erreurs = [];
	if (_request('cancel')) {
		$erreurs['message_erreur']
			= $erreurs['saisie_2']
			= ('Un long message d’erreur, long message d’erreur, long message d’erreur, long message d’erreur, long message d’erreur, long message d’erreur, long message d’erreur…');
		$erreurs['saisie_1'] = ('Erreur avec demande de confirmation<br />' . "<input type='checkbox' name='confirm' id='confirm' value='oui' /><label for='confirm'>Confirmez que vous êtes sûr⋅e</label>");
		$erreurs['saisie_3']
			= $erreurs['saisie_4']
			= $erreurs['saisie_5']
			= $erreurs['saisie_6']
			= $erreurs['saisie_7']
			= $erreurs['saisie_8']
			= ('Message d’explication de l’erreur');
	}

	return $erreurs;
}

/**
 * Traitement de la saisie
 *
 * @param string $suffixe
 *     Suffixe pour utiliser plusieurs fois le formulaire sur la même page
 * @return array
 */
function formulaires_charter_traiter_dist(string $suffixe = '') {
	return ['message_ok' => ('Bravo, c’est une réussite !')];
}
