<?php
define ("NL", "<br/>");

 setcookie("name", "foo", time() + 3600, "/");
 setcookie("age", 10 , time() + 3600, "/");
 setcookie("wage", 100.0, time()+ 3600, "/");


 if(isset($_COOKIE["name"])) {
   echo "cookie name = " . $_COOKIE["name"]. NL ;
 }

 if(isset($_COOKIE["age"])) {
     echo "cookie age = ". $_COOKIE["age"]. NL;
 }

 if(isset($_COOKIE["wage"])) {
     echo "cookie wage = ". $_COOKIE["wage"]. NL ;
 }


 var_dump(headers_list());
?>