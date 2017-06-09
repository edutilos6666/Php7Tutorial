<?php
/*
 * There are 8 data types in php
 * String
 * Integer
 * Float
 * Boolean
 * Array
 * Object
 * NULL
 * Resource
 */


# String
$x  = "foo" ;
$y = "bar";
var_dump($x);
var_dump($y);

# Integer
$x = 10 ;
$y = 0x10 ;
$z = 010;
var_dump($x);
var_dump($y);
var_dump($z);

# Float
$x = 10.123;
$y = 12.234 ;
var_dump($x);
var_dump($y);

# Boolean
$x = true ;
$y = false ;
var_dump($x);
var_dump($y);

# Array
$x = array("foo", "bar", "bim");
$y = ["edu", "tilos", "pako"];
$z = [1=> "foo", 2=> "bar", 3=> "bim"];
var_dump($x);
var_dump($y);
var_dump($z);

$nl = "\n";
echo "$x[0] $x[1] $x[2] $nl";
echo "$z[1] $z[3] $nl";



# Object
class Person {
    private $nl = "\n";
    public function __construct($name , $age, $wage) {
        $this->name = $name ;
        $this-> age = $age;
        $this->wage = $wage;
    }

    public function __destruct() {
        echo "Person instance was destroyed. ". $this->nl;
    }

    public function printProps() {
        $ret = "name = " . $this->name . $this->nl
            . "age = ". $this->age . $this->nl
            . "wage = ". $this->wage . $this->nl;

        echo $ret ;
    }
}


$p1 =   new Person("foo", 10, 100.0);
$p1->printProps();
$p2 = new Person("bar", 20, 200.0);
$p2->printProps();

var_dump($p1);



# NULL
$x = null ;
var_dump($x);
var_dump(null);


# Resource
/*
 * for example , pointer to database connection -> we have to manually release resources .
 */