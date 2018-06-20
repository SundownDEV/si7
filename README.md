# Stellar

The end of earth will not be the end of us.

Requirements
------------

  * PHP 7.1.3 or higher;
  * PDO-MySQL PHP extension enabled;
  * and the [usual Symfony application requirements][1].

Installation
------------

Execute this command to install the project:

```bash
$ git clone https://github.com/SundownDEV/vulcano
$ cd vulcano/
$ composer install
```

Create database and execute migrations

```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migration:migrate
```

Create a new user

```bash
$ php bin/console app:add-user
```

OR load test fixtures

```bash
$ php bin/console doctrine:fixtures:load
```

Usage
-----

There's no need to configure anything to run the application. Just execute this
command to run the built-in web server and access the application in your
browser at <http://localhost:8000>:

```bash
$ cd vulcano/
$ php bin/console server:start
```

Alternatively, you can [configure a fully-featured web server][2] like Nginx
or Apache to run the application.

Tests
-----

Execute this command to run tests:

```bash
$ cd vulcano/
$ ./vendor/bin/simple-phpunit
```

Alias
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

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
