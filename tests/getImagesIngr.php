<?php

  require_once __DIR__.'/../php/algorithms/parser/GetImages.php';
 


class GetImagesTest1 extends \PHPUnit\Framework\TestCase {
  


      /** @test */
      public function getImagesUrl1() {

        // $url = '/template/img/left-logo.png';
        // $saitUrl = 'https://zastavok.net/?ysclid=l764sqvgt028704337';

        // $url = '../../test_img/1.jpg';
        // $saitUrl = 'http://test.ru/test/12/3.php';

        $url = 'https://infogra.ru/wp-content/uploads/2020/11/cover-666x400.jpg';
        $saitUrl = 'http://test.ru/test/12/3.php';
        
        $width = 150;
        $higth = 150;
        $result1 = GetImages::getImagesUrl($url, $saitUrl ,$width, $higth);
    
        // $this->assertIsArray($result);
          
        return $result1;
        
      }

        /** @test */
        public function getImagesUrl2() {

          $url = '/template/img/left-logo.png';
          $saitUrl = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
  
          // $url = '../../test_img/1.jpg';
          // $saitUrl = 'http://test.ru/test/12/3.php';
  
          // $url = 'https://infogra.ru/wp-content/uploads/2020/11/cover-666x400.jpg';
          // $saitUrl = 'http://test.ru/test/12/3.php';
          
          $width = 150;
          $higth = 150;
          $result1 = GetImages::getImagesUrl($url, $saitUrl ,$width, $higth);
      
          // $this->assertIsArray($result);
            
          return $result1;
          
        }


}