<?php

class SaveFile
{

    const SAVE_FILE_IMAGES_YES = 'Скопировали изображения для анализа.';
    const SAVE_FILE_IMAGES_NO = 'При копировании изображения. Что-то пошло ни так.';
    const RENAMING_SMOL_IMG_YES = 'При переименовании изображения. Что-то пошло ни так.';
    const RENAMING_SMOL_IMG_NO = 'Изображения SmollImg переименовано.';

    //Сохраняет файлы из сети. В фаил с именем test. * {исходное расширение}
    public static function seveFalesImagis($url)
    {

        $pathParts = pathinfo($url);

        
        if (!copy($url, URL_FOLDER_TMP . NAME_TEMPORARY_FILE . $pathParts['extension'])) {
            return MessageSystem::sendMessage(false, self::SAVE_FILE_IMAGES_NO, '');
        }
        return MessageSystem::sendMessage(true, self::SAVE_FILE_IMAGES_YES, $pathParts['extension']);

    }

}
