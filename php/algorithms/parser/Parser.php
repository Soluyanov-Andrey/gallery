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

    // Url_Yes_No проверяет существует ли url в интернете
    private static function Url_Yes_No($url_gl)
    {

        $Headers = @get_headers($url_gl);

        if (strpos($Headers[0], '200'))
        {
            //страница есть
            return true;
        }
        else
        {
            //страницы нет
            return false;
        }
    }

    //Ищет URL И Пытается исправить url если нет http или www
    public static function valid_Url($url_gl)
    {

        $error = false;
        //проверяем существует ли страница
        if (Parser::Url_Yes_No($url_gl) == false)
        {
            $error = true;
        };

        //Если при проверки существования страницы выдало страницы нет, пробуем исправить
        if (Parser::Url_Yes_No($url_gl) == false)
        {
            $url_gl_memo = $url_gl;

            //Проверяем существует ли в url параметр http если нет то добавляем
            if (strpos($url_gl, 'http') === false)
            {
                $url_gl = "http://" . $url_gl;

                if (Parser::Url_Yes_No($url_gl) == false)
                {
                    //Пробуем вызвать после изменения адреса
                    $error_http = true;
                    $url_gl = $url_gl_memo;
                }

            }

            if (strpos($url_gl, 'https') === false)
            {
                $url_gl = "https://" . $url_gl;

                if (Parser::Url_Yes_No($url_gl) == false)
                {
                    //Пробуем вызвать после изменения адреса
                    $error_https = true;
                    $url_gl = $url_gl_memo;
                }

            }

            //Проверяем существует ли в url параметр www если нет то добавляем
            if (strpos($url_gl, 'www') === false && $error == true)
            {
                
                $gl_url = "www://" . $url_gl;
                if (Parser::Url_Yes_No($url_gl) == false)
                {
                    $error_www = true;
                }
            }

        }
        //проверяем удалось ли что нибудь исправить
        if ($error_http == true and $error_https == true and $error_www == true)
        {
            //ошибку в url выявить не удалось сообщаем об ошибки
            parent::massages("Url не рабочий");
            
            
        }
        else
        {
            //идем дальше
            return Parser::Search_Img($url_gl);
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
        foreach ($data as $url)
        {
            $info = pathinfo($url);

            if (isset($info['extension']))
            {
                if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')
                /*$info['extension'] == 'bmp'};*/
                //если php 7> можно добавить
                )
                {
                    array_push($images, $url);
                }
            }
        };

        if (empty($images))
        {

            parent::massages("Рисунков не найденно");
            // Massages::create_msg("Рисунков не найденно","");
            // $gl_massages["state"]="error";
            
        }
        else
        {
            $vr = count($images) + 1;
            parent::massages("Рисунки найдены " . $vr . "-шт", "");
            // Massages::create_msg("Рисунки найдены ".$vr."-шт","");
            
        }

        return $images;
    }
}





