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
    

    public function usageGetImage($value, $saitUrl, $width, $higth){

        $this->$saveMessage =  GetImages::getImagesUrl($value, $saitUrl, $width, $higth);

        return $this;
    }
    
    public function usageSeveFile(){

        $message = $this->$saveMessage;

        if($message['result']){

                $pathParts = pathinfo($message['data']);

                $this->$saveMessage = SaveFile::seveFalesImagis($message['data'], $pathParts['extension']); 

                $message = $this->$saveMessage;
                $this->$savePathParts = $pathParts['extension'];

        }
        return $this;
    }

    public function usageReadSaveHashFile(){
        
        $Message = $this->$saveMessage;
        
        if($Message['result']){

            $this->$saveMessage = ReadSaveHashFile::seveFalesImagis(); 
    
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