# C'est nous qu'on fait l'avenir

## Sommaire
- [Introduction](#Introduction)
    - [Objectifs](#Objectifs)
    - [Périmètre](#Périmètre)
    - [Définition, acronymes, glossaire](#Définition-acronymes-glossaire)
    - [Vue d'ensemble](#Vue-d%E2%80%99ensemble)
- [Description d'ensemble](#Description-d%E2%80%99ensemble)
    - [Choix techniques](#Choix-techniques)
        - [Base de données](#Base-de-données)
        - [Solution back-end](#Solution-back-end)
        - [Solution front-end](#Solution-front-end)
    - [Dépendances](#Dépendances)
- [Exigences spécifiques](#Exigences-spécifiques)
    - [Cas d'utilisation](#Cas-d'utilisation)
- [Base de données](#Base-de-données)
    - [Définition des entités](#Définition-des-entités)
    - [Modélisation](#Modélisation)
    - [Projection de volumétrie](#Projection-de-volumétrie)
- [Architecture technique](#Architecture-technique)
    - [Diagramme de classes](#Diagramme-de-classes)
- [Sécurité](#Sécurité)
    - [Etude des risques](#Etude-des-risques)
- [Installation et déploiement](#Installation-et-déploiement)
    - [Installation](#Installation)
    - [Déploiement](#Déploiement)

ps: j'ai enlevé : références, classes, interfaces externes, exigences supplémentaires

# Introduction

An 2126, la Terre est de plus en plus surpeuplée. Les terres agricoles se trouvent de plus en plus précieuses, les nombreuses usines rendent certaines zones de plus en plus polluées, le coût de la vie se voit augmenter de jour en jour et la misère règne en maître. L’humanité a mis en place plusieurs stations orbitales pour préserver la planète.

Les gouvernements se sont alliés pour délocaliser les humains vers l'espace. Jusqu'à maintenant, seules des organisations gouvernementales se chargaient de fournir des logements à faible coût aux citoyens du monde entier dans des stations interstellaires. Ces logements sont très minimalites et cela consitue un environnement de vie très limité. Laissant place à un manque de vie privée et de confort.

## Objectifs

Nos objectifs sont donc constitués des points suivants : 

- Délocalisation des habitations en orbite de la Terre sur une station privée modulable
- Réaménagement de terres agricoles sur Terre grâce à la délocalisation
- Purification écologique progressive de la Terre

Pour cela, nous devons créer un service proposant de la location/vente de vaisseaux modulable autosuffisants mis en orbite pour des séjours plus ou moins longs. La plateforme propose un espace de gestion de ses stations (monitoring, support, réseau social etc.). Les biens immobilier modulables peuvent donc se rattacher à la station mère.

## Périmètre

Le périmètre du projet est simple. L'utilisateur s'inscris sur la plateforme, il peut se connecter, commander un module, puis gérer les factures et le monitoring lié aux modules qui lui est associé. En dehors de ça, il a accès aux fonctionnalités suivantes : 

- Actualité intrastation
- Chat intrastation
- Support / Assistance

## Définition, acronymes, glossaire

**Module :** petit vaisseau spatial indépendant louable depuis la plateforme dans lequel un individu peut vivre plusieurs mois sans ravitaillement.

**Station :** C'est la station mère. Un vaisseau spatial de grande taille dans lequel la plateforme est centralisée. C'est le vaisseau principal qui permet de se ravitailler ou de recharger son module. Il sert aussi de quartier général, permettant aux citoyens de la station d'y exercer un travail, de se détendre et se socialiser.

**Interface utilisateur/Plateforme :** Application web du projet où l'utilisateur peut se connecter et accèder à un espace qui lui est dédié.

## Vue d'ensemble

Les fonctionnalités de cette plateforme web sont donc : 

- Gestion des modules
- Gestion habitat (température, gravité, atmosphère ...)
- Actualités
- Chat intrastation
- Facturation des prestations
- Assistance (tickets)

# Description d'ensemble

## Authentification

L'authentification se fait via un formulaire d'inscription et de connexion. L'utilisateur rentre les champs suivants : 

- Nom & prénom
- Adresse email
- Mot de passe (x2)

Après inscription, l'utilisateur est redirigé vers la page connexion de pour s'identifier et accèder à la plateforme. L'adresse email est un donc un identifiant unique.

## Gestion des modules

Un utilisateur peut avoir plusieurs modules. Depuis l'interface utilisateur il peut commander un nouveau module. Il choisi son type de module, le mode de paiement puis obtient une facture. Les types de modules sont ajoutés manuellement par les administrateurs. En fonction du stock disponible, l'utilisateur peut commander un nouveau module à tout moment.

Sur la page de monitoring, l'utilisateur peut gérer la température, l'oxygène et l'énergie restante.

## Actualités

Sur une page actualité depuis l'interface, chaque utilisateur a accès à des articles écrits par des administrateurs. Chaque actualité à une image d'illustration, un titre, une date de publication, un auteur et un contenu.

## Chat intrastation

Le chat intrastation est une messagerie instantanée accèssible par chaque utilisateur connecté sur la plateforme. Elle est représentée par une petite fenêtre en bas à droite de l'écran.

## Facturation des prestations

Les factures dépendent des modules. Tous les 30 jours, une facture est créée et l'utilisateur n'a que 7 jours pour la régler. Cela pourra être effectué à l'aide d'un CRON JOB et d'une commande Symfony.

## Assistance (tickets)

L'assistance permet à n'importe quel utilisateur de demander de l'aide concernant la plateforme, son module, la facturation ou autre. En revanche ce n'est pas un espace destiné aux urgences.

## Choix techniques

### Base de donnée(s)

La solution de base de donnée est une base de donnée MySQL 5.7.

### Solution back-end

Nous utiliserons le framework PHP Symfony en version 4.1.

### Solution front-end

Intégration simple en html/css/js accouplée au templating avec Twig.

## Dépendances

[Symfony 4.1](https://github.com/symfony/symfony) via le package composer [symfony/skeleton](https://symfony.sh).

Et une API REST avec [Api Platform](http://api-platform.com/).

# Exigences spécifiques

### Cas d'utilisation

<p align="center">
    <img src="https://i.imgur.com/1T6VGPQ.png" alt="">
</p>

# Base de données

### Définition des entités

#### Table User

Utilisateurs qui s'inscrivent, y compris les utilisateurs.

Un utilisateur peut avoir plusieurs articles et plusieurs modules (OneToMany).

#### Table Article

Articles écrit par les administrateurs et consultable par tous les utilisteurs.

Un article ne peut avoir qu'un seul utilisateur (ManyToOne).

#### Table ModuleType

Les différents types de module.

Un type de module peut avoir plusieurs modules (OneToMany).

#### Table Module

Les modules disponibles à l'achat/location pour les utilisateurs.

Un module ne peut avoir qu'un seul utilisateur et qu'un seul type (ManyToOne).

#### Table Bill

La facturation pour chaque module, tous les 30 jours.

Une facture ne peut avoir qu'un module et qu'un utilisateur (ManyToOne).

#### Table Ticket

Les tickets d'assistance crée par les utilisateurs.

#### Table Message

Les messages du chat instantanné intrastation écrit par les utilisateurs.

### Modélisation

<p align="center">
    <img src="https://i.imgur.com/SUM5WY3.png" alt="">
</p>

### Projection de volumétrie

On estime 5000 à 10000 utilisateurs actifs sur un an. Sachant qu'un fichier de logs pour 100 utilisateurs pèse environ 10MB, cela représente 500 à 5000MB de logs.

# Architecture technique

### Diagramme de classes

<p align="center">
    <img src="https://i.imgur.com/01OzDyL.png" alt="">
</p>

# Sécurité

### Etude des risques

L'utilisation de Symfony permet d'éviter des failles basiques tel que les failles CSRF, Injection SQL, Session hijacking ...

Dans le contexte, à savoir la location de modules habitables, les enjeux sécurité sont très présents.

Néanmoins une grande partie de la sécurité se fait côté utilisteur. Nous devons prévenir nos utilisateurs des tentatives de phishing, et les inciter à activer la double authentification sur leur compte.

Nous devons aussi sécuriser l'application à l'aide des rôles et une spécification stricte des méthodes utilisée. Faire en sorte que la création d'un article ne soit pas possible avec le rôle ROLE_USER par exemple.

Les serveurs seront sécurisés grâce au firewall mis en place, 

# Installation et déploiement

### Installation

#### Requis

  * PHP >= 7.1.3
  * MySQL 5.7
  * PDO-MySQL PHP extension
  * Composer
  * Docker **>= 18.0.0** & Docker-compose **>= 1.21.0**

#### Installation (docker)

Executer ces commandes pour installer le projet :

```bash
$ git clone https://github.com/SundownDEV/si7
$ cd si7/
$ docker-compose build
```

L'application est maintenant accessible à l'adresse `http://localhost:8000/`

#### Installation (manual)

```bash
$ git clone https://github.com/SundownDEV/si7
$ cd si7/
$ composer install
```

Après avoir installé le projet, il faut synchroniser les schemas de la base de donnée.

Pour l'installation manuelle, il faut d'aborder créer la base de donnée. Puis synchroniser les schema.

```
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```

Avec Docker, il faut simplement synchroniser les schema

```bash
$ docker exec si7_app_1 bin/console doctrine:schema:update --force
```

#### Commandes

|     Description    | Command           |
| ------------- |:-------------|
| Start the server      | `php bin/console server:start` |
| Stop the server      | `php bin/console server:stop`      |
| Get the framework version      | `php bin/console app:version`      |
| List users      | `php bin/console app:list-users`      |
| Create new user      | `php bin/console app:add-user`      |
| Delete an user      | `php bin/console app:delete-user`      |

### Déploiement

Nous utilisons Docker pour le déploiement. Le projet nécessite qu'on build les images en amont avec la commande `docker-compose build`.

Par défaut, l'application est déployée sur le port 80 à l'intérieur du container et le port 8000 à l'extérieur.