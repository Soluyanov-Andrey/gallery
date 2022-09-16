<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
         $saitUrl = 'https://zastavok.net/animals/59873-sova_el.html';
        //$saitUrl = 'https://www.lifeofpix.com/gallery/city/';
      
        $higth = 450;
        
        $result = Parser::validUrl($saitUrl);
        $array_url = array();


        $bmw = new СallСhainСontroller();
       


        foreach ($result['data'] as &$value) {

            $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
                 ->usageSeveFile()
                 ->usageImageResize();
                //  ->usagePredominantColor();
              
        }
    }

}