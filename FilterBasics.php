<?php
define("NL", "\n");

foreach(filter_list() as $id=> $filter) {
    echo $filter.  " => ". filter_id($filter) . " and ". $id . NL ;
}


$str = "<b>hello world</b>";
$str2 = filter_var($str, FILTER_SANITIZE_STRING);
echo $str. NL ;
echo $str2. NL ;


$age = "100";
if(filter_var($age, FILTER_VALIDATE_INT) === 0 || filter_var($age, FILTER_VALIDATE_INT) == true) {
    echo "$age is integer.". NL ;
} else {
    echo "$age is not integer.". NL;
}



$email = "foo@bar.bim";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if(filter_var($email, FILTER_VALIDATE_EMAIL)== true) {
    echo "$email is correct." . NL ;
} else {
    echo "$email is not correct." . NL ;
}

$localhost = "127.0.0.1";
if(filter_var($localhost, FILTER_VALIDATE_IP) == true) {
    echo "$localhost is correct IP." . NL ;
} else {
    echo "$localhost is not correct IP." . NL ;
}

$url = "http://www.google.com";
$url = filter_var($url, FILTER_SANITIZE_URL);
if(filter_var($url, FILTER_VALIDATE_URL) == true) {
    echo "$url is correct URL.". NL ;
} else {
    echo "$url is not correct URL." . NL ;
}



#some advanced concepts
$age = 10 ;
$min_range = 1 ;
$max_range = 100;
if(filter_var($age, FILTER_VALIDATE_INT, array("options"=>
array("min_range"=> $min_range, "max_range"=> $max_range)
)) == true) {
    echo "$age passed filter." . NL ;
} else {
    echo "$age did not pass filter." . NL ;
}

# IPV6 validation
$ip = "127.0.0.1";
if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) == true) {
    echo "$ip is IPV6" . NL;
} else {
    echo "$ip is not IPV6" . NL ;
}

$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) == true) {
    echo "$ip is IPV6". NL ;
} else {
    echo "$ip is not IPV6". NL ;
}


# URL  must contain queryString
$url = "http://www.google.com";
if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) == true) {
   echo $url . " has query string". NL ;
} else {
    echo $url. " does not have query string". NL ;
}

$url = "http://www.google.com?name=foo&age=10";
if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) ==  true) {
    echo $url . " has query string". NL ;
} else {
    echo $url . " does not have query string". NL ;
}



# remove ASCII chars > 127
$str = "<h1>Hello WorldÆØÅ!</h1>";
$newstr = filter_var($str , FILTER_SANITIZE_STRING , FILTER_FLAG_STRIP_HIGH);
echo $newstr. NL ;