<?php
namespace Poznet\CoreBundle\Classes;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Poznet\CoreBundle\Classes\EntityManagerInterface;

class datownik{
	private $timestamp;
	private $miesiace=array('0','Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Czerwiec','Wrzesień','Październik','Listopad','Grudzień');
	private $dni=array('0','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela');
	private $swieto;
	private $imieniny;
	private $cytat;



    public function __construct(EntityManagerInterface $em,$timestamp=null){
    if(!$timestamp)
    	$timestamp=time();
    $this->timestamp=$timestamp;
    
    	$wpisy = $em->getRepository('PoznetAdminBundle:slownik')->findBy(array('miesiac'=>(int)date('m',$this->timestamp),'dzien'=>(int)date('d',$this->timestamp)));
    	$ile=count($wpisy);
    	for($i=0;$i<$ile;$i++){
    		if($wpisy[$i]->getSlownik()=='swieta') $this->swieto=$wpisy[$i]->getWartosc();
    		if($wpisy[$i]->getSlownik()=='biblia') $this->cytat=$wpisy[$i]->getWartosc();
    		if($wpisy[$i]->getSlownik()=='imieniny') $this->imieniny=$wpisy[$i]->getWartosc();
    	}

    }
    public function getFullData(){
    	return date('d',$this->timestamp).' '.$this->miesiace[(int)date('m',$this->timestamp)].' '.date('Y',$this->timestamp). ' ('.$this->dni[(int)date('N',$this->timestamp)].')' ;
    }

    public function getSwieto(){
    	return $this->swieto;
    }
	public function getCytat(){
    	return $this->cytat;
    }

  	public function getImieniny(){
	   return $this->imieniny;
	}
  
}

