<p align="center">
  <img src="./docs/logo.png" alt="">
</p>

<p align="center">
  <a href="http://travis-ci.org/SundownDEV/Vulcano"><img src="https://img.shields.io/travis/SundownDEV/Vulcano.svg?style=flat" alt="Build Status"></a>
  <a href="#"><img src="http://img.shields.io/badge/source-SundownDEV/Vulcano-brightgreen.svg?style=flat" alt="Source"></a>
  <a href="#"><img src="https://img.shields.io/badge/version-1.0.0--rc1-red.svg?style=flat" alt="Version"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg?style=flat" alt="License"></a>
</p>

Vulcano
========================

Vulcano is a minimal PHP CMS based on the "Symfony Demo Application" which is a reference application created to show how
to develop Symfony applications following the recommended best practices.

## Methodology: Why and How

### The Why

Most of time a developer choose a framework or a CMS to build applications faster. Which is very useful because it provide you a lot of pre-installed tools and components. Also because it's popular, it provides you a large community and many plugins. The most popular framework is Symfony, but the most popular CMS is Wordpress. Wordpress has a really poor and slow framework which create a lot of performance and security issues. There's a lot of alts to Wordpress like Drupal, Voyager which are based on more recent frameworks such as Laravel or Symfony. The main problem of these CMSs is that they have a lot of features and components which can be usually unwanted. Also, these CMSs are very user-friendly and that might result in a security issue. When you have to create an application and want to start from a CMS, you probaly want to start on a good base but not with a lot of unwanted components or features. Also you probaly want the framework to be very flexible in time : add your own features, configuration and even a front framework. Symfony is a strong framework that provides you a lot of performance and security features and allows you to code really quickly. We want to use it at his best.

### The How

Vulcano is based on the Symfony Demo Application so it uses the best practices. The main goal is to provide a minimal Content Management System that focus on security, performances, and flexibility in time. Vulcano provides a default Webpack configuration that manage many templates assets and some basic features to get started with a production-ready base framework. There's also a security shield provided by Symfony that can be used for all your forms and sessions.

Symfony is a powerful PHP framework using MVC architecture pattern. Symfony 4.0 is the fatest PHP framework, but it also allow you to code micro applications such as API REST without using unwanted dependencies or features.

**Symfony 4 represents a rethinking of its ideas and features** from the ground up to match the industry practices: application bundles are gone, config parameters are now environment variables, the application directory structure is easier to navigate and hundreds of other small improvements that will make you love Symfony.

The result is less Symfony concepts and more standard practices. **Easier to learn, easier to configure, easier to install and deploy and easier to master.** Simple, powerful, amazing! [Learn more about Symfony 4](https://symfony.com/4)

We also want ease the application deployment by using Docker.

<p align="center"><img src="docs/diagram.png" alt="diagram" /></p>

## CMS features

- [x] User authentification (with roles)
- [ ] User settings
- [x] Post management
- [x] Post comments
- [x] Tag management
- [x] Post search
- [ ] Upload management
- [x] Translations

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
