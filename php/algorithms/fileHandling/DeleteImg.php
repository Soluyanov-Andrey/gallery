<?php

/**
 * В классе реализованы функции для удаления изображени и файла с кэшами
 */

//define("CASH_FILE_NAME","cash.txt");            // имя файла хранещего кэши изображений
//define("DIR_SYSTEM", "../model/system/");       // путь где хранятся cash фаил изображений ,и сообщения

class DeleteImg
{
    public static function delete()
    {

        DeleteImg::delete_records();
        DeleteImg::del_img();
    }

    public static function delete_records()
    {

        $fp = fopen(URL_CASH_FILE, 'w');
        fclose($fp);
    }

    //удалеяет все файлы скопированных изображений
    public static function del_img()
    {

        $folders = array("black", "blue", "brown", "dark_blue",
            "file_initial", "gray", "green", "orange", "red",
            "rose", "turquoise", "violet", "white", "yellow");

        foreach ($folders as $elem) {

            $dir = URL_FOLDER_IMAGES . $elem;
            echo($dir);
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
