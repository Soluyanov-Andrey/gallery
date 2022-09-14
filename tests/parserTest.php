<?php

  require_once __DIR__.'/../php/algorithms/parser/Parser.php';
 


class parserTest extends \PHPUnit\Framework\TestCase {
  
  use CallAsPublic;



  /** @test */
  public function correctiveStep_1() {

    $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
    $result = $this->callMethod(Parser::class, 'correctiveStep_1',$url);

    $this->assertIsArray($result);
    
    return $result;
  }


  // Если пользователь указал адрес без http:

  /**
  * @depends correctiveStep_1
  */
  public function test_correctiveStep_1_1($value) {
  
  $result = 'http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov';

  $this->assertSame( $result, $value['data'] );

  
  }

  /** @test */
  public function correctiveStep_2() {

    $url="yandex.ru";
    $result = $this->callMethod(Parser::class, 'correctiveStep_2',$url);
  
    $this->assertIsArray($result);
    
    return $result;
   
  }

   /**
  * @depends correctiveStep_2
  */
  public function test_correctiveStep_2($value) {

    $result = 'http://www.yandex.ru';
  
    $this->assertSame( $result, $value['data'] );
  
    
    }
    /** @test */
  public function correctiveStep_3() {

    $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
    $result = $this->callMethod(Parser::class, 'correctiveStep_3',$url);
  
    $this->assertIsArray($result, $message = 'step_3 не массив');
    
    return $result;
   
  }

   /**
  * @depends correctiveStep_3
  */
  public function test_correctiveStep_3($value) {

    $result = 'https://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov';
  
    $this->assertSame( $result, $value['data'], $message = 'Ошибка при дабавлении https' );
  
    
    }
  
    
  /** @test */
  public function searchImg() {

    $url="https://zastavok.net/?ysclid=l764sqvgt028704337";
    $result = $this->callMethod(Parser::class, 'searchImg',$url);
    $this->assertIsArray($result);
      
    return $result;
     
  }

  


  
  

}
