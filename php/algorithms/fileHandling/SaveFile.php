<?php



class SaveFile 
{

    const URL_IMAGES_YES = 'Скопировали изображения для анализа.';
    const URL_IMAGES_NO =  'При копировании изображения что то пошло не так.';


    public static function seveFalesImagis($url)
    {
            
            $pathParts = pathinfo($url);

            if (!copy($url, URL_FOLDER_INITIAL . NAME_TEMPORARY_FILE . $pathParts['extension'])) {
                return MessageSystem::sendMessage(false, self::URL_IMAGES_NO, '');
            } 
            return MessageSystem::sendMessage(
               true, self::URL_IMAGES_YES, $pathParts['extension']);
        
    }

    

}
