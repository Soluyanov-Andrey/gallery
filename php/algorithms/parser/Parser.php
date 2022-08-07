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
            return $url_gl;
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
            
            return $url_gl;
        }
        else
        {
            echo("yt nj");
            return false;
        }

    }
}




