<?php

# While loop
$x = 0 ;
define ("NL" , "\n");

while ($x < 10 ) {
  echo "x = $x". NL ;
  $x++;
}

echo NL ;
# Do While loop
$x = 0 ;
do {
    echo "x = $x" . NL ;
    $x++ ;
} while($x < 10);


echo NL ;
# For loop
for($x = 0 ; $x < 10; $x++) {
    echo "x = $x". NL ;
}


# Foreach loop
$colors = array("red", "green", "blue", "black");
foreach($colors as $color) {
    echo $color. NL ;
}

$people = array("foo"=> "red", "bar"=> "green", "bim"=>"blue");
foreach($people as $k=>$v) {
    echo $k. "=> ". $v. NL ;
}


