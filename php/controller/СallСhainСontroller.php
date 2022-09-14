<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */


class СallСhainСontroller
{
    //
    public $saveMessage;
    public $savePathParts;
    function __construct() {
       
    }
    

    public function getImage($value, $gl_url, $width, $higth){

        $this->$saveMessage =  GetImages::get_images_url($value, $gl_url, $width, $higth);

        return $this;
    }
    
    public function SeveFile(){

        $message = $this->$saveMessage;

        if($message['result']){

                $pathParts = pathinfo($message['data']);

                $this->$saveMessage = SaveFile::seve_fales_imagis($message['data'], $pathParts['extension']); 

                $message = $this->$saveMessage;
                $this->$savePathParts = $pathParts['extension'];

        }
        return $this;
    }

    public function ReadSaveHashFile(){
        
        $Message = $this->$saveMessage;
        
        if($Message['result']){

            $this->$saveMessage = ReadSaveHashFile::seve_fales_imagis(); 
    
        }

        return $this;
    }
    public function ImageResize($a){
        echo("4");
        return $this;
    }
    public function Predominant_Color($a){
        echo("5");
        return $this;
    }
    public static function Watermark($a){
        echo("6");
        return $this;
    }
    public static function Distributions_Directory($a){
        echo("7");
        return $this;
    }

}