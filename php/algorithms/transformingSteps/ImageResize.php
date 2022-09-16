<?php
/**
 * Уменьшаем изображения
 * ImageResize::resize("../model/temp/hd-wallpaper-madagascar-cartoon-3840x2160.jpeg");
 * 
 */

//------------------------Класс испольует следующие константы

//define("NAME_SMOLL_IMG","small_photo.jpg");     // имя файла после уменьшения рисунка до требуемых размеров
//define("DIR_TEMP", "../model/temp/");           // путь к папке где храним временные файлы


class ImageResize 
{

    /**
     * Уменьшает изображения
     * @param $file_name Файл изображения
     */
    public static function resize($file_n){

        static $higth = 200;
        static $file_name = URL_FOLDER_INITIAL.NAME_SMOLL_IMG;


        //Определяем размер фотографии — ширину и высоту
        $size=GetImageSize ($file_n);

        //Создаём новое изображение из «старого»
        $src=ImageResize::format($file_n);

        $iw=$size[0];
        $ih=$size[1];
        $koe=$ih/$higth;
        $new_w=ceil ($iw/$koe);

        //Создаём пустое изображение шириной в n пикселей и высотой, которую мы вычислили в предыдущей строке.
        $dst=ImageCreateTrueColor ($new_w, $higth);
        ImageCopyResampled ($dst, $src, 0, 0, 0, 0, $new_w, $higth, $iw, $ih);

        //Сохраняем полученное изображение в формате JPG
        ImageJPEG ($dst, $file_name, 100);
        imagedestroy($src);


    }
    /**
     * Определяет с каким типом изображения нужно работать
     * @param $file_name Файл изображения
     * @return вернет блок с прочитанным изображением
     */
    private function format($file_name){
        $info = pathinfo($file_name);
        if (isset($info['extension'])) {


            if($info['extension'] == 'jpg'){return(imagecreatefromjpeg($file_name));};
            if($info['extension'] == 'jpeg'){return(imagecreatefromjpeg($file_name));};
            if($info['extension'] == 'gif'){return(imagecreatefromgif($file_name));};
            if($info['extension'] == 'png'){return(imagecreatefrompng($file_name));};
            /*if($info['extension'] == 'bmp'){$src=imagecreatefrombmp($file_name);};*/ //если php 7>

        }
    }

}



