<?php

/**
 *  Основной класс с которого начинается загрузка.
 *  
 *
 */

class CoreController
{

    function __construct() {
//         $jpeg_file = "test.jpg";
//   // Создаем изображение из JPEG-файла 
//   $img = imagecreatefromjpeg($jpeg_file);
//   if ($img)
//   {
//     // Выводим изображение в браузер с качеством равным 50
//     header("Content-type: " .image_type_to_mime_type(IMAGETYPE_JPEG));
//     imagejpeg($img);
//   }  
      
       new  Parser();
       $b = new PredominantColor();
      // $kol=$b->Get_Img("algorithms/temp/1.jpg");
      // $kol=$b->Get_Img("http://localhost/images/2.jpg");

echo $kol;

    }

    private static function perform() {
     
    }

}