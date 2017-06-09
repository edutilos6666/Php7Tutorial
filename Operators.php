<?php

define ("NL" , "\n");

# Arithmetic operators : +, - , *, / , % , **
function test_arithmetic_ops($x, $y) {
    $sum = $x + $y ;
    $subtract = $x - $y ;
    $multiply = $x * $y ;
    $divide = $x / $y ;
    $modulo = $x % $y ;
    $pow = $x ** $y ;

    echo "sum = ". $sum . NL
        . "subtract = ". $subtract. NL
        . "multiply = ". $multiply. NL
        . "divide = ". $divide . NL
        . "modulo = ". $modulo . NL
        . "pow = ". $pow. NL ;
}


test_arithmetic_ops(10 , 3);


#Assignment operators : += , -= , *= , /= , **= , %=
function test_assignment_ops($x, $y) {
    $temp = $x ;
    $temp += $y ;
    $sum = $temp ;

    $temp = $x ;
    $temp -= $y ;
    $subtract = $temp;

    $temp = $x ;
    $temp *= $y ;
    $multiply = $temp ;

    $temp = $x ;
    $temp /= $y;
    $divide = $temp;

    $temp = $x ;
    $temp **= $y ;
    $pow = $temp;

    $temp = $x ;
    $temp %= $y ;
    $modulo = $temp;

    echo "sum = " . $sum . NL
        . "subtract = ". $subtract . NL
        . "multiply = ". $multiply . NL
        . "divide = ". $divide . NL
        . "pow = " . $pow . NL
        . "modulo = ". $modulo. NL ;
}

echo NL ;
test_assignment_ops(10 , 3);



# Comparison Operators: == , === , != , <> , !== , > , >= , < , <=
function test_comparison_ops($x , $y) {
    $eq = $x == $y ;
    $id = $x === $y ;
    $not_eq = $x != $y ;
    $not_eq2 = $x <> $y ;
    $not_id = $x !== $y ;
    $gt = $x > $y ;
    $gte = $x >= $y ;
    $lt = $x < $y ;
    $lte = $x <= $y ;

    echo "eq = ". $eq . NL
        . "id = ". $id . NL
        . "not_eq = ". $not_eq. NL
        . "not_eq2 = ". $not_eq2 . NL
        . "not_id = ". $not_id. NL
        . "gt = ". $gt . NL
        . "gte = ". $gte . NL
        . "lt = ". $lt . NL
        . "lte = ". $lte . NL ;
}


test_comparison_ops(10 , 3);
echo NL ;
test_comparison_ops(10 ,10);



# Increment Operators: ++ , --
function test_increment_ops($x) {
    $ret = $x++ ;
    echo "x++ = " . $ret . NL ;
    $ret = ++$x ;
    echo "++x = ". $ret . NL;
    $ret = $x--;
    echo "x-- = ". $ret . NL ;
    $ret = --$x ;
    echo "--x = ". $ret . NL;
}

test_increment_ops(0);


# Logical Operators: and, or , xor , && , ||, !
function test_logical_ops($x, $y) {
    $and = $x and $y ;
    $or = $x or $y ;
    $xor = $x xor $y ;
    $and2 = $x && $y ;
    $or2 = $x || $y ;
    $not = !$x ;

    echo "and = ". $and . NL
        . "or = ". $or . NL
        . "xor = ". $xor . NL
        . "and2 = ". $and2 . NL
        . "or2 = ". $or2 . NL
        . "not = ". $not . NL ;
}

test_logical_ops(true , false);


# String operators: . , .=
function test_string_ops($x, $y) {
    $ret = $x. $y ;
    $x .= $y;
    echo "ret = ". $ret . NL
        . "x = ". $x . NL ;
}

test_string_ops("foo", "bar");


# Array operators: + , == , === , != , <> , !==
function test_array_ops($x , $y) {
    $concat = $x + $y ;
    $eq = $x == $y ;
    $id = $x == $y ;
    $not_eq = $x != $y ;
    $not_eq2 = $x <> $y ;
    $not_id = $x !== $y ;
    var_dump($concat);
    var_dump($x);
    echo "concat = ". join(",", $concat). NL
        . "eq = ". $eq . NL
        . "id = ". $id . NL
        . "not_eq = ". $not_eq. NL
        . "not_eq2 = ". $not_eq2. NL
        . "not_id = " . $not_id . NL ;
}

test_array_ops(array("foo", "bar"),["edu", "tilos"]);

$arr1 = array("a"=> "foo", "b"=> "bar");
$arr2 = array("c"=> "edu", "d"=> "tilos");
var_dump($arr1 + $arr2);

