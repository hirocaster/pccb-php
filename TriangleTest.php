<?php

class Triangle {

  private $n;
  private $bars;

  public function __construct($n, $bars) {
    $this->n = $n;
    $this->bars = $bars;
  }

  public function length() {
    for($i = 0; $i < $this->n; $i++){
      for($j = 0; $j < $this->n; $j++){
        for($k = 0; $k < $this->n; $k++){

          $len = $this->bars[$i] + $this->bars[$j] + $this->bars[$k];
          $max = max($this->bars[$i], $this->bars[$j], $this->bars[$k]);

          if($len - $max >= $max) {
            return $len;
          } else {
            return 0;
          }

        }
      }
    }
  }

}

class TriangleTest extends PHPUnit_Framework_TestCase {

  public function testTriangleOK(){
    $bars = array(2, 3, 4, 5, 10);
    $triangle = new Triangle(count($bars), $bars);
    $this->assertEquals(12, $triangle->length());
  }

  public function testTriangleNG(){
    $bars = array(4, 5, 10, 20);
    $triangle = new Triangle(count($bars), $bars);
    $this->assertEquals(0, $triangle->length());
  }
  
}
