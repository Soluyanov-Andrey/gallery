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
        // $result = Try_url_img::try_url($saitUrl ,$width, $higth);
        $result = Parser::validUrl( $saitUrl);
        $array_url = array();


        $bmw = new СallСhainСontroller();
       

// $img_yes = GeturlImages::geturlImagesUrl($result['data'][0], $saitUrl, $width, $higth);
        foreach ($result['data'] as &$value) {

            $bmw ->usageGetImage($value, $saitUrl, $width, $higth)
                 ->usageSeveFile();
                //  ->ReadSaveHashFile();
                    // $img_yes = GeturlImages::geturlImagesUrl($value, $saitUrl, $width, $higth);
    
                    // if ($img_yes['result'] == true) {
                       
                    //     array_push($array_url, $img_yes['data']);
                             
                    // }
                }

        // var_dump($array_url);

        // $img_yes = GeturlImages::geturlImagesUrl($value, $saitUrl, $width, $higth);
        // var_dump($result);
        // $this->assertIsArray($result);
        //  SaveFile::seveFalesImagis($result['data']);
    }

    private static function perform() {
     
    }

}