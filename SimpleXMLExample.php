<?php
define ("NL", "\n");

$people = "<?xml version='1.0' encoding = 'UTF-8'?>
<People>
<Person id='1'>
<Name>foo</Name>
<Age>10</Age>
<Wage>100.0</Wage>
<Active>1</Active>
</Person>

<Person id='2'>
<Name>bar</Name>
<Age>20</Age>
<Wage>200.0</Wage>
<Active>0</Active>
</Person>

<Person id='3'>
<Name>bim</Name>
<Age>30</Age>
<Wage>300.0</Wage>
<Active>1</Active>
</Person>

</People>
";
//load  string
$xml = simplexml_load_string($people);
if($xml == false) {
  $errors = libxml_get_errors();
  foreach($errors as $error) {
      echo $error.NL ;
  }
} else {
    print_r($xml);
}


echo NL.NL ;

//load file
$filename = "Worker.xml";
$xml = simplexml_load_file($filename);
if($xml == false) {
    foreach(libxml_get_errors() as $error) {
        echo $error.NL ;
    }
} else {
    print_r($xml);
}


echo $xml->getName() . NL ;
$children = $xml->children();
foreach($children as $worker) {
    echo $worker->getName() . NL ;
    foreach($worker->attributes() as $k=> $v) {
        echo $k. "=> ". $v. NL ;
    }

    foreach($worker->children() as $child) {
        echo $child->getName() . " and ". $child . NL;
    }
}



// saving xml
require_once  "Worker.php";
$worker_list = array(
    new Worker(1 , "foo", 10 , 100.0),
    new Worker(2 , "bar", 20 , 200.0),
    new Worker(3, "bim", 30, 300.0)
);

$str = "<?xml version='1.0' encoding='UTF-8' ?>
<PhpWorkers>
";

foreach($worker_list as $worker) {
    $id = $worker->id;
    $name = $worker->name;
    $age = $worker->age ;
    $wage = $worker->wage ;
    $tmp  = "<PhpWorker id = \"$id\">
<Name>$name</Name>
<Age>$age</Age>
<Wage>$wage</Wage>
</PhpWorker>
";
      $str .= $tmp ;
}

$str .= "</PhpWorkers>";

$xml = new SimpleXMLElement($str);
//$xml->asXML("PhpWorker.xml");
$xml->saveXML("PhpWorker.xml");


// another get
$msg = "<?xml version='1.0' encoding='UTF-8'?>
<Message>
<To>foobar666@inbox.ru</To>
<From>edutilosaghayev@gmail.com</From>
<Subject>test</Subject>
<Content>Hello World</Content>
</Message>
";

echo NL.NL ;
$xml = simplexml_load_string($msg) or die("could not load string.");
echo $xml->To . NL ;
echo $xml->From . NL ;
echo $xml->Subject . NL ;
echo $xml->Content.NL;


echo NL. NL ;
$xml = simplexml_load_file($filename) or die("could not load $filename.");
$workers = $xml->Worker ;
foreach($workers as $worker) {
    echo $worker['id'] .", $worker->Name, $worker->Age, $worker->Wage". NL;
}
