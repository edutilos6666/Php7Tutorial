<html>
<head>
    <body>

<?php

/*
 * $GLOBALS
 * $_SERVER
 * $_REQUEST
 * $_POST
 * $_GET
 * $_FILES
 * $_ENV
 * $_COOKIES
 * $_SESSION
 */
$name = "foo";
$age = 10 ;
$wage = 100.0 ;
$nl = "<br/>";


function print_props() {
 $name = $GLOBALS["name"];
 $age = $GLOBALS["age"];
 $wage = $GLOBALS["wage"];
 $nl = $GLOBALS["nl"];

 echo "name = " . $name . $nl
     . "age = ". $age. $nl
     . "wage = ". $wage . $nl;
}


print_props();



function print_server() {
 global  $nl ;
 echo $_SERVER["PHP_SELF"]. $nl ;
 var_dump($_SERVER);
 $php_self = $_SERVER["PHP_SELF"];
 $server_name = $_SERVER["SERVER_NAME"];
 $http_host = $_SERVER["HTTP_HOST"];
 $http_referer = $_SERVER["HTTP_REFERER"];
 $http_user_agent = $_SERVER["HTTP_USER_AGENT"];
 $script_name = $_SERVER["SCRIPT_NAME"];
 echo "php_self = ". $php_self. $nl
     . "server_name = ". $server_name. $nl
     . "http_host = ". $http_host. $nl
     . "http_referer = ". $http_referer. $nl
     . "http_user_agent = ". $http_user_agent. $nl
     . "script_name = ". $script_name. $nl ;

}

print_server();

?>

<br/>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    id : <input type="text" name="id" /> <br/>
    name: <input type="text" name="name" /> <br/>
    age: <input type="text" name="age" /> <br/>
    wage: <input type="text" name="wage" /> <br/>
    <input type="submit" />
    <br/>
</form>


<?php
 if($_SERVER["REQUEST_METHOD"] == "POST") {
     echo "request_method = POST" . $nl;
     print_r($_REQUEST);
     print_r($_POST);
     print_r($_GET);
     echo "id = " . $_REQUEST["id"] . $nl ;
     echo "name = ". $_REQUEST["name"]. $nl ;
     echo "age = ". $_REQUEST["age"]. $nl ;
     echo "wage = ". $_REQUEST["wage"]. $nl ;
 }
 elseif($_SERVER["REQUEST_METHOD"] == "GET") {
     echo "request_method = GET" . $nl;
     print_r($_REQUEST);
     echo $nl ;
     print_r($_GET);
     echo $nl ;
 }
?>
</body>
</head>
</html>