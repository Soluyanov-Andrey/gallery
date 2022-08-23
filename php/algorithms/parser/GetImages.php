<?php
/**
 *  Найденный изображения при проходе Parser могут 
 */
class GetImages extends ParentAlgorithms
{
	const FILES_YES = 'Фаил есть и подходит по размеру';
    const FILES_SIZE_NO = 'Фаил есть но не подходит по размеру';
    const FILES_NO = 'Фаила нет';

	public static function get_images_url($images_url_array)
	{
	
	}


	protected static function get_files($url, $width, $higth){


		
		$fl=0;
		//"@" означает, что стандартная ошибка не выдается а генерируется false
		$size=@getimagesize($url);
		//"высота".$size[1]);
		//"ширина".$size[0]);

		if($size[1]>=$higth && $size[0]>=$width){

			$fl=1;
		}

		//-----------------------------------------------------
		if ($size && $fl==1) {
			//фаил есть и подходит по размеру

			return ParentAlgorithms::returns(true, self::FILES_YES );
		}

		if ($size && $fl==0) {
			//фаил есть но не подходит по размеру

			return  ParentAlgorithms::returns(false, self::FILES_SIZE_NO );
		}

		if (!$size) {
			//фаила нет


			return  ParentAlgorithms::returns(null, self::FILES_NO );
		}
	}

	/*
    * corrective_step1 возвращает новый URl
    * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
    * выбранные url -$url например test_img/1.jpg
    * результат http://test.ru/test/12/test_img/1.jpg
    */
	protected function corrective_step_1($url, $gl_url)
	{
		
		$path_parts = pathinfo($gl_url);

        $a=parse_url($url);


        if(!isset($a["host"])){

            //если в url нет ../ то делаем
            if (strpos($url, '../') === false) {

                //если в url первая  "/" то соеденяем по
                if(substr($url, 0, 1)=="/"){
                    return $path_parts['dirname'].$url;
                }else{
                    return $path_parts['dirname']."/".$url;
                }

            }
        };
        return $url;



	}

	/*
    * corrective_step2 возвращает новый URl
    * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
    * выбранные url -$url например ../../test_img/1.jpg
    * результат http://test.ru/test_img/1.jpg
    */

	protected function corrective_step_2(string $url,$gl_url)
	{
		
        $path_parts = pathinfo($gl_url);

        $a=parse_url($url);

        //Проверяем первичное условие есть ли в url имя и является ли адрес относительным ../
        function conditions($url)
        {
            if (!isset($a["host"])) {

                //если в url нет ../ то делаем

                if (substr_count($url, '../') != 0) {

                    return true;
                }
            }
        };
        //рекурсивная функция из Url http://rnk.ru/test/55/6 отсикает $quantity '/' с конца
        //$quantity=1 вернет http://rnk.ru/test/55
        //$quantity=2 вернет http://rnk.ru/test
        function trim_down($url,$quantity)
        {
            $a= strripos($url,'/');
            $url_n= substr($url,0,$a);
            $quantity=$quantity-1;


            if($quantity>0){ return trim_down($url_n,$quantity);};
            if($quantity==0){ return $url_n;};
        };

        if(conditions($url)){
            $quantity = substr_count($url, '../');


            $str_1=trim_down($gl_url,$quantity+1);

            //удаляем все '../' в строке вида '../../img.jpg'
            $str_2 = str_replace("../", "", $url, $count);


            return ($str_1.'/'.$str_2);

        }
        return $url;
	}
	/*
	* corrective_step3  возвращает новый URl картинки
    * $url="/template/img/left-logo.png";
    * $gl_url="https://zastavok.net/?ysclid=l764sqvgt028704337";
	* вернет https://zastavok.net/template/img/left-logo.png
    */
	protected function corrective_step_3($url, $gl_url)
	{
		
		
        $a=parse_url($gl_url);
        $url_n=$a["scheme"]."://".$a["host"];

        //если в url первая  "/" то соеденяем по
        if(substr($url, 0, 1)=="/"){
            return $url_n.$url;
        }else{
            return $url_n."/".$url;
        }


	}
	

}