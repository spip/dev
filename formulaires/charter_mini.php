<?php

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Chargement des valeurs
 * @return array
 */
function formulaires_charter_mini_charger_dist(string $variante = '') {
	$valeurs = array(
		'saisie_1' => '',
		'saisie_2' => '',
		'variante' => $variante,
	);
	return $valeurs;
}

/**
 * Verifier la saisie
 * on simule des erreurs si on a clique sur annuler
 * @return array
 */
function formulaires_charter_mini_verifier_dist(string $variante = '') {
	$erreurs = [];
	return $erreurs;
}

/**
 * Traitement de la saisie
 */
function formulaires_charter_mini_traiter_dist(string $variante = '') {
	return array('message_ok' => ('Bravo, c’est une réussite !'));
}
