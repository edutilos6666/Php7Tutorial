<?php
 require_once "SimpleMath.php";


 $x = 10 ;
 $y = 3 ;
 define ("NL", "\n");

 $sum = add($x, $y);
 $subtract = subtract($x, $y);
 $multiply = multiply($x, $y);
 $divide = divide($x, $y);

 echo "sum = ". $sum . NL
      . "subtract = ". $subtract. NL
      . "multiply = ". $multiply. NL
      . "divide = ". $divide . NL;



  require_once "Worker.php";

  $w = new Worker(1, "foo", 10 , 100.0);
  echo $w->id . NL
  . $w->name. NL
  . $w->age . NL
  . $w->wage. NL;


  require_once  "WorkerDAO.php";

  $dao = new WorkerDAO();
  $dao->save(new Worker(1, "foo", 10, 100.0));
  $dao->save(new Worker(2, "bar", 20 , 200.0));
  $dao->save(new Worker(3, "bim", 30, 300.0));
  $all = $dao->findAll();
  foreach($all as $worker) {
      echo $worker->toString() . NL ;
  }


  $one = $dao->findById(1);
  echo $one->toString() . NL;
  $dao->update(1, new Worker(1, "new_foo", 66, 666.6));
  $one = $dao->findById(1);
  echo $one->toString() . NL ;
  $dao->remove(1);
  $all = $dao->findAll();
  echo "number of person-s  = ". count($all) . NL ;
