<?php

/**
 * Находит придоминирующий цвет
 * в папке test color_table.php  формирует таблицу цветов
 *
 */

class PredominantColor
{
    //1) Диапазоны относящиеся к черному
    static $black = array(
        1,2,7,13,19,25,31,37,43,44,49,51,55,61,67,73,74,79,80,85,86,87,91,92,97,103,
        109,110,115,116,117,121,122,127,133,139,145,146,151,152,153,157,163,169,175,
        181,182,187,193,199,205,211,217,218,223,229,235,241,247,253,254,259, 265,271,
        277,283,289,290,301,295,296,307,313,319,325,326,331,332,337,343,349,355,361,
        362,367,368,373,374,379,385,391,397,398,403,404,409,410,415,421,427,433,434,
        439,440,445,446,451,457,463,469,470,475,476,481,482,487,493,499,505,506,511,
        512,517,523,529,535,541,542,547,548,553,559,565,571,577,578,583,584,589,595,
        601,607,613,614,619,620,625,631,637,643,649,650,655,657,661,667,673,679

    );
    //2) Диапазоны относящиеся к фиолетовому
    static $fiolet = array(
        442,478,479,483,484,485,486,488,489,490,491,492,494,495,496,497,498,502,503,
        504,514,515,519,520,524,525,526,527,528,530,531,532,533,534,536,537,538,539,
        540,549,550,551,555,556,557,558,560,561,562,563,564,566,567,568,572,573,591,
        597,603,609
    );

    //3) Диапазоны относящиеся к синему
    static $siniy = array(375,380,381,386,387,388,389,392,393,394,395,396,411,416,
        417,418,419,422,423,424,425,426,428,429,430,431,432,443,447,448,449,452,453,
        454,455,456,458,459,460,461,462,464,465,466,467,468,500,501,585);

    //4) Диапазоны относящиеся к голубому
    static $goluboi=array(371,372,376,377,382,383,407,408,412,413,414,420,444,450,378,
        384,390,353,354,370,406);

    //5) Диапазоны относящиеся к зеленому
    static $green=array(93,99,123,124,125,128,129,130,131,134,135,136,140,141,154,155,
        158,159,160,161,164,165,166,167,170,171,172,173,176,177,178,179,180,188,190,191,
        194,195,196,197,200,201,202,203,204,206,207,208,209,210,212,213,214,215,216,224,
        225,226,227,230,231,232,233,234,236,237,238,239,240,242,243,244,245,246,248,249,
        250,251,252,260,261,262,263,264,266,267,268,269,270,272,273,274,275,276,278,279,
        280,281,282,284,285,286,287,288,308,309,310,311,314,315,316,317,320,321,322,323);

    //6) Диапазоны относящиеся к желтому
    static $yellow = array(101,106,107,94,95,90,96,100,102,105,108,126,132,137,138,142,143,
        144,156,162,168,174,516);

    //7) Диапазоны относящиеся к оранжевому
    static $orange = array(54,59,60,64,65,66,70,71,72,101);

    //8) Диапазоны относящиеся к красному
    static $red = array(16,27,32,33,22,23,28,29,30,34,35,36,605,611,612,639,640,641,
        642,645,646,647,648,675,676,677,678,682,683,681,684);

    //9) Диапазоны относящиеся к белому
    static $white = array(5,41,6,42,48,77,84,113,114,120,149,150,185,186,192,198,221,222,
        228,257,258,293,294,300,329,330,365,366,401,402,437,438,473,474,480,509,510,545,
        546,581,582,617,618,653,654);

    //10) Диапазоны относящиеся к серому
    static $gray = array(3,4,38,39,40,75,76,81,111,112,147,148,183,184,219,220,255,256,291,
        292,327,328,363,364,369,399,400,405,435,436,441,471,472,507,508,543,544,579,580,615,
        616,651,652);

    //11) Диапазоны относящиеся к берюзовому
    static $berezovy = array(297,298,299,302,303,304,305,306,312,318,324,333,334,335,336,338,
        339,340,341,342,344,345,346,347,348,350,351,352,356,357,358,359,360);

    //12) Диапазоны относящиеся к коричневому
    static $brown = array(8,9,10,11,14,15,20,21,26,47,50,52,56,57,58,62,63,68,69,89,98,104,
        590,596,602,608,622,626,627,632,633,638,644,656,658,659,662,663,668,669,670,674,680);

