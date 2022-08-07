<?php
/**
 * Парсер страниц, простой выбирает <img> и <scr> c прямого пути типа "https//ru.freepik.com/popular-photos"
 * вернет массив $images c выписанными URL картинок.
 *
 * @param string $url_gl адресс сайта
 * @return array список изображений.
 */
class Parser extends ParentAlgorithms
{

    // Проверяем загрузится ли страница или нет. Если нет то возможно в адрессе ошибка.
    public static function valid_Url($url_gl)
    {
        if (@file_get_contents($url_gl))
        {
            $images = Parser::Search_Img($url_gl);
            return $images;
        }
        else
        {
            $url_gl = Parser::corrective_test_1($url_gl);
        }
      return $url_gl;
    }


    // Если пользователь указал адрес без http:
    private function corrective_test_1($url_gl)
    {
        
        if (strpos($url_gl, 'http') === false) {
            $url_gl="http://".$url_gl;
        }


        if (@file_get_contents($url_gl))
        {
            
            return $url_gl;
        }
        else
        {
            Parser::corrective_test_2($url_gl);
        }

    }
    // Если пользователь указал адрес без www:
    private function corrective_test_2($url_gl)
    {
        if (strpos($url_gl, 'www') === false) {
            $url_gl="www://".$url_gl;
        }


        if (@file_get_contents($url_gl))
        {
            
            return $url_gl;
        }
        else
        {
            Parser::corrective_test_3($url_gl);
        }

    }
    // Если пользователь указал адрес без https://:
    private function corrective_test_3($url_gl)
    {
        if (strpos($url_gl, 'https') === false) {
            $url_gl="https://".$url_gl;
        }


        if (@file_get_contents($url_gl))
        {
            
            $images = Parser::Search_Img($url_gl);
            return $images;
        }
        else
        { 
            echo("url не рабочий.");
            return false;
        }

    }
     //Ищем в html теги img рисунки
     private static function Search_Img($url_gl)
     {
         
         global $gl_massages;
 
         $images = array();
 
         $data = file_get_contents($url_gl);
 
         //находит все img src создавая при это не нужные данные
         preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
 
         unset($data);
         //чистим $media от ненужных данных
         $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
 
         //проверяем по расширению файла картинка ли найдена и формируем массив $images с выбокрой
         foreach ($data as $url) {
             $info = pathinfo($url);
 
             if (isset($info['extension'])) {
                 if (($info['extension'] == 'jpg') ||
                     ($info['extension'] == 'jpeg') ||
                     ($info['extension'] == 'gif') ||
                     ($info['extension'] == 'png')
                     /*$info['extension'] == 'bmp'};*/ //если php 7> можно добавить
                 ) {
                     array_push($images, $url);
                 }
             }
         };
 
         if (empty($images)) {
             echo("Рисунков не найденно");
             
 
         }else{
             $vr=count($images)+1;
             echo("Рисунки найдены ".$vr."-шт");
            
 
         }
 
         return $images;
     }

}




