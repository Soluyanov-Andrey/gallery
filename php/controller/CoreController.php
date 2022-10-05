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
      
        $higth = 150;
        $width =400;
        $result = Parser::validUrl($saitUrl);
        $array_url = array();


        $bmw = new СallСhainСontroller();
       


        // foreach ($result['data'] as &$value) {

        //     $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
        //          ->usageSaveFile()
        //          ->usageImageResize()
        //          ->usageReadSaveHashFile()
        //          ->usagePredominantColor()
        //          ->usageWatermark();
        //         //  ->usageReadSaveHashFile();
              
        // }

    $value = 'https://zastavok.net/ts/animals/165273601317.jpg';
    $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
    ->usageSaveFile()
    ->usageImageResize()
    ->usageReadSaveHashFile()
    ->usagePredominantColor()
    ->usageWatermark()
    ->usageWorkFileDirectory();
   //  ->usageReadSaveHashFile();
    
    }
    



}
