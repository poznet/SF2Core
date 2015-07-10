<?php

namespace Poznet\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use VectorFace\Whip\Whip;
 

/**
 * User
 *
 * @ORM\Table(name="sf2core_Loger")
 * @ORM\Entity()
 */
class log 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userid;

     /**
     * @var string
     *
     * @ORM\Column(name="itemtype", type="string", length=255)
     */
    private $itemtype;
    
    /**
     * @var string
     *
     * @ORM\Column(name="item_id", type="integer")
     */
    private $itemid;
    
    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255,nullable=true)
     */
    private $action;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descrition", type="string", length=255,nullable=true)
     */
    private $description;
    
     /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255,nullable=true)
     */
    private $ip;
    

    public function __construct() {
        $this->setTime(new \DateTime());
          $whip = new Whip(   Whip::PROXY_HEADERS  );
          if (false=== $whip->getValidIpAddress()){
            $whip = new Whip(   Whip::REMOTE_ADDR  );
            $this->ip=$whip->getValidIpAddress();     
          }else{
            $this->ip=$whip->getValidIpAddress();    
          }
    }


        /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return log
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return log
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set itemtype
     *
     * @param string $itemtype
     *
     * @return log
     */
    public function setItemtype($itemtype)
    {
        $this->itemtype = $itemtype;

        return $this;
    }

    /**
     * Get itemtype
     *
     * @return string
     */
    public function getItemtype()
    {
        return $this->itemtype;
    }

    /**
     * Set itemid
     *
     * @param integer $itemid
     *
     * @return log
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;

        return $this;
    }

    /**
     * Get itemid
     *
     * @return integer
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return log
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return log
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return log
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return log
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}
