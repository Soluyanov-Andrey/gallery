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

	
	protected function corrective_step_1(string $url_gl)
	{

	}

}