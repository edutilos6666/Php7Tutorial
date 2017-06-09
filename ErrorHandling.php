<?php
define("NL", "\n");

 function custom_error_handler($errno , $errstr) {
     echo "[$errno] => $errstr". NL ;

//     die();
 }

 set_error_handler("custom_error_handler");

 echo($test);


 echo "hello world" . NL;


 $test = 10 ;
 if ($test < 20) {
     trigger_error("Value must be >= 20");
 }



 function warning_handler($errno, $errstr) {
     echo "warning handler was invoked.". NL ;
     echo "[$errno] => $errstr" . NL ;
     error_log("Error: [$errno] => $errstr", 1 , "edutilosaghayev@gmail.com",
         "From: edutilosaghayev@gmail.com");
 }

 set_error_handler("warning_handler", E_USER_WARNING);

 if($test < 20) {
     trigger_error("Value must be >= 20", E_USER_WARNING);
 }

?>