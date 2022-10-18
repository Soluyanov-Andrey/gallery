<?php

/**
 *водяной знак
 */
//------------------------Класс испольует следующие константы
//define("FILE_NAME_WATERMARK","final.jpg");      // имя файла после добавления воденого знака
//define("DIR_TEMP", "../model/temp/");           // путь к папке где храним временные файлы
//define("TTF","../view/a_AlternaSw.ttf");        // Ссылка на шрифт)
//define("NAME_SMOLL_IMG","small_photo.jpg");     // имя файла после уменьшения рисунка до требуемых размеров

class WaterMark
{

    const WATERMARK = 'Блок, подписи цвета, на рисунке выполнен.';

    public static function to_draw($color_img)

    {

        static $faile_name = URL_FOLDER_TMP.FILE_NAME_WATERMARK; // Конечный фаил
        static $img = URL_FOLDER_TMP.NAME_SMOLL_IMG; // фаил который берем
        static $font =TTF; // Ссылка на шрифт
        static $font_size = 21; // Размер шрифта
        static $degree = 90; // Угол поворота текста в градусах
        static $height = 190; // Отступ сверху в пикселях
        static $width = 30; // Отступ слева в пикселях

        static $color_transfer = array("black" => "Черный",
                              "fiolet" => "Фиолетовый",
                              "darkBlue" => "Синий",
                              "blue" => "Голубой",
                              "green" => "Зеленый",
                              "yellow" => "Желтый",
                              "orange" => "Оранжевый",
                              "red" => "Красный",
                              "white" => "Белый",
                              "gray" => "Серый",
                              "turquoise" => "Берюзовый",
                              "rose" => "Розовый",
                              "brown" => "Коричневый");

        $text=$color_transfer[$color_img];

    $pic = Imagecreatefromjpeg($img);           // Функция создания изображения
    $color = ImageColorAllocate($pic, 0, 0, 0); // Функция выделения цвета для текста


    $color = imagecolorallocatealpha($pic, 0, 0, 0, 80);
    ImageTTFtext($pic, $font_size, $degree, $width + 2, $height + 2, $color, $font, $text);


    $color = imagecolorallocatealpha($pic, 255, 255, 255, 80);
    ImageTTFtext($pic, $font_size, $degree, $width, $height, $color, $font, $text);


    // Функция нанесения текста
    imagejpeg($pic, $faile_name); // Сохранение рисунка
    ImageDestroy($pic);           // Освобождение памяти и закрытие рисунка
    
    return MessageSystem::sendMessage(true, self::WATERMARK, '');
    }

    
}
//Watermark::to_draw("gray");