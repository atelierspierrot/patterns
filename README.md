patterns - "Les patrons des Ateliers"
========

A set of PHP classic interfaces or abstract classes patterns.


## How-to

This package is just a set of PHP abstract classes and interfaces to use as design patterns
to help external developments. We try to fully document every class or interface in each file doc-block.

As for all our work, we try to follow the coding standards and naming rules most commonly in use:

-   the [PEAR coding standards](http://pear.php.net/manual/en/standards.php)
-   the [PHP Framework Interoperability Group standards](https://github.com/php-fig/fig-standards).

Knowing that, all classes are named and organized in an architecture to allow the use of the
[standard SplClassLoader](https://gist.github.com/jwage/221634).

The whole package is embedded in the `Patterns` namespace.

### Abstract classes

All abstract classes are embedded in the `Patterns\Abstracts` namespace and prefixed by `Abstract`.

### Interfaces

All interfaces are embedded in the `Patterns\Interfaces` namespace and suffixed by `Interface`.

### Common classes

All classes are embedded in the `Patterns\Commons` namespace.


## Installation & usage

To use this package in your work, you can download it and include the `src/Patterns/` directory in your
project, or, if you are a [Composer](http://getcomposer.org/) user, just add the package to your requirements
in your `composer.json`:

    "require": {
        ...
        "atelierspierrot/patterns": "dev-master"
    },
    "repositories": [
        ...
        { "type": "vcs", "url": "https://github.com/atelierspierrot/patterns" }
    ],


## Development

To install all PHP packages for development, just run:

    ~$ composer install --dev

A documentation can be generated with [Sami](https://github.com/fabpot/Sami) running:

    ~$ php vendor/sami/sami/sami.php render sami.config.php


## Author & License

>    Patterns

>    https://github.com/atelierspierrot/patterns

>    Copyleft 2013, Pierre Cassat and contributors

>    Licensed under the GPL Version 3 license.

>    http://opensource.org/licenses/GPL-3.0

>    ----

>    Les Ateliers Pierrot - Paris, France

>    <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
