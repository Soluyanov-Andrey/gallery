<?php
/**
 *  Найденный изображения при проходе Parser могут 
 */
class GetImages extends ParentAlgorithms
{
	public static function get_images_url($images_url_array)
	{
		foreach ($images_url_array as &$value) {
    
    
    GetImages::size_check($value,150,150);

		}
	}

	private static function size_check($url, $width, $higth)
	{


    //"@" означает, что стандартная ошибка не выдается а генерируется false
		$size = @getimagesize($url);
    //"высота".$size[1]);
    //"ширина".$size[0]);
		
		if ($size[1] >= $higth && $size[0] >= $width) {
			$fl = 1;
		}

    //-----------------------------------------------------
		if ($size && $fl == 1) {
        //фаил есть и подходит по размеру
			echo ("подходит");
			return 1;
		}

		if ($size && $fl == 0) {
        //фаил есть но не подходит по размеру

			echo ("не подходит");
			return 2;
		}

		if (!$size) {
        //фаила нет
			echo ("файла нет");

			return 3;
		}
	}
	/**
 *      corrective_test
 * 
 */
					/*
    * Тест  возвращает новый URl
    * имеет исходный url -$gl_url например http://test.ru/test/12/3.php
    * выбранные url -$url например test_img/1.jpg
    * результат http://test.ru/test/12/test_img/1.jpg
    */

	private static function corrective_test($url)
	{
		$gl_url = $_SESSION['url'];

		global $globalUrl;
		$globalUrl = $globalUrl . "8kkk";
		echo ($globalUrl);

		$path_parts = pathinfo($gl_url);

		$a = parse_url($url);

		if (!isset($a["host"])) {

            //если в url нет ../ то делаем
			if (strpos($url, '../') === false) {

                //если в url первая  "/" то соеденяем по
				if (substr($url, 0, 1) == "/") {
					return $path_parts['dirname'] . $url;
				} else {
					return $path_parts['dirname'] . "/" . $url;
				}
			}
		};
		return $url;
	}
}
