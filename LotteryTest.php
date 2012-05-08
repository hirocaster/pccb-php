<?php

class Rottery {

  private $n;
  private $m;
  private $k;
  
  public function __construct($n, $m, $k) {
    $this->n = $n;
    $this->m = $m;
    $this->k = $k;
  }

  public function isOk() {
    for($a = 0; $a < $this->n; $a++){
      for($b = 0; $b < $this->n; $b++){
        for($c = 0; $c < $this->n; $c++){
          for($d = 0; $d < $this->n; $d++){

            if( $this->m == $this->k[$a] + $this->k[$b] + $this->k[$c] + $this->k[$d] ){
              return "Yes";
            }

          }
        }
      }
    }
    return "No";
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
  
}
