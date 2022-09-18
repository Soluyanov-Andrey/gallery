<?php

class WorkFileDirectory
{

  

    public static function folderDistribution(){


    }
    
    public static function createNewFileName($imgHash, $url)
    {

        $md5 = md5($imgHash);

        $newFilename = URL_FOLDER_INITIAL . $md5 . '.jpg';

        if (rename($urlSmollImg, $newFilename)) {
            return MessageSystem::sendMessage(false, self::URL_IMAGES_NO, '');
        }
        return MessageSystem::sendMessage(false, self::URL_IMAGES_NO, '');

    }

    public static function moveAndRename($fileNeme, $newFileName, $folder)
    {
        //rename("myfile.txt", "newfolder/newfile.txt");
        rename($fileNeme, $folder . '/' . $newFileName);

    }

}
