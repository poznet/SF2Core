<?php

namespace Poznet\CoreBundle\Classes;

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
        $this->configPath=  $this->kernel->get->getRootDir().'/config/parameters-konfig.yml';
        $this->load();
    }
    
    public function load(){
        $yaml = new Parser();
        $this->yml = $yaml->parse(file_get_contents($this->configPath));         
    }
    
    public function get($v){
        if(array_key_exists($v,  $this->yml))
        return $this->yml[$v];
        return null;
    }
    
    public function set($n,$v){
        $this->yml[$n]=$v;
    }

    public function save(){
        $dumper = new Dumper(); 
        $yaml = $dumper->dump($this->yml);
        $path ='../app/config/parameters-kolor.yml'; 
        file_put_contents($this->configPath, $yaml);
        $kernel = $this->container->get('kernel');
        $app = new Application($kernel);
        $input = new StringInput('cache:clear -e prod ');
        $output = new StreamOutput(fopen('php://temp', 'w'));
        $app->doRun($input, $output);
        $input = new StringInput('cache:clear  ');
        $output = new StreamOutput(fopen('php://temp', 'w'));
        $app->doRun($input, $output);
    }
    
}
