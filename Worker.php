<?php
class Worker {
   # private $nl = "\n";
    public function __construct($id, $name, $age, $wage) {
    $this->id = $id ;
    $this->name = $name;
    $this->age = $age ;
    $this->wage = $wage ;
    }

    function __destruct() {

    }


    function setId($id) {
        $this->id = $id;
    }

    function getId() {
       return $this->id ;
    }

    function setName($name) {
       $this->name = $name;
    }

    function getName() {
      return $this->name;
    }

    function setAge($age) {
      $this->age = $age ;
    }

    function getAge() {
       return $this->age ;
    }

    function setWage($wage) {
        $this->wage = $wage;
    }

    function getWage() {
       return $this->wage ;
    }

    function toString() {
        return "[$this->id, $this->name, $this->age, $this->wage]";
    }
}