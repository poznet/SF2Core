<?php
namespace Poznet\CoreBundle\Classes;

use Gaufrette\Filesystem;
use Gaufrette\Adapter\Local as LocalAdapter;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\Session;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Media
 *
 * @author michalg
 */
class Media {
    protected $media;
    public static $mediapath='../web/media';
    private $podzial=array('/gry',
        );
 
    
    
   public function __construct() {
       $this->media=self::$mediapath;;
        
   }

   public function getMedia(){
        return $this->media;
    }
    
     public function getMediaPath(){
        return self::$mediapath;
    }
    
     public function getRelativeMediaPath(){
        $txt=$this->media;
        $pos=  strpos($txt, 'web/');
        return substr($txt, $pos+4);
    }
    
    public function checkMediaDir(){
         if(!file_exists($this->media)){
                mkdir($this->media, 0777);
       }
       return true;
    }
    public function checkDir(){
        $this->checkMediaDir();      
        $ile=count($this->podzial);
        for($i=0;$i<$ile;$i++){
            $kat=$this->media.$this->podzial[$i];
            if(!file_exists($kat)){
                mkdir($kat, 0777);
            
            }
            
        }
        
    }
    
    public function addFile($plik,$nazwa=null){
        if($nazwa){
            \copy($plik, $this->media.\strtolower($nazwa));
        }
        return true;             
        
    }
    public function removeFile($file){
        if($file!='')
        unlink($this->media.'/'.$file);
        
    }
    
    public function getFiles(){
        $adapter = new LocalAdapter($this->media);
        $filesystem = new Filesystem($adapter);
        return $filesystem->keys();
    }
    
     public function getFilesWithFullPath(){
        $adapter = new LocalAdapter($this->media);
        $filesystem = new Filesystem($adapter);
        $pliki=$filesystem->keys();
        $ile=count($pliki);
        for($i=0;$i<$ile;$i++){
            $pliki[$i]=$this->media.''.$pliki[$i];
        }
        return $pliki;
    }
    
    public function uploadFiles($pliki){
        $session = new Session();
        $error=null;
        $ile=count($pliki);
            for($i=0;$i<$ile;$i++){
                $image=$pliki[$i];
                if (($image instanceof UploadedFile) && ($image->getError()==0)){
                    if($image->getSize()<2000000){
                        $orginal=$image->getClientOriginalName();
                        $ext=strtolower(substr($orginal, -3));
                        $valid=array('jpg','png');
                        if(in_array($ext, $valid)){
                            $this->addFile($image, $orginal);

                        }else{
                            $error='Niepoprawne rozszerzenie pliku';
                   
                        }
                    }else{
                          $error='Zły rozmiar pliku'  ;
                   
                    }
                }else{
                     $error='Błąd  przenoszenia pliku';
                
                }
                
            }
            
            if($error==null){
                return '0';
            }else{
                $session->getFlashBag()->add('notice', $error);
                return $error;
            }
    }
    
    public function importfromURL($url,$size=null){
        $data=file_get_contents($url);
        $local=$this->media.basename($url);
        if($size!=null){
            if(file_exists($local)){
                $p=filesize($local);
                if(($p!=false)&&($p!=$size))
                    file_put_contents($local,$data);
            }else{
                file_put_contents($local,$data); 
            }
        }else{
        file_put_contents($local,$data);
        }
        
        
    }
}
