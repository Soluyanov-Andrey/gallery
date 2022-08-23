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
		
		
        $a=parse_url($gl_url);
        $url_n=$a["scheme"]."://".$a["host"];

        //если в url первая  "/" то соеденяем по
        if(substr($url, 0, 1)=="/"){
            return $url_n.$url;
        }else{
            return $url_n."/".$url;
        }


	}

	/*
    * corrective_step2 возвращает новый URl
    * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
    * выбранные url -$url например ../../test_img/1.jpg
    * результат http://test.ru/test_img/1.jpg
    */

	protected function corrective_step_2(string $url)
	{

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