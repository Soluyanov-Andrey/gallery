<?php
/**
 * Парсер страниц, выбирает <img> и <scr> c прямого пути типа "https//ru.freepik.com/popular-photos"
 * вернет массив $images c выписанными URL картинок.Также парсер выполнит некоторые карректировки
 * и попробует исправить url если url не рабочий
 *
 * @param string $url_gl адресс сайта
 * @return array список изображений.
 */
class Parser 
{
    const NO_DRAWINGS = 'Рисунков не найденно';
    const YES_DRAWINGS = 'Рисунки найдены';
    const URL_NOT_WORKING = 'Url не рабочий';
    const COR_STEP_1_FALSE = 'correctiveStep_1 не смог исправить URL';
    const COR_STEP_1_TRUE = 'correctiveStep_1 смог исправить URL';
    const COR_STEP_2_FALSE = 'correctiveStep_2 не смог исправить URL';
    const COR_STEP_2_TRUE = 'correctiveStep_2 смог исправить URL';
    const COR_STEP_3_FALSE = 'correctiveStep_3 не смог исправить URL';
    const COR_STEP_3_TRUE = 'correctiveStep_3 смог исправить URL';

    // Проверяем загрузится ли страница или нет. Если нет то возможно в адрессе ошибка.
    public static function validUrl(string $url_gl)
    {

        if (@file_get_contents($url_gl)) {
            $images = Parser::searchImg($url_gl);
            return $images;

        } else {
            $result_array = Parser::correctiveStep_1($url_gl);
            if ($result_array['result']) {return Parser::searchImg($result_array['data']);};

            $result_array = Parser::correctiveStep_2($url_gl);
            if ($result_array['result']) {return Parser::searchImg($result_array['data']);};

            $result_array = Parser::correctiveStep_3($url_gl);
            if ($result_array['result']) {return Parser::searchImg($result_array['data']);};

        }
        //eturn MessageSystem::sendMessage(false, self::URL_NOT_WORKING,'');
    }

    //Ищем в html теги img рисунки
    private function searchImg(string $url_gl): array
    {

        $images = array();

        $data = @file_get_contents($url_gl);

        //находит все img src создавая при это не нужные данные
        preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);

        unset($data);
        //чистим $media от ненужных данных
        $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);

        //проверяем по расширению файла картинка ли найдена и формируем массив $images с выбокрой
        foreach ($data as $url) {
            $info = pathinfo($url);

            if (isset($info['extension'])) {
                if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')
                    /*$info['extension'] == 'bmp'};*/
                    //если php 7> можно добавить
                ) {
                    array_push($images, $url);
                }
            }
        };

        if (empty($images)) {
            return MessageSystem::sendMessage(false, self::NO_DRAWINGS, '');

        }
        $vr = count($images) + 1;

        return MessageSystem::sendMessage(true, self::YES_DRAWINGS . $vr . "-шт", $images);
    }
/**
 *      corrective_step
 *
 */
    // Если пользователь указал адрес без http:
    protected function correctiveStep_1(string $url_gl)
    {

        if (strpos($url_gl, 'http') === false) {
            $url_gl = "http://" . $url_gl;
        }

        if (@file_get_contents($url_gl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_1_TRUE, $url_gl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_1_FALSE, '');

    }
    // Если пользователь указал адрес без www:
    protected function correctiveStep_2(string $url_gl)
    {

        if (strpos($url_gl, 'www') === false) {
            $url_gl = "http://www." . $url_gl;
        }

        if (@file_get_contents($url_gl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_2_TRUE, $url_gl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_2_FALSE, '');

    }
    // Если пользователь указал адрес без https://:
    protected function correctiveStep_3(string $url_gl)
    {
        if (strpos($url_gl, 'https') === false) {
            $url_gl = "https://" . $url_gl;
        }

        if (@file_get_contents($url_gl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_3_TRUE, $url_gl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_3_FALSE, '');

    }

}
