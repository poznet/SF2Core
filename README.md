# SF2Core
Symfony 2 Core bundle

[![Build Status](https://travis-ci.org/poznet/SF2Core.svg?branch=master)](https://travis-ci.org/poznet/SF2Core) [![Code Climate](https://codeclimate.com/github/poznet/SF2Core/badges/gpa.svg)](https://codeclimate.com/github/poznet/SF2Core)

Provides basic and  usefull function in  Symfony 2

- [Konfig](doc/konfig.md) - Service for  simple text comfiguration. 
- Class for media(images,etc) managment
- Dql Modification that  allow to use date function (Day,Month,Year) in dql
- [Basic authentication](doc/auth.md) - boased on FOS User Bundle
- Controller and Twig for  basic  user authentication
- Twig extension  that gives file_exists function in  twig
- [Simple Logger service](docs/logger.md) - Simple service for logging operation

### Installation
in app/AppKernel.php add
`new Poznet\CoreBundle\CoreBundle($this)`
Yes  you need add $this (bundle  needs access to  kernel in constructor - to create directory  structure for media)

$this->get('log')->add('$itemtype','1','opis','opis2');