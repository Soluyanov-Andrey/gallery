<?php
  define('URL_TEMP',DOCUMENT_ROOT.'algorithms/temp/test.');

  class SaveFile extends ParentAlgorithms
        {
            
            // static $Hash = new ImgHash();
            static $Hash;

            

            public static function seve_fales_imagis($url){
              
                 self::$Hash = 15;
                //echo $path_parts['basename'], "\n";
                //echo $path_parts['extension'], "\n";
                $path_parts = pathinfo($url);
              
                // if (!copy($url, URL_TEMP.$path_parts['extension'])) {
                //    echo("error");
                  
                // }
                echo(self::$Hash);
                // echo(self:: $Hash."-----------------");
               echo(md5(ImgHash::createHashFromFile(URL_TEMP.'png')));
             
            }

            /**
             * Проверяем есть ли в записанном вайле кэш, подобное изображение.
             * @param string $HashFromFile кэш изображения
             * @param array arrayHashRedFiles массив содержащий кэши изображений хранящийся в файле.
             */
            private  function comparisonHash( $HashFromFile,$arrayHashRedFiles){
              
                        // $hash1 = $this->createHashFromFile($file_name);
                        // $file_name = self::$file_damp_hash;

                        // $names = file($file_name);

                        // foreach ($arrayHashRedFiles as $name) {

                        //     $isNearEqual = $this->compareImageHashes($hash1, $name, 0.05);


                        //     $name  = preg_replace("/[\t\r\n]+/",'',$name);

                        //     if ($hash1 == $name) {

                        //         Massages::create_msg("Такое изображение уже есть","ok");
                        //         return true;
                        //     };
                        //     echo($isNearEqual);
                        //     if ($isNearEqual == true) {

                        //         Massages::create_msg("фаил различин менне чем на 5%","ok");
                        //         return true;
                        //     };

                        //     //$isEqual = ($hash1 == $name);

                        //     //echo "Хэши изображений равны?:" . ($isEqual ? "Да" : "Нет");
                        //     //echo "Хэши изображений равны с точностью до 5%?:" . ($isNearEqual ? "Да" : "Нет");


                        // }
                        // $this->seve($hash1);

            }

             //Записываем кэш изображения в файл. 
            private  function seve_falesHash($HashFromFile){
              
                // $fp = fopen($url, "a");
                // fwrite($fp, "\r\n" . $hash1);
                // fclose($fp);
                
            }
           

        }