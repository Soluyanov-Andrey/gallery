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

  /**
  * @depends corrective_step_1
  */
  public function test_corrective_step_1_1($value) {
  
  $result = 'http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov';

  $this->assertSame( $result, $value['data'] );

  
  }
  

  
  

}
