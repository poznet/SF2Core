<?php

namespace Poznet\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Poznet\CoreBundle\Classes\Media;

class CoreBundle extends Bundle
{
    public function __construct() {
        $media=new Media;
     //   $media->checkDir();
    }
    
}
