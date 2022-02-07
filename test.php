<?php 
  class Test {
    const A = 12;
    function print_const() {
      echo self::A;
  }
}

$test = new Test();
$test->print_const();
// echo $test::A;
