<?php
  if($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $age = $_GET["age"];
    $wage = $_GET["wage"];

    $nl = "<br/>";
    $ret = "<h3>"
        . "id = ". $id . $nl
        . "name = ". $name . $nl
        . "age = ". $age. $nl
        . "wage = ". $wage . $nl
        . "</h3>";

    echo $ret ;
  }
?>
