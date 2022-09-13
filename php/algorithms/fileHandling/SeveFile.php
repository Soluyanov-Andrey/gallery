<?php

class SaveFile extends MessageSystem
{

    const IMAGES_YES = 'Скопировали изображения для анализа.';
    const IMAGES_NO = 'При копировании изображения что то пошло не так.';


    public static function seve_fales_imagis()
    {

            if (!copy($url, URL_TEMP . NAME_FILES . $path_parts['extension'])) {
                echo ("error");

            }
           
        
    }

   

}
