<?php

namespace Poznet\CoreBundle\Services;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

 
class Konfig {
    protected $kernel;
    private $configPath;
    private $yml;

 
    
    public function __construct(KernelInterface $kernel) {
        $this->kernel=$kernel;
        $this->configPath=  $this->kernel->getRootDir().'/config/parameters-konfig.yml';
        if(file_exists($this->configPath)){
            $this->load();        
        }
            
    }
    
    public function load(){
        $yaml = new Parser();
        $this->yml = $yaml->parse(file_get_contents($this->configPath));         
    }
 
   public function remove($v){
       unlink($this->yml[$v]);
   }
   
   public function set($n,$v){
        $this->yml[$n]['value']=$v;
        $this->yml[$n]['name']=$n;
    }
     
    public function get($v){
        if(array_key_exists($v,  $this->yml))
        return $this->yml[$v]['value'];
        return null;
    }
    
    public function getAll(){
        return $this->yml;
    }
    
    public function getDescription($v){
        if(array_key_exists($v,  $this->yml))
            return $this->yml[$v]['desc'];
        return null;
    }
    
    public function setDescription($n,$v){
        $this->yml[$n]['desc']=$v;
    }
    
    public function getType($v){
        if(array_key_exists($v,  $this->yml))
            return $this->yml[$v]['type'];
        return null;
    }
    
    public function setType($n,$v){
        $this->yml[$n]['type']=$v;
    }

    
  
    public function save(){
        $dumper = new Dumper(); 
        $yaml = $dumper->dump($this->yml);       
        file_put_contents($this->configPath, $yaml);
      
    }
    
}
