<?php

  require_once __DIR__.'/../php/algorithms/parser/GetImages.php';
 


class GetImagesTest extends \PHPUnit\Framework\TestCase {
  
  use CallAsPublic;
 
  
  //Проверяем конечную функцию, берет изображения с задаными размерами.
  /** @test */
  public function test1() {
    
    $url = "https://infogra.ru/wp-content/uploads/2022/08/1StqFPBICfdW_YmcUH1s-YA-810x540.jpeg";
    $whith = 150;
    $higth = 200;
    

    
    $result = $this->callMethod(GetImages::class, 'get_files',$url,$whith, $higth);
    $this->assertTrue( $result['result'] );
    
    // $this->assertIsArray($result);
    
    // return $result;
  }


   /** @test */
   public function corrective_step_1() {

    $url = 'test_img/1.jpg';
    $gl_url = 'http://test.ru/test/12/3.php';


    $result = $this->callMethod(GetImages::class, 'corrective_step_1', $url ,$gl_url);
    $this->assertSame("http://test.ru/test/12/test_img/1.jpg",$result );
    
    
    
   }

    /** @test */
    public function corrective_step_2() {

        $url = '../../test_img/1.jpg';
        $gl_url = 'http://test.ru/test/12/3.php';
    
    
        $result = $this->callMethod(GetImages::class, 'corrective_step_2', $url ,$gl_url);
        
        
        $this->assertSame("http://test.ru/test_img/1.jpg",$result );
        unset($result);
        
        
       }

    /** @test */
    public function corrective_step_3() {

        $url = '/template/img/left-logo.png';
        $gl_url = 'https://zastavok.net/?ysclid=l764sqvgt028704337';
    
    
        $result = $this->callMethod(GetImages::class, 'corrective_step_3', $url ,$gl_url);
        
        
        $this->assertSame("https://zastavok.net/template/img/left-logo.png",$result );
     
        
        
       }
       
     /** @test */
     public function get_files_repeated() {

      $url = 'https://infogra.ru/wp-content/uploads/2020/11/cover-666x400.jpg';
      $method_name = 'Tect';
  
  
      $result = $this->callMethod(GetImages::class, 'get_files_repeated', $url ,$method_name);
      
      
      
   
      $this->assertTrue( $result['result'] );
      
     }

    


}