<?php
define("NL", "\n");

echo date("Y.m.d") . NL;
echo date("Y/m/d"). NL;
echo date("Y-m-d"). NL;
echo date("l"). NL ;
echo date("h:i:sa"). NL;

$h = 10;
$m = 13 ;
$s = 24 ;
$mon = 12 ;
$d = 24 ;
$y = 2001 ;
$date = mktime($h, $m , $s, $mon , $d, $y);
echo date("Y-m-d h:i:sa", $date). NL  ;


$date2 = strtotime("10:10:10am December 8 1991");
$pattern = "Y-m-d h:i:sa";
echo date($pattern, $date2). NL;


echo date($pattern). NL ;
$date3 = strtotime("tomorrow");
echo date($pattern , $date3). NL ;
$date4 = strtotime("next Saturday");
echo date($pattern , $date4). NL ;
$date5 = strtotime("+3 Months");
echo date($pattern , $date5). NL;
echo date($pattern , strtotime("next Thursday")). NL ;
echo date($pattern , strtotime("Thursday")). NL;
$startdate = strtotime("Saturday");
echo date($pattern , strtotime("+6 weeks" ,$startdate)). NL;

$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);
while($startdate <= $enddate) {
    echo date("M d", $startdate). NL;
    $startdate = strtotime("+1 week", $startdate);
}

echo time() . NL ;

echo ceil(($startdate - time()) / (60*60*24)). NL ;


$my_birthday = strtotime("December 08");
$diff_days = ceil(($my_birthday- time())/(60*60*24));
echo "diff_days = ". $diff_days. NL;


$date_predefined_patterns = [DATE_ATOM , DATE_COOKIE ,
    DATE_ISO8601, DATE_RFC822, DATE_RFC850, DATE_RFC1036,
    DATE_RFC1123, DATE_RFC2822 , DATE_RSS , DATE_W3C];

foreach($date_predefined_patterns as $date_pattern) {
    echo date($date_pattern). NL;
}


var_dump(checkdate(2, 29, 2017));
var_dump(checkdate(2, 28, 2017));
var_dump(checkdate(2, 29 , 2016));



