<?php
/**
 *  
 *
 */
class Try_url_img extends ParentAlgorithms
{

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
       return $array_url;
    }

}
