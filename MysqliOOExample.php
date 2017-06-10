<?php
define ("NL", "\n");

$servername = "127.0.0.1";
$username = "root";
$password = "root";


$conn = new mysqli($servername , $username, $password);

if($conn->connect_error) {
    die("Connection failed : ".  $conn->connect_error);
}

echo "Connection successful.". NL ;




$db_name = "php_test";
$table_name = "Worker";

$sql = "drop database $db_name";

$res = $conn->query($sql);
if($res == true) {
    echo "Successfully dropped database $db_name". NL;
} else {
    echo "Could not drop database $db_name". NL;
}


$sql = "create database $db_name";
$res = $conn->query($sql);

if($res == true) {
    echo "Successfully created database $db_name". NL;
} else {
    echo "Could not create database $db_name". NL;
}



$sql = "use $db_name";
$conn->query($sql);

# Drop table if exists Worker ;
/*$sql = "drop table $table_name";
$res = $conn->query($sql);

if($res == true) {
    echo "Successfully dropped table $table_name". NL;
} else {
    echo "Could not drop table $table_name, because $conn->error". NL;
}*/

# Create table if not exists Worker (...) ;
$sql = "create table $table_name (
id INTEGER  primary key auto_increment , 
name varchar(50) not null , 
age int not null, 
wage real not null, 
active tinyint not null 
)";

$res = $conn->query($sql);

if($res == true) {
    echo "Successfully created table $table_name". NL;
} else {
    echo "Could not create table $table_name, because $conn->error". NL;
}


require_once  "PhpWorker.php";

/*
 * insert values
 *
 */

$worker_list = array(
   new PhpWorker(0 , "foo", 10, 100.0, 1),
    new PhpWorker(0, "bar", 20, 200.0 , 0),
    new PhpWorker(0, "bim", 30 , 300.0, 1)
);

foreach($worker_list as $worker) {
    $sql = "insert into $table_name (name, age, wage, active)
 VALUES(\"$worker->name\" ,$worker->age, $worker->wage, $worker->active )";
    $res = $conn->query($sql);
    if($res == true) {
        echo "Insert into $table_name successfully.". NL ;
    } else {
        echo "Could not insert into $table_name, because $conn->error". NL ;
    }
}

echo "last inserted id = $conn->insert_id". NL;


$worker_list = [
   new PhpWorker(0, "edu", 40 , 400.0 , 0),
    new PhpWorker(0, "tilos" , 50 , 500, 1),
    new PhpWorker(0, "pako", 60 , 600.0, 0)
];

$sql ="";
foreach($worker_list as $worker) {
   $sql .=  "insert into $table_name (name , age , wage, active) VALUES (
 \"$worker->name\" , $worker->age , $worker->wage , $worker->active
); ";


}


$res = $conn->multi_query($sql);

if($res == true) {
    echo "Successfully inserted multiple rows." . NL ;
} else {
    echo "Could not insert multiple rows , because $conn->error". NL ;
}

echo "Last inserted id = $conn->insert_id ". NL;


# Prepared query
# we do need to close connection and reopen it for prepared stmt
$conn->close();
$conn = new mysqli($servername , $username, $password, $db_name);

$sql = "insert into $table_name (name, age, wage, active) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
# echo "prepared stmt error = $conn->error, and $stmt". NL ;
$worker_list = [
    new PhpWorker(0, "leo", 70, 700.0, 1),
    new PhpWorker(0, "messi", 80, 800.0, 0),
    new PhpWorker(0, "cris", 90, 900.0, 1)
];
$name = "";
$age = $wage = $active = 0 ;
$stmt->bind_param("sidi", $name, $age, $wage, $active);
foreach($worker_list as $worker) {
    $name = $worker->name ;
    $age = $worker->age ;
    $wage = $worker->wage ;
    $active = $worker->active;
    $stmt->execute();
}

$stmt->close();

echo "<<fetch_assoc Results>>". NL ;

$sql = "select * from $table_name";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $age = $row["age"];
        $wage = $row["wage"];
        $active = $row["active"];
        $phpWorker = new PhpWorker($id, $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
}


echo NL ;
echo "<<fetch_row Results>>". NL;
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_row()) {
        $id = $row[0];
        $name = $row[1];
        $age = $row[2];
        $wage = $row[3];
        $active = $row[4];
        $phpWorker = new PhpWorker($id, $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
} else {
    echo "0 result". NL ;
}

# Delete example
$sql = "delete from $table_name where id > ?";
$stmt = $conn->prepare($sql);
if(!$stmt) {
    echo "Could not prepare".NL ;
} else {
    echo "Could prepare". NL ;
    $stmt->bind_param("i", $id);
    $id = 4 ;
    $stmt->execute();
}
$stmt->close();
$sql = "select * from $table_name" ;
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $age = $row["age"];
        $wage = $row["wage"];
        $active = $row["active"];
        $phpWorker = new PhpWorker($id, $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
} else {
    echo "0 result".NL ;
}
$result->close();


# update example
# $conn->close();
# $conn = new mysqli($servername, $username, $password , $db_name);
$sql = "update $table_name set name = ? , age = ?, wage = ? , active = ? where id = ?";
$stmt = $conn->prepare($sql) ;
if(!$stmt) {
    echo "Could not prepare". NL;
} else {
    echo "Could prepare". NL ;
    $stmt->bind_param("sidii", $name , $age, $wage, $active , $id);
    $name = "new_foo";
    $age = 66 ;
    $wage = 666.6 ;
    $active = 0;
    $id = 1 ;
    $stmt->execute();
}
$stmt->close();

$sql = "select * from $table_name where id = ?";
$stmt = $conn->prepare($sql);
if(!$stmt) {
    echo "Could not prepare".NL ;
} else {
    echo "Could prepare". NL;
    $stmt->bind_param("i", $id);
    $id = 1;
    $result = $stmt->execute();
    var_dump($result);
    $stmt->bind_result($id , $name, $age, $wage, $active);
    // var_dump($stmt->fetch());
    while($stmt->fetch()) {
        $phpWorker = new PhpWorker($id , $name , $age, $wage, $active);
        echo $phpWorker->toString().NL;
    }
}

$stmt->close();


$conn->close();