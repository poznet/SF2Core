<?php
namespace Poznet\CoreBundle\Classes;

 

class Password  {
	private $znaki = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	private $haslo;
              private $komunikat='';
     
              

      public function __construct(){
	 $this->generate();
                return $this->haslo;
       }
       
       public function generate(){           	 
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0,55);
                    $pass[$i] = $this->znaki[$n];
                }
                $haslo=implode($pass,'');
                $this->haslo=$haslo.'';
                return true;
       }
       
       public function __toString(){

		return $this->haslo.'';
       }

       public function checkPasswords($old,$new1,$new2){
           if(strlen($old)<1){
               $this->komunikat.='Musisz podać aktualne hasło<br/>';
               return false;
           }
           
           
           if($new1!=$new2){
               $this->komunikat.='Niepoprawne powtórzenie Hasła <br/>';
               return false;
           }
           
            if(strlen($new1)<6){
               $this->komunikat.='Hasło musi mieć minimum 6 znaków <br/>';
               return false;
           }
           
           return true;
           
           
       }
       
       public function getKomunikat(){
           return $this->komunikat;
       }


}
