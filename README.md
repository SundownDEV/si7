# Stellar

The end of earth will not be the end of us.

*Just another school project*

Architecture
------------

The application is made of a simple server-sided architecture. See the schema below.

<p align="center"><img src="./docs/archi1.png" alt="architecture schema"></p>

The usage of Docker allows us to deploy easily the application in a closed and secure environment.

Requirements
------------

  * PHP 7.1.3 or higher;
  * MySQL 5.7
  * PDO-MySQL PHP extension enabled;
  * Composer
  * npm & node **>= 8**
  * Docker **>= 18.0.0** & Docker-compose **>= 1.21.0**

Installation (docker)
------------

Executer ces commandes pour installer le projet :

```bash
$ git clone https://github.com/SundownDEV/si7
$ cd si7/
$ docker-compose build
```

L'application est maintenant accessible à l'adresse `http://localhost:8000/`

Installation (manual)
------------

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

Avec Docker, il faut simplement synchroniser les schema. La base de donnée est déjà initialisée.

```bash
$ docker exec si7_app_1 bin/console doctrine:schema:update --force
```

<hr>

Usage
-----

Charger les data fixtures (données de test)

```
$ php bin/console doctrine:fixture:load
```

Built-in commands
-----

|     Description    | Command           |
| ------------- |:-------------|
| Install the project | `composer install && npm install`      |
| Start the server      | `php bin/console server:start` |
| Stop the server      | `php bin/console server:stop`      |
| Get the framework version      | `php bin/console app:version`      |
| List users      | `php bin/console app:list-users`      |
| Create new user      | `php bin/console app:add-user`      |
| Delete an user      | `php bin/console app:delete-user`      |
