<?php

namespace Poznet\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\KernelInterface;
use Poznet\CoreBundle\Classes\Media;


class CoreBundle extends Bundle
{
    
    protected $kernel;
    
    public function __construct(KernelInterface $kernel=NULL) {
        if($kernel)
            $this->kernel = $kernel;
        
        $media=new Media;
 
     //   $media->checkDir();
 
        
 
    }
    
}