    //13) Диапазоны относящиеся к розовому
    static $rose = array(12,17,18,24,522,552,569,570,574,575,576,587,586,588,592,593,594,
        598,599,600,604,606,610,623,624,628,629,630,634,635,636,660,664,665,666,671,672);

    //14) Неопределенные цвета
    static $undefined=array(45,46,81,82,88,118,189,477,513,621,518,521,53,119,82,83);

    public function Get_Img($url)
    {
        MessageSystem::sendMessage(false, "цвет", $url);
        var_dump($url);
        $arr_color=array();
        // Файл для определения основного цвета
        $im = ImageCreateFromJPEG($url);



        // Размеры изображения
        $width = ImageSX($im);
        $height = ImageSY($im);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = ImageColorAt($im, $x, $y);
                $avg_R = ($rgb >> 16) & 0xFF;
                $avg_G = ($rgb >> 8) & 0xFF;
                $avg_B = $rgb & 0xFF;


                $HSV = $this->RGB_HSV($avg_R, $avg_G, $avg_B);

                $number = $this->number_intable($HSV["hue"], $HSV["saturation"], $HSV["value"]);

                if (isset($arr_color[$number])) {
                    $arr_color[$number] = $arr_color[$number] + 1;
                } else {
                    $arr_color[$number] = 1;
                }
            }

        }
        //var_dump($arr_color);
        ImageDestroy($im);

        $vr=$this->counting_color($arr_color);


        return (string)$this->calculation_dominant_color($vr);

    }
    // Перевести RGB в HSV
    private function RGB_HSV($R,$G,$B){



        $R = ($R / 255);
        $G = ($G / 255);
        $B = ($B / 255);

        $maxRGB = max(array($R, $G, $B));
        $minRGB = min(array($R, $G, $B));
        $delta = $maxRGB - $minRGB;

        // Цветовой тон
        if ($delta != 0) {
            if ($maxRGB == $R) {
                $h = (($G - $B) / $delta);
            } elseif ($maxRGB == $G) {
                $h = 2 + ($B - $R) / $delta;
            } elseif ($maxRGB == $B) {
                $h = 4 + ($R - $G) / $delta;
            }
            $hue = round($h * 60);
            if ($hue < 0) {
                $hue += 360;
            }
        } else {
            $hue = 0;
        }

// Насыщенность
        if ($maxRGB != 0) {
            $saturation = round($delta / $maxRGB * 100);
        } else {
            $saturation = 0;
        }

// Яркость
        $value = round($maxRGB * 100);

        $return = array(
            "hue" => $hue,
            "saturation" => $saturation,
            "value"=>$value
        );

        return $return;
    }

    // определить номер цветовой комбинации в таблице цветов
    private function number_intable($h,$s,$v){
        $k=0;
        for ($h1 = 0; $h1 <= 360; $h1 = ($h1 + 20)) {

            for ($s1 = 0; $s1 <= 100; $s1 = ($s1 + 20)) {

                for ($v1 = 0; $v1 <= 100; $v1 = ($v1 + 20)) {
                    $k = $k + 1;
                    if (($h >= $h1 && $h <= $h1 + 20) && ($s >= $s1 && $s <= $s1 + 20) && ($v >= $v1 && $v <= $v1 + 20)) {

                        return $k;
                    }

                }

            }

        }
    }

    //подсчитываем блоки относящиеся к конкретному цвету
    private function counting_color($array){

        $data = array(
            "black" => 0,
            "fiolet" => 0,
            "siniy" => 0,
            "goluboi" => 0,
            "green" => 0,
            "yellow" => 0,
            "orange" => 0,
            "red" => 0,
            "white" => 0,
            "gray" => 0,
            "berezovy" => 0,
            "rose" => 0,
            "brown"=> 0
        );

        foreach (self::$black as $elem ) {
            if (isset($array[$elem])) {$data["black"]=$data["black"]+$array[$elem];};

        }

        foreach (self::$fiolet as $elem ) {
            if (isset($array[$elem])) {$data["fiolet"]=$data["fiolet"]+$array[$elem];};

        }

        foreach (self::$siniy as $elem ) {
            if (isset($array[$elem])) {$data["siniy"]=$data["siniy"]+$array[$elem];};

        }

        foreach (self::$goluboi as $elem ) {
            if (isset($array[$elem])) {$data["goluboi"]=$data["goluboi"]+$array[$elem];};

        }

        foreach (self::$green as $elem ) {

            if (isset($array[$elem])) {$data["green"]=$data["green"]+$array[$elem];};

        }

        foreach (self::$yellow as $elem ) {
            if (isset($array[$elem])) {$data["yellow"]=$data["yellow"]+$array[$elem];};

        }

        foreach (self::$orange as $elem ) {
            if (isset($array[$elem])) {$data["orange"]=$data["orange"]+$array[$elem];};

        }

        foreach (self::$red as $elem ) {

            if (isset($array[$elem])) {$data["red"]=$data["red"]+$array[$elem];};

        }

        foreach (self::$white as $elem ) {
            if (isset($array[$elem])) {$data["white"]=$data["white"]+$array[$elem];};

        }
//echo $b[$elem],"-";
        foreach (self::$gray as $elem ) {
            if (isset($array[$elem])) {$data["gray"]=$data["gray"]+$array[$elem];};

        }

        foreach (self::$berezovy as $elem ) {
            if (isset($array[$elem])) {$data["berezovy"]=$data["berezovy"]+$array[$elem];};

        }

        foreach (self::$rose as $elem ) {

            if (isset($array[$elem])) {$data["rose"]=$data["rose"]+$array[$elem];};

        }

        foreach (self::$brown as $elem ) {
            if (isset($array[$elem])) {$data["brown"]=$data["brown"]+$array[$elem];};

        }


        return $data;
    }

    //подсчитываем доминантный цвета
    private function calculation_dominant_color($data){

        $blok_bc = array(

            "black+" =>  $data["gray"]+$data["black"],
            "color+" =>  $data["fiolet"]+$data["siniy"]+$data["goluboi"]+$data["green"]+$data["yellow"]+$data["orange"]+$data["red"]+$data["white"]+$data["berezovy"]+$data["rose"]+$data["brown"]
        );


        if($blok_bc["black+"]>$blok_bc["color+"]){

            if($data["gray"]>$data["black"]){

                $dom_color="gray";
            }else{
                $dom_color="black";
            }
        }

        if($blok_bc["black+"]<$blok_bc["color+"]){


            $blok_skj = array(

                "siniy+" => $data["siniy"]+$data["fiolet"]+$data["goluboi"]+$data["berezovy"],
                "krasniy+" => $data["red"]+$data["rose"],
                "yellow+" => $data["yellow"]+$data["orange"],
                "brown" => $data["brown"],
                "green" => $data["green"],
                "white" => $data["white"]
            );
            $max=max($blok_skj);

            if(array_search($max,$blok_skj)=="siniy+"){

                $blok_sfgb = array(
                    "siniy"=>$data["siniy"],
                    "fiolet"=>$data["fiolet"],
                    "goluboi"=>$data["goluboi"],
                    "berezovy"=>$data["berezovy"]
                );

                $max_sfgb=max($blok_sfgb);

                if(array_search($max_sfgb,$blok_sfgb)=="siniy"){
                    $dom_color="siniy";
                }
                if(array_search($max_sfgb,$blok_sfgb)=="fiolet"){
                    $dom_color="fiolet";
                }
                if(array_search($max_sfgb,$blok_sfgb)=="goluboi"){
                    $dom_color="goluboi";
                }
                if(array_search($max_sfgb,$blok_sfgb)=="berezovy"){
                    $dom_color="berezovy";
                }


            }

            if(array_search($max,$blok_skj)=="krasniy+"){

                if($data["red"]>$data["rose"]){
                    $dom_color="red";
                }else{
                    $dom_color="rose";
                }
            }

            if(array_search($max,$blok_skj)=="yellow+"){

                if($data["yellow"]>$data["orange"]){
                    $dom_color="yellow";
                }else{
                    $dom_color="orange";
                }

            }
            if(array_search($max,$blok_skj)=="green"){
                $dom_color="green";
            }
            if(array_search($max,$blok_skj)=="brown"){
                $dom_color="brown";
            }
            if(array_search($max,$blok_skj)=="white"){
                $dom_color="white";
            }
        }
        MessageSystem::sendMessage(false, "цвет", $dom_color);
        return $dom_color;
    }

}

//$b = new Predominant_Color();
//$kol=$b->Get_Img("img/фф.jpg");

//echo $kol;