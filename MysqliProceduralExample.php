<?php
define("NL", "\n");
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$db_name = "php_test";
$table_name = "Worker";


# connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn) {
    die("Connection failed " . mysqli_connect_error());
}

echo "Connection success.". NL ;


# drop table
$sql = "drop table $table_name";
if(mysqli_query($conn, $sql)) {
   echo "Dropped table $table_name successfully." . NL ;
} else {
    echo "Could not drop table $table_name , because ". mysqli_error($conn). NL;
}

#create table
$sql = "create table $table_name (
id int primary key auto_increment , 
name varchar(50) not null, 
age int not null, 
wage real not null, 
active tinyint not null 
)";


if(mysqli_query($conn , $sql)) {
    echo "Created table $table_name successfully.". NL;
} else {
    echo "Could not create table $table_name". mysqli_error($conn). NL ;
}

# insert into table
require_once  "PhpWorker.php";
$worker_list = array(
    new PhpWorker(0 , "foo", 10, 100.0, 1),
    new PhpWorker(0, "bar", 20, 200.0 , 0),
    new PhpWorker(0, "bim", 30 , 300.0, 1)
);

foreach($worker_list as $worker) {
    $sql = "insert into $table_name(name, age, wage, active) VALUES 
(\"$worker->name\" , $worker->age , $worker->wage, $worker->active)";
    if(mysqli_query($conn , $sql)) {
        echo "Successfully inserted into $table_name". NL ;
    } else {
        echo "Could not insert into $table_name, because ". mysqli_error($conn). NL ;
    }
}
echo "Last inserted id = ". mysqli_insert_id($conn). NL ;

# multi_insert
$worker_list = [
    new PhpWorker(0, "edu", 40 , 400.0 , 0),
    new PhpWorker(0, "tilos" , 50 , 500, 1),
    new PhpWorker(0, "pako", 60 , 600.0, 0)
];

$sql = "";
foreach($worker_list as $worker) {
    $sql .= "insert into $table_name (name, age, wage, active) VALUES
(\"$worker->name\", $worker->age, $worker->wage, $worker->active); 
";

}

if(mysqli_multi_query($conn , $sql)) {
    echo "Successfully inserted multiple rows" . NL ;
} else {
    echo "Could not insert multiple rows, because ". mysqli_error($conn). NL ;
}


# prepared stmt
$worker_list = [
    new PhpWorker(0, "leo", 70, 700.0, 1),
    new PhpWorker(0, "messi", 80, 800.0, 0),
    new PhpWorker(0, "cris", 90, 900.0, 1)
];

mysqli_close($conn);
$conn = mysqli_connect($servername, $username, $password, $db_name);
$sql = "insert into $table_name (name, age , wage , active) VALUES (?, ?, ?, ?)";
if($stmt = mysqli_prepare($conn , $sql)) {
    echo "Could prepare". NL;
    mysqli_stmt_bind_param($stmt, "sidi", $name, $age, $wage, $active);
    foreach($worker_list as $worker) {
        $name =  $worker->name ;
        $age = $worker->age ;
        $wage = $worker->wage;
        $active = $worker->active ;
        mysqli_stmt_execute($stmt);
    }
} else {
    echo "Could not prepare, because " . mysqli_error($conn). NL ;
}

mysqli_stmt_close($stmt);


# fetch
echo "<<fetch_assoc Results>>";
$sql = "select * from $table_name";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $age = $row["age"];
        $wage = $row["wage"];
        $active = $row["active"];
        $phpWorker = new PhpWorker($id , $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
}

echo NL . "<<fetch_row Results>>";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_row($result)) {
        $id = $row[0];
        $name = $row[1];
        $age = $row[2];
        $wage = $row[3];
        $active = $row[4];
        $phpWorker = new PhpWorker($id , $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
} else {
    echo "0 result". NL;
}


# delete example
$sql = "delete from $table_name where id > ?";
if($stmt = mysqli_prepare($conn , $sql)) {
  echo "Could prepare". NL;
  mysqli_stmt_bind_param($stmt, "i", $id);
  $id = 4 ;
  mysqli_stmt_execute($stmt);

} else {
    echo "Could not prepare". NL;
}
mysqli_stmt_close($stmt);

$sql = "select * from $table_name";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result)> 0 ) {
    while($row = mysqli_fetch_row($result)) {
        $id = $row[0];
        $name = $row[1];
        $age = $row[2];
        $wage = $row[3];
        $active = $row[4];
        $phpWorker = new PhpWorker($id , $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
}


# update example
$sql = "update $table_name set name = ? , age = ? , wage = ?, active = ? 
where id = ?";
if($stmt = mysqli_prepare($conn, $sql)) {
    echo "Could prepare". NL;
    mysqli_stmt_bind_param($stmt, "sidii", $name, $age, $wage, $active, $id);
    $name = "new_foo";
    $age = 66 ;
    $wage = 666.6;
    $active = 1 ;
    $id = 1 ;
    mysqli_stmt_execute($stmt);
} else {
    echo "Could not prepare". NL;
}
mysqli_stmt_close($stmt);

$sql = "select * from $table_name where id = ?";
if($stmt = mysqli_prepare($conn , $sql)) {
    echo "Could prepare". NL;
    mysqli_stmt_bind_param($stmt , "i", $id);
    $id = 1 ;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id , $name, $age, $wage, $active);
    while(mysqli_stmt_fetch($stmt)) {
        $phpWorker = new PhpWorker($id , $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL ;
    }
} else {
    echo "Could not prepare". NL ;
}

mysqli_stmt_close($stmt);


mysqli_close($conn);
