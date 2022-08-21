<?php
/**
 * Парсер страниц, простой выбирает <img> и <scr> c прямого пути типа "https//ru.freepik.com/popular-photos"
 * вернет массив $images c выписанными URL картинок.Также парсер выполнит некоторые карректировки 
 * и попробует исправить url если url не рабочий
 *
 * @param string $url_gl адресс сайта
 * @return array список изображений.
 */
class Parser extends ParentAlgorithms
{
    const NO_DRAWINGS = 'Рисунков не найденно';
    const YES_DRAWINGS = 'Рисунки найдены';
    const URL_NOT_WORKING = 'Url не рабочий';
    

    // Проверяем загрузится ли страница или нет. Если нет то возможно в адрессе ошибка.
    public static function valid_Url(string $url_gl)
    {
        
        if (@file_get_contents($url_gl))
        {
            
            return Parser::Search_Img($url_gl);
            
        }
       
        return Parser::corrective_step_1($url_gl);
    }

    //Ищем в html теги img рисунки
    protected  function Search_Img(string $url_gl):array
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
                return ParentAlgorithms::returns(false, self::NO_DRAWINGS,'');

            }
            $vr = count($images) + 1;

            return ParentAlgorithms::returns(true, self::YES_DRAWINGS . $vr . "-шт", $images);
    }
/**
 *      corrective_test
 * 
 */
       // Если пользователь указал адрес без http:
       protected function corrective_step_1(string $url_gl)
       {
   
           if (strpos($url_gl, 'http') === false) $url_gl = "http://" . $url_gl;
   
           if (@file_get_contents($url_gl)) return Parser::Search_Img($url_gl);
   
           return Parser::corrective_step_2($url_gl);
   
       }
       // Если пользователь указал адрес без www:
       protected function corrective_step_2(string $url_gl)
       {
   
           if (strpos($url_gl, 'www') === false) $url_gl = "www://" . $url_gl;
   
           if (@file_get_contents($url_gl)) return Parser::Search_Img($url_gl);
   
           return Parser::corrective_step_3($url_gl);
   
       }
       // Если пользователь указал адрес без https://:
       protected function corrective_step_3(string $url_gl)
       {
           if (strpos($url_gl, 'https') === false) $url_gl = "https://" . $url_gl;
   
           if (@file_get_contents($url_gl)) return Parser::Search_Img($url_gl);
   
           
           echo ("url не рабочий.");
           return false;
   
       }



}






