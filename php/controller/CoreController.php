<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
         $gl_url = 'https://zastavok.net/animals/59873-sova_el.html';
        // $gl_url = 'https://www.lifeofpix.com/gallery/city/';
       
        $width = 350;
        $higth = 450;
        // $result = Try_url_img::try_url($gl_url ,$width, $higth);
        $result = Parser::valid_Url( $gl_url);
var_dump($result);

        foreach ($result['data'] as &$value) {
                    $img_yes = GetImages::get_images_url($value, $gl_url, $width, $higth);
    
                    // if ($img_yes['result'] == true) {
                    //     array_push($array_url, $img_yes['data']);
                    // }
                    
                }


        // $img_yes = GetImages::get_images_url($value, $url_gl, $width, $higth);
        // var_dump($result);
        // $this->assertIsArray($result);
        //  SaveFile::seve_fales_imagis($result['data']);
    }

    private static function perform() {
     
    }

}