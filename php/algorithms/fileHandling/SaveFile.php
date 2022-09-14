<?php



class SaveFile 
{

    const urlImages_YES = 'Скопировали изображения для анализа.';
    const urlImages_NO =  'При копировании изображения что то пошло не так.';


    public static function seveFalesImagis($url, $path_parts)
    {
            
            if (!copy($url, URL_FOLDER_HANDLING . NAME_TEMPORARY_FILE . $path_parts)) {
                return MessageSystem::sendMessage(false, self::urlImages_NO, '');
            } 
            return MessageSystem::sendMessage(
               true, self::urlImages_YES, "");
        
    }

    

}
