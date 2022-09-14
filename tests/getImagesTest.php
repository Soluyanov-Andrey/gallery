<?php

  require_once __DIR__.'/../php/algorithms/transforming_steps/GetImages.php';
 


class GetImagesTest extends \PHPUnit\Framework\TestCase {
  
  use CallAsPublic;
 
  
  //Проверяем конечную функцию, берет изображения с задаными размерами.
  /** @test */
  public function test1() {
    
    $url = "https://infogra.ru/wp-content/uploads/2022/08/1StqFPBICfdW_YmcUH1s-YA-810x540.jpeg";
    $whith = 150;
    $higth = 200;
    

    
    $result = $this->callMethod(GetImages::class, 'getFiles',$url,$whith, $higth);
    $this->assertTrue( $result['result'] );
    
    // $this->assertIsArray($result);
    
    // return $result;
  }


   /** @test */
   public function correctiveStep_1() {

    $url = 'test_img/1.jpg';
    $gl_url = 'http://test.ru/test/12/3.php';


    $result = $this->callMethod(GetImages::class, 'correctiveStep_1', $url ,$gl_url);
    $this->assertSame("http://test.ru/test/12/test_img/1.jpg",$result );
    
    
    
   }

    /** @test */
    public function correctiveStep_2() {

        $url = '../../test_img/1.jpg';
        $gl_url = 'http://test.ru/test/12/3.php';
    
    
        $result = $this->callMethod(GetImages::class, 'correctiveStep_2', $url ,$gl_url);
        
        
        $this->assertSame("http://test.ru/test_img/1.jpg",$result );
        unset($result);
        
        
       }

    /** @test */
    public function correctiveStep_3() {

        // $url = '/template/img/left-logo.png';
        // $gl_url = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
    
        
        $url = '/ts/animals/154988616247.jpg';
        $gl_url = 'https://zastavok.net/animals/59873-sova_el.html';
        $result = $this->callMethod(GetImages::class, 'correctiveStep_3', $url ,$gl_url);
        
        var_dump($result);
        $this->assertSame("https://zastavok.net/ts/animals/154988616247.jpg",$result );
     
        
        
       }
       
     /** @test */
     public function getFilesRepeated() {

      $url = 'https://infogra.ru/wp-content/uploads/2020/11/cover-666x400.jpg';
      $method_name = 'Tect';
  
  
      $result = $this->callMethod(GetImages::class, 'getFilesRepeated', $url ,$method_name);
      
      
      
   
      $this->assertTrue( $result['result'] );
      
     }

    


}