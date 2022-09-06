<?php

  require_once __DIR__.'/../php/algorithms/parser/Parser.php';
 


class parserTest extends \PHPUnit\Framework\TestCase {
  
  use CallAsPublic;



  //Так пишем если перед методом corrective_step_1() не пишем test_corrective_step_1()
  //Иначе выдает  Warnings: 1..

  /** @test */
  public function corrective_step_1() {

    $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
    $result = $this->callMethod(Parser::class, 'corrective_step_1',$url);

    $this->assertIsArray($result);
    
    return $result;
  }


  // Если пользователь указал адрес без http:

  /**
  * @depends corrective_step_1
  */
  public function test_corrective_step_1_1($value) {
  
  $result = 'http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov';

  $this->assertSame( $result, $value['data'] );

  
  }

  /** @test */
  public function corrective_step_2() {

    $url="yandex.ru";
    $result = $this->callMethod(Parser::class, 'corrective_step_2',$url);
  
    $this->assertIsArray($result);
    
    return $result;
   
  }

   /**
  * @depends corrective_step_2
  */
  public function test_corrective_step_2($value) {

    $result = 'http://www.yandex.ru';
  
    $this->assertSame( $result, $value['data'] );
  
    
    }
    /** @test */
  public function corrective_step_3() {

    $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
    $result = $this->callMethod(Parser::class, 'corrective_step_3',$url);
  
    $this->assertIsArray($result);
    
    return $result;
   
  }

   /**
  * @depends corrective_step_3
  */
  public function test_corrective_step_3($value) {

    $result = 'https://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov';
  
    $this->assertSame( $result, $value['data'] );
  
    
    }
  
    
  /** @test */
  public function Search_Img() {

    $url="https://zastavok.net/?ysclid=l764sqvgt028704337";
    $result = $this->callMethod(Parser::class, 'Search_Img',$url);
    
    $this->assertIsArray($result);
      var_dump($result);
    return $result;
     
  }


  
  

}
