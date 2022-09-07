<?php
/**
 * Скрипт можно просто запустить, и он покажет различные градиенты цветов.
 */

//echo("<div style=\"background-color: RGB(".$r.", ".$g.", ".$b."); height: 20px; width:40px;\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$k."</div>");

function hsv2rgb($hue,$sat,$val,$kol) {;
    $rgb = array(0,0,0);
    //calc rgb for 100% SV, go +1 for BR-range
    for($i=0;$i<4;$i++) {
        if (abs($hue - $i*120)<120) {
            $distance = max(60,abs($hue - $i*120));
            $rgb[$i % 3] = 1 - (($distance-60) / 60);
        }
    }
    //desaturate by increasing lower levels
    $max = max($rgb);
    $factor = 255 * ($val/100);
    for($i=0;$i<3;$i++) {
        //use distance between 0 and max (1) and multiply with value
        $rgb[$i] = round(($rgb[$i] + ($max - $rgb[$i]) * (1 - $sat/100)) * $factor);
    }

    echo("<div style=\"background-color: RGB(".$rgb[0].", ".$rgb[1].", ".$rgb[2]."); height: 20px; width:40px;\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$kol."v=".$val."s=".$sat."h=".$hue."</div>");

    //$rgb['html'] = sprintf('#%02X%02X%02X', $rgb[0], $rgb[1], $rgb[2]);
    //return $rgb;
}



$k=0;

$h=360; $s=100;$v=100;

for ($h1=0; $h1<=360; $h1=($h1+20)) {

    for ($s1=0; $s1<=100; $s1=($s1+20)) {

        for ($v1=0; $v1<=100; $v1=($v1+20)) {
            $k=$k+1;
            $b=hsv2rgb($h1,$s1,$v1,$k);



        }

    }

}