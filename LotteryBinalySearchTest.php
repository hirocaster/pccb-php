<?php

class Rottery {

  private $n;
  private $m;
  private $k;
  
  public function __construct($n, $m, $k) {
    $this->n = $n;
    $this->m = $m;
    $this->k = $k;
    sort($this->k);
  }

  public function isOk() {


    for($a = 0; $a < $this->n; $a++){
      for($b = 0; $b < $this->n; $b++){
        for($c = 0; $c < $this->n; $c++){

            $target = $this->m -  $this->k[$a] - $this->k[$b] - $this->k[$c];

            if($this->binalySearch($target)){
              return "Yes";
            }
        }
      }
    }
    return "No";
  }

  public function binalySearch($target){
    $l = 0;
    $r = count($this->k);

    while($r - $l >= 1){

      $i = floor(($r + $l) / 2);

      if($target == $this->k[$i]){
        return true;
      }

      if($this->k[$i] < $target){
        $l = $l + 1;
      } else {
        $r = $i;
      }

    }
    return false;
  }
}

class RotteryTest extends PHPUnit_Framework_TestCase {

  public function testRotteryOK(){
    $rottery = new Rottery(3, 10, array(1, 3, 5));
    $this->assertEquals("Rottery", get_class($rottery));
    $this->assertEquals("Yes", $rottery->isOk());
  }

  public function testRotteryNo(){
    $rottery = new Rottery(3, 9, array(1, 3, 5));
    $this->assertEquals("Rottery", get_class($rottery));
    $this->assertEquals("No", $rottery->isOk());
  }

  public function testBinalySearch(){
    $rottery = new Rottery(3, 9, array(1, 3, 5));
    $this->assertTrue($rottery->binalySearch(3));
    $this->assertTrue($rottery->binalySearch(1));
    $this->assertTrue($rottery->binalySearch(5));
    $this->assertFalse($rottery->binalySearch(10));
    $rottery = new Rottery(3, 9, array(5, 1, 3));
    $this->assertTrue($rottery->binalySearch(3));
    $this->assertTrue($rottery->binalySearch(1));
    $this->assertTrue($rottery->binalySearch(5));
    $this->assertFalse($rottery->binalySearch(10));
  }
  
}
