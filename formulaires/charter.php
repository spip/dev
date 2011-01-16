<?php
/**
 * Chargement des valeurs
 * @return array
 */
function formulaires_charter_charger_dist(){

	$valeurs = array(
		'text'=>'',
		'text_obli'=>'',
		'textarea'=>'',
		'textarea_pleine_largeur'=>'',
		'text_long_label'=>'',
		'radio'=>'non',
		'checkbox'=>array(1),
		'checkbox_long_label'=>array(1,2),
	);

	return $valeurs;
}

/**
 * Verifier la saisie
 * on simule des erreurs si on a clique sur annuler
 * @return array
 */
function formulaires_charter_verifier_dist(){
	$erreurs = array();
	if (_request('cancel')){
		$erreurs['message_erreur'] = _L('Un long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur...');
		$erreurs['text'] = _L('Erreur');
		$erreurs['text_obli'] = _L('Erreur');
		$erreurs['textarea'] = _L('Un long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur, long message d\'erreur...');
		$erreurs['textarea_pleine_largeur'] = _L('Erreur');
		$erreurs['text_long_label'] = _L('Erreur');
		$erreurs['radio'] = _L('Erreur');
		$erreurs['checkbox'] = _L('Erreur');
		$erreurs['checkbox_long_label'] = _L('Erreur');
	}

	return $erreurs;
}

/**
 * Traitement de la saisie
 */
function formulaires_charter_traiter_dist(){
	return array('message_ok'=>_L('Bravo, c\'est une reussite !'));
}

?>