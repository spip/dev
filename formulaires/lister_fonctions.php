<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

function formulaires_liste_fonctions_charger_dist () {

    $valeurs = array();
    $valeurs['nom'] = (_request('nom')) ? _request('nom') : '' ;

    return $valeurs;
}

function formulaires_liste_fonctions_verifier_dist () {

    $erreurs = array();
    return $erreurs;
}

function formulaires_liste_fonctions_traiter_dist () {

    $res = array();
    return $res;
}

?>