<?php
namespace Poznet\CoreBundle\Classes;


class podpisy {
	private $dane;
	private $podpisy;
	private $linki;
        private $kernel;
	
    public function __construct($d,$path, $kernel=null){
    	//pliki z katalogu 
        $this->kernel=$kernel;
 
 

    	 $this->dane=$d;
		 $ile = count($this->dane);
         for ($i = 0; $i < $ile; $i++) {
             $path = $this->dane[$i]->getPath();
             
            if($kernel){
             // jesli przekazany kernel  to sprawdza jeszcze czy plik istnieje
                if(file_exists($this->kernel->getRootDir() . '/../web/'.$path)){
                    $this->linki[$path]=$this->dane[$i]->getLink();
                    $this->podpisy[$path]=$this->dane[$i]->getName();
                }

            }else{
                //jesli nie ma kerneta to domyslnie przyjmuje ze wszystko jest
               $this->linki[$path]=$this->dane[$i]->getLink();
               $this->podpisy[$path]=$this->dane[$i]->getName();

            }

             
              
         }


    }

    public function getLinki(){
    	return $this->linki;
    }
    public function getPodpisy(){
    	return $this->podpisy;
    }
	
}
