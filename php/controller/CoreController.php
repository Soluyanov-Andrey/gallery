<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
        $saitUrl = 'https://kanzoboz.ru/article/galereya_realistichnyih_risunkov_sharikovoy_ruchkoy_jivotnyih_ot_tima_djeffsa/';
         //$saitUrl = 'https://zastavok.net/animals/59873-sova_el.html';
        //$saitUrl = 'https://www.lifeofpix.com/gallery/city/';
      
        $higth = 150;
        $width =400;
        $result = Parser::validUrl($saitUrl);
        $array_url = array();


        $bmw = new CallChainController();
       


        foreach ($result['data'] as &$value) {

            $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
                 ->usageSaveFile()
                 ->usageImageResize()
                 ->usageReadSaveHashFile()
                 ->usagePredominantColor()
                 ->usageWatermark()
                 ->usageWorkFileDirectory()
                 ->usageReadSaveHashFile();
        }

    // $value = 'https://zastavok.net/uploads/avatars/foto_315.gif';
    // $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
    // ->usageSaveFile()
    // ->usageImageResize()
    // ->usageReadSaveHashFile()
    // ->usagePredominantColor()
    // ->usageWatermark()
    // ->usageWorkFileDirectory();
    
    }
    



}
