<?php
  class SaveFile extends ParentAlgorithms
        {
            public static function seve_fales($url){
                global $gl_name_img;
                $path_parts = pathinfo($url);


                //echo $path_parts['basename'], "\n";
                //echo $path_parts['extension'], "\n";

                if (!@copy($url, DIR_TEMP.NAME_IMG.$path_parts['extension'])) {
                   
                }
                $gl_name_img=DIR_TEMP.NAME_IMG.$path_parts['extension'];

            }

        }