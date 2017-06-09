<?php
 class WorkerDAO {
     private $workers = array();

     function save($worker) {
         # array_push($this->workers, $worker);
         $this->workers[$worker->id] = $worker ;
     }


     function update($id , $worker) {
         $this->workers[$id] = $worker;
     }

     function remove($id) {
        unset($this->workers[$id]);
     }

     function findById($id) {
        return $this->workers[$id];
     }

     function findAll() {
       return array_values($this->workers);
     }
 }