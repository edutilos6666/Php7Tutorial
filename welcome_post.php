<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $wage = $_POST["wage"];

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
