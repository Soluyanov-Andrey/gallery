<?php
/**
 * Парсер страниц, выбирает <img> и <scr> c прямого пути типа "https//ru.freepik.com/popular-photos"
 * вернет массив $urlImages c выписанными URL картинок.Также парсер выполнит некоторые карректировки
 * и попробует исправить url если url не рабочий
 *
 * @param string $saitUrl адресс сайта
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
    public static function validUrl(string $saitUrl)
    {

        if (@file_get_contents($saitUrl)) {
            $saveMessage = Parser::searchImg($saitUrl);
            return $saveMessage;

        } else {
            $resultArray = Parser::correctiveStep_1($saitUrl);
            if ($resultArray['result']) {return Parser::searchImg($resultArray['data']);};

            $resultArray = Parser::correctiveStep_2($saitUrl);
            if ($resultArray['result']) {return Parser::searchImg($resultArray['data']);};

            $resultArray = Parser::correctiveStep_3($saitUrl);
            if ($resultArray['result']) {return Parser::searchImg($resultArray['data']);};

        }
        //eturn MessageSystem::sendMessage(false, self::URL_NOT_WORKING,'');
    }

    //Ищем в html теги img рисунки
    private function searchImg(string $saitUrl): array
    {

        $urlImages = array();

        $data = @file_get_contents($saitUrl);

        //находит все img src создавая при это не нужные данные
        preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);

        unset($data);
        //чистим $media от ненужных данных
        $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);

        //проверяем по расширению файла картинка ли найдена и формируем массив $urlImages с выбокрой
        foreach ($data as $url) {
            $info = pathinfo($url);

            if (isset($info['extension'])) {
                if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')
                    /*$info['extension'] == 'bmp'};*/
                    //если php 7> можно добавить
                ) {
                    array_push($urlImages, $url);
                }
            }
        };

        if (empty($urlImages)) {
            return MessageSystem::sendMessage(false, self::NO_DRAWINGS, '');

        }
        $vr = count($urlImages) + 1;

        return MessageSystem::sendMessage(true, self::YES_DRAWINGS . $vr . "-шт", $urlImages);
    }
/**
 *      corrective_step
 *
 */
    // Если пользователь указал адрес без http:
    protected function correctiveStep_1(string $saitUrl)
    {

        if (strpos($saitUrl, 'http') === false) {
            $saitUrl = "http://" . $saitUrl;
        }

        if (@file_get_contents($saitUrl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_1_TRUE, $saitUrl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_1_FALSE, '');

    }
    // Если пользователь указал адрес без www:
    protected function correctiveStep_2(string $saitUrl)
    {

        if (strpos($saitUrl, 'www') === false) {
            $saitUrl = "http://www." . $saitUrl;
        }

        if (@file_get_contents($saitUrl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_2_TRUE, $saitUrl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_2_FALSE, '');

    }
    // Если пользователь указал адрес без https://:
    protected function correctiveStep_3(string $saitUrl)
    {
        if (strpos($saitUrl, 'https') === false) {
            $saitUrl = "https://" . $saitUrl;
        }

        if (@file_get_contents($saitUrl)) {
            return MessageSystem::sendMessage(true, self::COR_STEP_3_TRUE, $saitUrl);
        }

        return MessageSystem::sendMessage(false, self::COR_STEP_3_FALSE, '');

    }

}
