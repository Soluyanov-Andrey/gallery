<?php

/**
 * В классе реализованы функции для очистки папок с изображениями.
 * функция очистки кэш файла
 * функция очистки лог файла
 */

class DeleteImg
{
    public static function delete()
    {

        DeleteImg::deleteRecordsCash();
        DeleteImg::deleteLogFiles();
        DeleteImg::delImg();
    }

    public static function deleteRecordsCash()
    {

        $fp = fopen(URL_CASH_FILE, 'w');
        fclose($fp);
    }

    public static function deleteLogFiles()
    {

        $fp = fopen(URL_FILE_LOG, 'w');
        fclose($fp);
    }

    //удалеяет все файлы скопированных изображений
    public static function delImg()
    {

        $folders = array("black", "blue", "brown", "darkBlue",
            "fileInitial", "gray", "green", "orange", "red",
            "rose", "turquoise", "violet", "white", "yellow");

        foreach ($folders as $elem) {

            $dir = URL_FOLDER_IMAGES . $elem;
            
            if ($handle = opendir($dir)) {

                while (false !== ($file = readdir($handle))) {
                    $path_parts = pathinfo($file);
                    if ($file != "." && $file != ".." && $file != ".gitkeep") {
                        unlink($dir . '/' . $file);
                    }
                }

            }

        }

    }
}
