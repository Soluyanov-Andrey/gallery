<?php
/**
 *  
 *
 */
class Try_url_img extends ParentAlgorithms
{
    const ANSWER_NO = 'Или на сайте нет картинок, или url не смогли быть приобразованы.';
    const ANSWER_YES = 'URL картинок, собраны в массив и готовы для скачивания.';
    public static function try_url($url_gl, $width, $higth)
	{
		$result=Parser::valid_Url($url_gl);
    
        $array_url = Array();
        if($result['result']){

            foreach ($result['data'] as &$value){ 
                 $img_yes = GetImages::get_images_url($value, $url_gl, $width, $higth);

                if($img_yes['result']){
                    array_push($array_url,$img_yes['data']);
            }
        }
       }
       if($array_url=== []) {
            return ParentAlgorithms::returns(false, self::ANSWER_NO,$array_url);
       } 
       
       return ParentAlgorithms::returns(true, self::ANSWER_YES, $array_url);

       }

}
