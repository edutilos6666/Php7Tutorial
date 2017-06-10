<?php
define ("NL", "\n");

#$server = "localhost";
 $server = "127.0.0.1";
$username = "root";
$password = "root";
$db_name = "php_test";
$table_name = "Worker";

try {
  $conn = new PDO("mysql:host=$server;dbname=$db_name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully." . NL ;

  #drop database
  $sql = "drop database $db_name";
  $conn->exec($sql);

  # create database
    $sql = "create database $db_name";
    $conn->exec($sql);

    # use database
    $sql = "use $db_name";
    $conn->exec($sql);

    # drop table
    # $sql = "drop table $table_name";
    # $conn->exec($sql);

    # create table
    $sql = "create table $table_name (
id int primary key auto_increment , 
name varchar(50) not null , 
age int not null, 
wage real not null, 
active tinyint not null 
)";

    $conn->exec($sql);


    # insert data
   require_once  "PhpWorker.php";
    $worker_list = array(
        new PhpWorker(0 , "foo", 10, 100.0, 1),
        new PhpWorker(0, "bar", 20, 200.0 , 0),
        new PhpWorker(0, "bim", 30 , 300.0, 1)
    );

    foreach($worker_list as $worker) {
        $sql = "insert into $table_name(name , age, wage, active) VALUES 
(\"$worker->name\", $worker->age , $worker->wage, $worker->active)";
        $conn->exec($sql);
    }

    echo "Last inserted id = " . $conn->lastInsertId(). NL;


    # insert multiple
    $worker_list = [
        new PhpWorker(0, "edu", 40 , 400.0 , 0),
        new PhpWorker(0, "tilos" , 50 , 500, 1),
        new PhpWorker(0, "pako", 60 , 600.0, 0)
    ];


    $conn->beginTransaction();
   foreach($worker_list as $worker) {
       $sql = "insert into $table_name(name , age, wage, active) VALUES 
(\"$worker->name\", $worker->age , $worker->wage, $worker->active)";
       $conn->exec($sql);
   }

    $conn->commit();


   # prepared stmt
    $worker_list = [
        new PhpWorker(0, "leo", 70, 700.0, 1),
        new PhpWorker(0, "messi", 80, 800.0, 0),
        new PhpWorker(0, "cris", 90, 900.0, 1)
    ];

    /*$sql = "insert into $table_name (name, age, wage, active) VALUES
(:name, :age,:wage, :active)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":wage", $wage);
    $stmt->bindParam(":active", $active);*/

    $sql = "insert into $table_name(name , age, wage, active) VALUES(?,?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $age);
    $stmt->bindParam(3, $wage);
    $stmt->bindParam(4, $active);

    foreach($worker_list as $worker) {
        $name = $worker->name ;
        $age = $worker->age;
        $wage = $worker->wage;
        $active = $worker->active;
        $stmt->execute();
    }

    // $stmt->close();


    # select data
    echo NL. "<<fetch_assoc Results>>". NL;
    $sql = "select * from $table_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    print_r($result);
    foreach($result as $row) {
        $id = $row["id"];
        $name = $row["name"];
        $age = $row["age"];
        $wage = $row["wage"];
        $active = $row["active"];
        $phpWorker = new PhpWorker($id, $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL;
    }


    echo NL. "<<fetch_num Results>>".NL;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row) {
        $id = $row[0];
        $name = $row[1];
        $age = $row[2];
        $wage = $row[3];
        $active = $row[4];
        $phpWorker = new PhpWorker($id, $name, $age, $wage, $active);
        echo $phpWorker->toString(). NL;
    }


    # delete example
    $sql = "delete from $table_name where id > ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1 , $id);
    $id = 4 ;
    $stmt->execute();

    # update example
    $sql = "update $table_name set name = ? , age = ?, wage = ?, active = ? 
where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $age);
    $stmt->bindParam(3, $wage);
    $stmt->bindParam(4, $active);
    $stmt->bindParam(5, $id);
    $name = "new_foo";
    $age = 66 ;
    $wage = 666.6 ;
    $active = 0 ;
    $id = 1;
    $stmt->execute();


    print_r(PDO::getAvailableDrivers());

} catch(PDOException $ex) {
    $conn->rollback();
    die("Connection failed ". $ex->getMessage());
}



$conn = null;