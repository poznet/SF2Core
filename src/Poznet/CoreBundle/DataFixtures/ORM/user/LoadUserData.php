<?php

namespace Poznet\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Poznet\CoreBundle\Entity\user;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
     private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }//put your code here
    
     public function load(ObjectManager $manager)
    {
         $userAdmin = new user();

        // Create encoder and hashed password
        $factory = $this->container->get('security.encoder_factory');
        try{
        $encoder = $factory->getEncoder($userAdmin);
        
        $password = $encoder->encodePassword('admin', $userAdmin->getSalt());

        // Set user data
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword($password);

        $userAdmin->setEmail("me@me.com");
        $userAdmin->setActive(true);

        // Save to db
        $manager->persist($userAdmin);
        $manager->flush();
        } catch(\RuntimeException $e) {
          //its  lame :)
        
        }    
     }
}
