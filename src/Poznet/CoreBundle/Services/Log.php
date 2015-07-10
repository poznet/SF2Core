<?php

namespace Poznet\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Poznet\CoreBundle\Entity\log as elog;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

 
class Log {
    private $em;
    private $security;
    
    
    public function __construct(EntityManager $em,TokenStorageInterface $security) {
        $this->em=$em;
        $this->security=$security;
        
    }
    
    public function add($itemtype,$itemid,$action,$desc){
         $log=new elog();
         $log->setAction($action);
         $log->setItemid($itemid);
         $log->setItemtype($itemtype);
         $log->setDescription($desc);
         $log->setUsername($this->security->getToken()->getUsername());
         $log->setUserid($this->security->getToken()->getUser()->getId());               
         $this->em->persist($log);
         $this->em->flush();
         return true;
    }
}
