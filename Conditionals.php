<?php
$curr = getdate();
$seconds = $curr["seconds"];
$minutes = $curr["minutes"];
$hours = $curr["hours"];
$mday = $curr["mday"];
$wday = $curr["wday"];
$mon = $curr["mon"];
$year = $curr["year"];
$yday = $curr["yday"];
$weekday = $curr["weekday"];
$month = $curr["month"];
$timestamp = $curr[0];

define ("NL", "\n");

echo "seconds = ". $seconds. NL
    . "minutes = ". $minutes . NL
    . "hours = ". $hours. NL
    . "mday = ". $mday. NL
    . "wday = ". $wday. NL
    . "mon = ". $mon . NL
    . "year = ". $year . NL
    . "yday = ". $yday . NL
    . "weekday = ". $weekday. NL
    . "month = ". $month. NL
    . "timestamp = ". $timestamp. NL ;


if($mday < 20) {
    echo "I have a little bit time for interview". NL ;
}



if($mday > 0 && $mday < 7) {
    echo "first 7 days" . NL ;
} elseif($mday >= 7 && $mday < 14) {
    echo "second 7 days" . NL ;
} elseif($mday >= 14 && $mday < 21) {
    echo "third 7 days". NL ;
} else {
    echo "last 7 days". NL;
}



$favcolor = "black";
$nl = NL;
$palette = array("red", "green", "blue", "black");
switch ($favcolor) {
    case $palette[0]:
        echo "Favourite color is red $nl";
        break;
    case $palette[1]:
        echo "Favourite color is green $nl";
        break;
    case $palette[2]:
        echo "Favourite color is blue $nl";
        break;
    case $palette[3]:
        echo "Favourite color is black $nl";
        break;
    default:
        echo "Unknown color to the system $nl";
}



