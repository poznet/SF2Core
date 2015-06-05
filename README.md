# SF2Core
Symfony 2 Core bundle

Provides basic and  usefull function in  Symfony 2

- Class for media(images,etc) managment
- Dql Modification that  allow to use date function (Day,Month,Year) in dql
- Basic Entity for  authentication - compatybile with FOS User Bundle
- Controller and Twig for  basic  user authentication
- Twig extension  that gives file_exists function in  twig

### Installation
in app/AppKernel.php add
`new Poznet\CoreBundle\CoreBundle($this)`
Yes  you need add $this (bundle  needs access to  kernel in constructor - to create directory  structure for media)

