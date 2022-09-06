<?php

  require_once __DIR__.'/../php/algorithms/parser/Parser.php';
 


class parserTest extends \PHPUnit\Framework\TestCase {
  
  use CallAsPublic;


  protected function setUp(): void
  {
      $url="infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov";
      $this->$result = $this->callMethod(Parser::class, 'corrective_step_1',$url);
  }

  //Так пишем если перед методом corrective_step_1() не пишем test_corrective_step_1()
  //Иначе выдает  Warnings: 1..


  /** @test */
  public function corrective_step_1() {
     
  $this->assertSame( 'http://infogra.ru/photography/25-poleznyh-sajtov-dlya-fotografov', $this->$result['data'] );
  
  }

  /** @test */
  public function corrective_step_1_1() {
    $this->assertIsArray($this->$result);
    
  }
}