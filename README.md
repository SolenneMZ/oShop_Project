# Dans les shoe

C'est parti :running:

Mais on ne part pas la tête dans le guidon :hand:  
On a encore 2-3 choses à apprendre pour bien démarrer les bases techniques de notre projet :nerd_face:

# Utilisation de libriaires externes PHP

- Un script ou un ensemble de scripts PHP s'appelle une librairie.
- Cette librairie est utilisable au sein de notre projet.
- Afin de suivre les mises à jour des librairies en question, on va passer par _[Packagist](https://packagist.org/)_ qui est un _Repository_ (un dépôt où se trouve les libriaires).
- Pour accéder à ce dépôt de manière automatique mais aussi pour mettre à jour automatiquement toutes les libriaires de notre projet, on va utiliser _Composer_.
- Note : au sein de notre projet, ces librairies sont appelées des _dépendances_.
  - _Composer_ est donc un gestionnaire de dépendances.
- On fera par ex. un `composer require symfony/var-dumper` **à la racine de notre projet** pour installer _vardumper_
- En cas de clone de repo dont le projet est géré via Composer, il faudra la première fois exécuter la commande `composer install`