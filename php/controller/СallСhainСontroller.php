<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */


class СallСhainСontroller
{
    public $cash;
    function __construct() {
       
    }
    

    public function getImage($value, $gl_url, $width, $higth){

        $this->$cash =  GetImages::get_images_url($value, $gl_url, $width, $higth);

        return $this;
    }
    public function ImgHash($a){
        var_dump($this->$cash);
        return $this;
    }
    public function SeveFile($a){
        echo("3");
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