<?php



class SaveFile 
{

    const IMAGES_YES = 'Скопировали изображения для анализа.';
    const IMAGES_NO = 'При копировании изображения что то пошло не так.';


    public static function seve_fales_imagis($url)
    {
           
            
            
            if (!copy($url, URL_FOLDER_HANDLING . NAME_TEMPORARY_FILE . $path_parts['extension'])) {
                return MessageSystem::sendMessage(false, self::IMAGES_NO, '');
            } 
           return MessageSystem::sendMessage(
               true, self::IMAGES_YES, URL_FOLDER_HANDLING . NAME_TEMPORARY_FILE . $path_parts['extension']);
        
    }

    

}
