<?php

$nl = "\n";

echo "hello world". $nl;
ECHO "bye world" . $nl ;

$txt = "hello world";
$i_number = 10 ;
$f_number = 100.0 ;

echo $txt . $nl;
echo $i_number. $nl ;
echo $f_number . $nl ;


echo "$txt and $i_number and $f_number $nl";

$x = 5 ;
$y = 4 ;
echo ($x + $y). $nl ;


$x = 10 ;
$y = 4 ;
function add() {
    global $x , $y ;
    return $x + $y;
}

function subtract() {
    global $x , $y;
    return $x - $y ;
}

function multiply() {
    global $x, $y;
    return $x * $y ;
}

function divide() {
    global $x, $y ;
    return $x / $y ;
}


echo add() . $nl ;
echo subtract(). $nl;
echo multiply(). $nl ;
echo divide() . $nl ;


function add2() {
    $ret = $GLOBALS["x"] + $GLOBALS["y"];
    return $ret;
}

function subtract2() {
    $ret = $GLOBALS["x"] - $GLOBALS["y"];
    return $ret ;
}


function multiply2() {
    $ret = $GLOBALS["x"] * $GLOBALS["y"];
    return $ret ;
}

function divide2() {
    $ret = $GLOBALS["x"] / $GLOBALS["y"];
    return $ret ;
}


echo $nl;
echo add2() . $nl ;
echo subtract2(). $nl ;
echo multiply2(). $nl ;
echo divide2(). $nl ;


function test_static() {
    global $nl ;
    static $x = 0 ;
    echo $x . $nl ;
    $x++ ;
}

test_static();
test_static();
test_static();

?>


