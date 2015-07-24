<?php

namespace Poznet\CoreBundle\Services;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MediaContainer
 *
 * @author michalg
 */
class MediaContainer {
    //put your code here
    private $rootdir;
    
    public function __construct($rootdit) {
        $this->rootdir=$rootdit;
    }
    
    public function getWeb(){
        return $this->rootdir.'/../web';
    }
}
