<?php

namespace Poznet\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Poznet\CoreBundle\Entity\log as elog;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

 
class Log {
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var TokenStorageInterface
     */
    private $security;


    /**
     * @param EntityManager $em
     * @param TokenStorageInterface $security
     */
    public function __construct(EntityManager $em,TokenStorageInterface $security) {
        $this->em=$em;
        $this->security=$security;
        
    }

    /**
     * Adds  log  entry
     *
     * @param $itemtype
     * @param $itemid
     * @param $action
     * @param $desc
     * @return bool
     */
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


    /**
     * Gets logs of current user
     * @return mixed
     */
    public function getCurrentUserLogs(){
        return $this->em->getRepository("CoreBundle:log")->findByUsername($this->security->getToken()->getUsername());
   }

    /**
     * Get user logs  by user id
     * @param $id
     * @return mixed
     */
    public function getUserLogsByUserId($id){
       return $this->em->getRepository("CoreBundle:log")->findById($id);
   }

    /**
     * Get user logs by user name
     * @param $name
     * @return mixed
     */
    public function getUserLogsByUsername($name){
        return $this->em->getRepository("CoreBundle:log")->findByUsername($name);
   }
    
    
    
}
