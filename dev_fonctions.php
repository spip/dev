<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

// Une fonction pour joliment afficher les variables de #ENV, #GET, #SESSION...
// à utiliser avec [(#ENV|bel_env)], [(#GET|bel_env)], [(#SESSION|bel_env)]
function bel_env($env) {
  $env = str_replace(array('&quot;', '&#039;'), array('"', '\''), $env);
  if (is_array($env_tab = @unserialize($env))) $env = $env_tab;
  if (!$env) return '';
  $res = "\n";
  foreach ($env as $nom => $valeur) {
    if (is_array($valeur)) $valeur = bel_env($valeur);
    else $valeur = entites_html($valeur);
    $res .= "|". entites_html($nom). "&nbsp;:&nbsp;|{" .$valeur. "}|\n";
  }
  return "\n<fieldset>\n" .propre($res). "</fieldset>\n";
}

?>