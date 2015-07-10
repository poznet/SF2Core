<?php

namespace Poznet\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="sf2core_Users")
 * @ORM\Entity()
 */
class user implements AdvancedUserInterface, \Serializable
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
    private $Username;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=125)
     */
    private $salt;     

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email(
     *     message = "'{{ value }}' nie jest prawidłowym adresem e-mail.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="boolean" )
     */
    private $active=true;

   
    /**
     * @var string
     *
     * @ORM\Column(name="rights", type="text" ,nullable=true)
     */
    private $rights;

    


     

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
     * Set nazwa
     *
     * @param string $nazwa
     * @return User
     */
    public function setUsername($nazwa)
    {
        $this->Username = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    
      public function getRoles()
    {
        if($this->Username=='admin'){
            return array('ROLE_SUPER_ADMIN');
        }else{
            return array('ROLE_ADMIN');

        }
    }
    
    public function eraseCredentials()
    {
    }
    
       public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
    
    
    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }

    public function __toString(){

        return $this->Username;
    }


     

    /**
     * Set rights
     *
     * @param string $rights
     * @return User
     */
    public function setRights(Array $rights)
    {
        $this->rights = serialize(array_unique($rights));
         
        return $this;
    }

    /**
     * Get rights
     *
     * @return string 
     */
    public function getRights()
    {   

        return unserialize($this->rights);
    }

    public function clearRights()
    {
        $this->rights = serialize(array());
        
        return $this;
    }

     


    public function isAccountNonExpired()
    {
        return $this->active;
    }

    public function isAccountNonLocked()
    {
        return $this->active;
    }

    public function isCredentialsNonExpired()
    {
       return $this->active;
    }

    public function isEnabled()
    {
        return $this->active;
    }
 
}
