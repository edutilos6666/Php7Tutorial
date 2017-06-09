<?php

$arr1 = array(1, 2, 3, 4, 5);
$arr2 = array("foo", "bar", "bim");
$arr3 = ["edu", "tilos", "pako"];

$arr4 = array("foo"=> 10 , "bar"=> 20 , "bim"=>30);
$arr5 = ["edu"=> true , "tilos"=> false];


print_r($arr1);
print_r($arr2);
print_r($arr3);
print_r($arr4);
print_r($arr5);



$keys = array("foo", "bar", "bim");
$values = array(10 , 20 , 30);
$res = array_combine($keys, $values);
print_r($res);


$_keys = array_keys($res);
$_values = array_values($res);
print_r($_keys);
print_r($_values);



function my_walker($v, $k) {
    echo "[$v, $k]\n";
}

array_walk($res, "my_walker");


$res2 = $res ;
print_r($res);
asort($res2);
print_r($res2);

arsort($res2);
print_r($res2);

ksort($res2);
print_r($res2);


krsort($res2);
print_r($res2);




$res3 = range(0 , 5);
print_r($res3);

define ("NL", "\n");
echo "count res3 = " . count($res3). NL ;



$people = array(
    array(
        "first" => "foo",
        "last" => "bar",
        "age" => 10
    ),
    array(
        "first"=> "edu",
        "last" => "tilos",
        "age" => 20
    ),
    array(
        "first" => "leo",
        "last" => "messi",
        "age" => 30
    )
);



$firsts = array_column($people, "first");
print_r($firsts);

$lasts = array_column($people, "last");
print_r($lasts);

$ages = array_column($people , "age");
print_r($ages);



$count = count($firsts);
for($x = 0 ; $x < $count; ++$x) {
    echo $firsts[$x]. " ";
}

echo NL ;

foreach($firsts as $first) {
    echo $first . " ";
}

echo NL ;


$arr1 = array("foo", "bar", "bim");
$arr2 = array("bar", "bim", "edu", "tilos");
$intersect = array_intersect($arr1, $arr2);
print_r($intersect);
$diff1 = array_diff($arr1, $arr2);
print_r($diff1);
$diff2 = array_diff($arr2, $arr1);
print_r($diff2);
$merge = array_merge($arr1, $arr2);
print_r($merge);



$names = array("foo", "bar", "bim", "pako");

function custom_filter($name) {
    return strlen($name) == 3 ;
}

$filtered = array_filter($names, "custom_filter");
print_r($filtered);


function custom_map($name) {
    return strtoupper($name);
}

$mapped = array_map("custom_map", $names);
print_r($mapped);















