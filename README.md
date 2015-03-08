patterns - "Les patrons des Ateliers"
========

[![documentation](http://img.ateliers-pierrot-static.fr/readthe-doc.png)](http://docs.ateliers-pierrot.fr/patterns/)
A set of PHP classic interfaces and abstract classes patterns.

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

You can use this package in your work in many ways.

First, you can clone the [GitHub](https://github.com/atelierspierrot/patterns) repository
and include it "as is" in your poject:

    https://github.com/atelierspierrot/patterns

You can also download an [archive](https://github.com/atelierspierrot/patterns/downloads)
from Github.

Then, to use the package classes, you just need to register the `Patterns` namespace directory
using the [SplClassLoader](https://gist.github.com/jwage/221634) or any other custom autoloader:

```php
require_once '.../src/SplClassLoader.php'; // if required, a copy is proposed in the package
$classLoader = new SplClassLoader('Patterns', '/path/to/package/src');
$classLoader->register();
```

If you are a [Composer](http://getcomposer.org/) user, just add the package to your requirements
in your `composer.json`:

```json
"require": {
    "your-dependencies": "*",
    "atelierspierrot/patterns": "dev-master"
}
```

## Development

To install all PHP packages for development, just run:

    ~$ composer install --dev

A documentation can be generated with [Sami](https://github.com/fabpot/Sami) running:

    ~$ php vendor/sami/sami/sami.php render sami.config.php

The latest version of this documentation is available online at <http://docs.ateliers-pierrot.fr/patterns/>.


## Author & License

>    Patterns

>    http://github.com/atelierspierrot/patterns

>    Copyright (c) 2013-2015 Pierre Cassat and contributors

>    Licensed under the Apache 2.0 license.

>    http://www.apache.org/licenses/LICENSE-2.0

>    ----

>    Les Ateliers Pierrot - Paris, France

>    <http://www.ateliers-pierrot.fr/> - <contact@ateliers-pierrot.fr>
