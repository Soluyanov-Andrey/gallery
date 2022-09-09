<?php
require_once __DIR__.'/../php/algorithms/parser/Try_url_img.php';
 


class try_urlTest extends \PHPUnit\Framework\TestCase {

   /** @test */
   public function try_url() {


    $gl_url = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
          
  
          // $url = '../../test_img/1.jpg';
          // $gl_url = 'http://test.ru/test/12/3.php';
  
          // $url = 'https://infogra.ru/wp-content/uploads/2020/11/cover-666x400.jpg';
          // $gl_url = 'http://test.ru/test/12/3.php';
          
          $width = 150;
          $higth = 150;
          $result1 = Try_url_img::try_url($gl_url ,$width, $higth);
      
          var_dump($result1);
          // $this->assertIsArray($result);
            
          
   }
    
}
