<?php
namespace Poznet\CoreBundle\Classes;

 

class Password  {
	private $znaki = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	private $haslo;
 

	public function __construct(){
		 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0,55);
            $pass[$i] = $this->znaki[$n];
        }
        $haslo=implode($pass,'');
        $this->haslo=$haslo.'';
        return $haslo.'';
}
	public function __toString(){

		return $this->haslo.'';
	}

 


}