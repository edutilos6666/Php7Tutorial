<?php

class SimpleMath {
   public function add($x, $y) {
       return $x + $y ;
   }

   public function subtract($x, $y) {
       return $x - $y;
   }

   function multiply($x, $y) {
       return $x * $y ;
   }

   function divide($x, $y) {
       return $x / $y ;
   }
}


$sm = new SimpleMath();
$x = 10 ;
$y = 3 ;
define ("NL", "\n");

$add = $sm->add($x, $y);
$subtract = $sm-> subtract($x, $y);
$multiply = $sm->multiply($x, $y);
$divide = $sm->divide($x, $y);
echo "add = ". $add . NL
    . "subtract = ". $subtract. NL
    . "multiply = ". $multiply. NL
    . "divide = ". $divide. NL ;


function add_with_defaults($x =10 , $y = 3) {
    return $x + $y ;
}

echo add_with_defaults() . NL
    . add_with_defaults(100). NL
    . add_with_defaults(100, 200). NL ;

