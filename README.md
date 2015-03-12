patterns - "Les patrons des Ateliers"
========

[![documentation](http://img.ateliers-pierrot-static.fr/read-the-doc.svg)](http://docs.ateliers-pierrot.fr/patterns/)
A set of PHP classic interfaces and abstract classes patterns.


Installation
------------

For a complete information about how to install this package and load its namespace, 
please have a look at [our *USAGE* documentation](http://github.com/atelierspierrot/atelierspierrot/blob/master/USAGE.md).

If you are a [Composer](http://getcomposer.org/) user, just add the package to the 
requirements of your project's `composer.json` manifest file:

```json
"atelierspierrot/patterns": "dev-master"
```

You can use a specific release or the latest release of a major version using the appropriate
[version constraint](http://getcomposer.org/doc/01-basic-usage.md#package-versions).


Usage
-----

The whole package is embedded in the `Patterns` namespace (in the `src/` directory).

### Abstract classes

All abstract classes are embedded in the `Patterns\Abstracts` namespace and prefixed by `Abstract`.
They mostly define some common "basic" objects often used in development (the *singleton* pattern, 
an *optionable* base object etc).

### Interfaces

All interfaces are embedded in the `Patterns\Interfaces` namespace and suffixed by `Interface`.
We try here to define some common patterns you can use as a base to construct your objects. 

### Common classes

All "helper" classes are embedded in the `Patterns\Commons` namespace. They define some basic objects
to use "as is" (or to extend) to manage common things like a *collection*, a *configuration* or a 
*registry*.

### Traits

All traits are embedded in the `Patterns\Traits` namespace and suffixed by `Trait`. We define here
some "hard copies" (for now) of the abstract classes defined in the `Patterns\Abstracts` namespace
and other useful objects. We try to never introduce ambiguity when using these traits by using 
specific variable names and meaningful method names.


Author & License
----------------

>    Patterns

>    http://github.com/atelierspierrot/patterns

>    Copyright (c) 2013-2015 Pierre Cassat and contributors

>    Licensed under the Apache 2.0 license.

>    http://www.apache.org/licenses/LICENSE-2.0

>    ----

>    Les Ateliers Pierrot - Paris, France

>    <http://www.ateliers-pierrot.fr/> - <contact@ateliers-pierrot.fr>
