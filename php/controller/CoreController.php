<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
        // $gl_url = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
        $gl_url = 'https://www.lifeofpix.com/gallery/city/';
       
        $width = 350;
        $higth = 450;
        $result = Try_url_img::try_url($gl_url ,$width, $higth);
    
        
        // $this->assertIsArray($result);
        //  SaveFile::seve_fales_imagis($result['data']);
    }

    private static function perform() {
     
    }

}