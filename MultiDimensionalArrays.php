<?php

function select_all_people() {
    $person1 = array("foo", 10 , 100.0);
    $person2 = array("bar", 20, 200.0);
    $person3 = array("edu", 30, 300.0);
    $ret = array($person1, $person2, $person3);
    return $ret ;
}

$people = select_all_people();
$rows = count($people);
$cols = count($people[0]);
$nl = "\n";

for($i = 0 ; $i < $rows; ++$i) {
    for($j= 0 ; $j < $cols; ++$j) {
        echo $people[$i][$j]. " ";
    }

    echo $nl;
}




