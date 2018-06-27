# C'est nous qu'on fait l'avenir

## Sommaire
- Introduction
    - Objectifs
    - Périmètre
    - Définition, acronymes, glossaire
    - Références
    - Vue d'ensemble
- Description d'ensemble
    - Choix techniques
        - Base de données
        - Solution back-end
        - Solution front-end
    - Dépendances
- Exigences spécifiques
    - Cas d'utilisation
    - Exigences supplémentaires
- Base de données
    - Définition des entités
    - Modélisation
    - Projection de volumétrie
- Architecture technique
    - Classes
    - Diagramme de classes
    - Interfaces externes
- Sécurité
    - Etude des risques
- Installation et déploiement
    - Installation
    - Déploiement

# Introduction

An 2126, la Terre est de plus en plus surpeuplée. Les terres agricoles se trouvent de plus en plus précieuses, les nombreuses usines rendent certaines zones de plus en plus polluées, le coût de la vie se voit augmenter de jour en jour et la misère règne en maître. L’humanité a mis en place plusieurs stations orbitales pour préserver la planète.

Les gouvernements se sont alliés pour délocaliser les humains vers l'espace. Jusqu'à maintenant, seules des organisations gouvernementales se chargaient de fournir des logements à faible coût aux citoyens du monde entier dans des stations interstellaires. Ces logements sont très minimalites et cela consitue un environnement de vie très limité. Laissant place à un manque de vie privée et de confort.

## Objectifs

Nos objectifs sont donc constitués des points suivants : 

- Délocalisation des habitations en orbite de la Terre sur une station privée modulable
- Réaménagement de terres agricoles sur Terre grâce à la délocalisation
- Purification écologique progressive de la Terre

Pour cela, nous devons créer un service proposant de la location/vente de stations mises en orbite pour des séjours plus ou moins longs. La plateforme propose un espace de gestion de ses stations (monitoring, support, réseau social etc.). Les biens immobilier modulables peuvent donc se rattacher à la station mère.

Nous proposons une plateforme permettant de louer/acheter un ou plusieurs vaisseaux modulable autosuffisant, un système de location et vente de modules indépendants avec un système de gestion donnant accès à un support d’aide, aux actualités, et un réseau social intrastation.

## Périmètre

Le périmètre du projet est simple. L'utilisateur s'inscris sur la plateforme, il peut se connecter, commander un module, puis gérer les factures et le monitoring lié aux modules qui lui est associé. En dehors de ça, il a accès aux fonctionnalités suivantes : 

- Actualité intrastation
- Chat intrastation
- Support / Assistance

## Définition, acronymes, glossaire

**Module :** petit vaisseau spatial indépendant louable depuis la plateforme dans lequel un individu peut vivre plusieurs mois sans ravitaillement.

**Station :** C'est la station mère. Un vaisseau spatial de grande taille dans lequel la plateforme est centralisée. C'est le vaisseau principal qui permet de se ravitailler ou de recharger son module. Il sert aussi de quartier général, permettant aux citoyens de la station d'y exercer un travail, de détendre et de se socialiser.

## Références

## Vue d'ensemble

Les fonctionnalités de cette plateforme web sont donc : 

- Gestion des modules
- Gestion habitat (température, gravité, atmosphère ...)
- Actualités
- Chat intrastation
- Facturation des prestations
- Assistance (tickets)

Voir le schema ci-dessous, qui représente un sitemap simplifié : 

<p align="center">
    <img src="https://i.imgur.com/SUM5WY3.png" alt="">
</p>

# Description d'ensemble

## Authentification

L'authentification se fait via un formulaire d'inscription et de connexion. L'utilisateur rentre les champs suivants : 

- Nom & prénom
- Adresse email
- Mot de passe (x2)

Après inscription, l'utilisateur est redirigé vers la page connexion de pour s'identifier et accèder à la plateforme. L'adresse email est un donc un identifiant unique.

## Gestion des modules

Un utilisateur peut avoir plusieurs modules. Depuis l'interface utilisateur il peut commander un nouveau module. Il choisi son type de module, le mode de paiement puis obtient une facture. Les types de modules sont ajoutés manuellement par les administrateurs. En fonction du stock disponible, l'utilisateur peut commander un nouveau module à tout moment.

## Actualités

Sur une page actualité depuis l'interface, chaque utilisateur a accès à des articles écrits par des administrateurs. Chaque actualité à une image d'illustration, un titre, une date de publication, un auteur et un contenu.

## Chat intrastation

Le chat intrastation est une messagerie instantanée accèssible par chaque utilisateur connecté sur la plateforme. Elle est représentée par une petite fenêtre en bas à droite de l'écran.

## Facturation des prestations

Les factures dépendent des modules. Tous les 30 jours, une facture est créée et l'utilisateur n'a que 7 jours pour la régler. Cela pourra être effectué à l'aide d'un CRON JOB et d'une commande Symfony.

## Assistance (tickets)

L'assistance permet à n'importe quel utilisateur de demander de l'aide concernant la plateforme, son module, la facturation ou autre. En revanche ce n'est pas un espace destiné aux urgences.

## Choix techniques

Nous utiliserons le framework Symfony 4.1 avec de l'intégration simple avec Twig, ainsi qu'une base de donnée MySQL 5.7.

Une config de Docker sera utilisée pour le déploiement.



### Base de donnée(s)

La solution de base de donnée est une base de donnée MySQL 5.7.

Elle est composée de la structure suivante (la colonne id est ignorée).

Les FOREIGN KEYs représentent les relations entre les tables.

### Table User (HlgdEoz7Sd)

- FullName, string
- Username, string
- Email, string
- Password, string
- Roles, string
- FOREIGN KEY (Articles) REFERENCES CHITRoylZI(id)
- FOREIGN KEY (Modules) REFERENCES 2FlULjTwcP(id)

Un utilisateur peut avoir plusieurs articles et plusieurs modules (OneToMany).

### Table Article (CHITRoylZI)

- Image, string
- Title, string
- FOREIGN KEY (User) REFERENCES HlgdEoz7Sd(id)
- Date, datetime
- Content, text

Un article ne peut avoir qu'un seul utilisateur (ManyToOne).

### Table ModuleType (xfHQzAsCeM)

- 

### Table Module (2FlULjTwcP)

- FOREIGN KEY (ModuleType) REFERENCES xfHQzAsCeM(id)
- FOREIGN KEY (User) REFERENCES HlgdEoz7Sd(id)
- Title, string
- Date, datetime
- Content, text

Un module ne peut avoir qu'un seul utilisateur et qu'un seul type (ManyToOne).

### Table Bill (gKVbpxsYPE)

- FOREIGN KEY (User) REFERENCES HlgdEoz7Sd(id)
- FOREIGN KEY (Module) REFERENCES 2FlULjTwcP(id)
- Cost, float

Une facture ne peut avoir qu'un module et qu'un utilisateur (ManyToOne).

### Table Ticket (q1gY5nmyVd)

- Object, string
- Message, text
- Status, string

### Table Message (yAvL3mMr9U)

- FOREIGN KEY (User) REFERENCES HlgdEoz7Sd(id)
- Content
- Date

### Solution back-end
### Solution front-end
## Dépendances
## Exigences spécifiques
### Cas d'utilisation
### Exigences supplémentaires
## Base de données
### Définition des entités
### Modélisation
### Projection de volumétrie
## Architecture technique
### Classes
### Diagramme de classes
### Interfaces externes
## Sécurité
### Etude des risques
## Installation et déploiement
### Installation
### Déploiement