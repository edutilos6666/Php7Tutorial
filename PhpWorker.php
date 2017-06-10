<?php
class PhpWorker {
    public function __construct($id, $name , $age, $wage, $active) {
        $this->id = $id ;
        $this->name = $name;
        $this->age = $age ;
        $this->wage = $wage ;
        $this->active = $active ;
    }


    function toString() {
        return "[$this->id , $this->name , $this->age, $this->wage, $this->active]";
    }
}