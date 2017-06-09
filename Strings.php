<?php


$str = "hello world!";

$length = strlen($str);

$nl = "\n";

echo "length = ". $length. $nl ;

$word_count = str_word_count($str);
echo "word count = ". $word_count. $nl;

$reversed = strrev($str);
echo "reversed = ". $reversed. $nl ;

$pos = strpos($str , "world");
echo "pos = ". $pos . $nl ;

$replaced = str_replace("world", "Universe", $str);
echo "replaced = ". $replaced. $nl;


$upper = strtoupper($str);
$lower = strtolower($str);
echo "upper = " . $upper . $nl ;
echo "lower = " . $lower. $nl ;

$exploded = explode(" ", $str);
var_dump($exploded);

$imploded = implode(" ", $exploded);
echo $imploded . $nl ;



$name = "foo";
$age = 10 ;
$wage = 100.0 ;
$active = true ;
$format = "name = %s , age = %d , wage = %.3f , active = %u%s";
printf("name = %s , age = %d , wage = %.3f , active = %u %s", $name , $age , $wage, $active, $nl);
printf($format , $name, $age , $wage , $active, $nl);


$out = fopen("out.txt", "w");
fprintf($out , $format , $name, $age , $wage, $active, $nl);
fclose($out);



$out = sprintf($format , $name, $age , $wage, $active , $nl);
echo $out ;


vprintf($format , [$name, $age, $wage , $active , $nl]);
$out = vsprintf($format , array($name , $age , $wage , $active , $nl));
echo $out;

$out = fopen("out.txt", "a");
vfprintf($out , $format , array($name, $age , $wage , $active , $nl));
fclose($out);