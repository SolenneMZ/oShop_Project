<?php

/**
 * Fichier contenant des fonctions globales à notre application
 */

/**
 * Ceci est un DocBlock
 * https://docs.phpdoc.org/guides/docblocks.html
 *
 * @param string $assetRelativeURL Asset URL starting from assets folder
 */
function getAssetAbsoluteURL($assetRelativeURL)
{
    // Permet de supprimer le slash de début si présent
    // Par ex.
    // /images/produits/1-kiss.jpg => images/produits/1-kiss.jpg
    $assetRelativeURL = ltrim($assetRelativeURL, '/');

    // BASE_URI = dossier public (sans slash final / trailing slash)
    // on y ajoute le chemin vers le sous-dossier assets/
    return $_SERVER['BASE_URI'] . '/assets/' . $assetRelativeURL;
}
