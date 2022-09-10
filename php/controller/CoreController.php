<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
        $gl_url = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
        $width = 150;
        $higth = 150;
        $result = Try_url_img::try_url($gl_url ,$width, $higth);
    
        var_dump($result['data']);
        // $this->assertIsArray($result);
         SaveFile::seve_fales_imagis('https://zastavok.net/template/img/left-logo.png');
    }

    private static function perform() {
     
    }

}