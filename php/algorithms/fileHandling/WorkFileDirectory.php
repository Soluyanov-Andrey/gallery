<?php

class WorkFileDirectory
{

    
    // URL_FOLDER_TMP . NAME_TEMPORARY_FILE .
  

    public static function folderDistribution(){


    }
    
    public static function createNewFileName($imgHash, $color, $extension)
    {

        
        $md5 = md5($imgHash);

        $newFilename = URL_FOLDER_INITIAL . $md5 . '.jpg';

        WorkFileDirectory :: moveAndRenameInitial($extension,$md5);
        WorkFileDirectory :: moveColorFolderAndRename($extension,$md5,$color);
        // if (rename($urlSmollImg, $newFilename)) {
        //     return MessageSystem::sendMessage(false, self::URL_IMAGES_NO, '');
        // }
        // return MessageSystem::sendMessage(false, self::URL_IMAGES_NO, '');

    }

    public static function moveAndRenameInitial($extension , $md5)
    {
        $fileNeme =URL_FOLDER_TMP.NAME_TEMPORARY_FILE.$extension;
        $newFileName = URL_FOLDER_INITIAL.$md5.'.'.$extension;
        
      
     
        //rename("myfile.txt", "newfolder/newfile.txt");
         rename($fileNeme,  $newFileName);

    }

    public static function moveColorFolderAndRename($extension,$md5,$color)
    {
        $fileNeme = URL_FOLDER_TMP.FILE_NAME_WATERMARK;
        $newFileName = URL_FOLDER_IMAGES.$color.'/'.$md5.'.'.$extension;

       

        //rename("myfile.txt", "newfolder/newfile.txt");
        rename($fileNeme, $folder . '/' . $newFileName);

    }

}
