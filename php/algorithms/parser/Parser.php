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

    //Ищет URL И Пытается исправить url если нет http или www
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
            $this->corrective_test_2($url_gl);
        }

    }

    private function corrective_test_2($url_gl)
    {

    }

    private function corrective_test_3($url_gl)
    {

    }
}




