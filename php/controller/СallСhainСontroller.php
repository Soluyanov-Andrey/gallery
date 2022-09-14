<?php

/**
 *  В этом классе реализуем методы которые вызываются в цепочке.
 *  getImage()->SeveFile()-> ........
 *
 */


class СallСhainСontroller
{
    //
    public $saveMessage;
    public $savePathParts;
    function __construct() {
       
    }
    

    public function usageGetImage($value, $gl_url, $width, $higth){

        $this->$saveMessage =  GetImages::get_images_url($value, $gl_url, $width, $higth);

        return $this;
    }
    
    public function usageSeveFile(){

        $message = $this->$saveMessage;

        if($message['result']){

                $pathParts = pathinfo($message['data']);

                $this->$saveMessage = SaveFile::seve_fales_imagis($message['data'], $pathParts['extension']); 

                $message = $this->$saveMessage;
                $this->$savePathParts = $pathParts['extension'];

        }
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        $Message = $this->$saveMessage;
        
        if($Message['result']){

            $this->$saveMessage = ReadSaveHashFile::seve_fales_imagis(); 
    
        }

        return $this;
    }
    public function usageImageResize($a){
        echo("4");
        return $this;
    }
    public function usagePredominant_Color($a){
        echo("5");
        return $this;
    }
    public static function usageWatermark($a){
        echo("6");
        return $this;
    }
    public static function usageDistributionsDirectory($a){
        echo("7");
        return $this;
    }

}