<?php
define("NL", "\n");

function checkNumber($number) {
    if ($number > 1) {
        throw new Exception("$number must be <= 1");
    }
}

try {
  checkNumber(100);
} catch(Exception $ex) {
    echo $ex->getMessage() . NL ;
} finally {
   echo "finally block will be always executed.". NL ;
}



class CustomException extends Exception {
    public function errorMessage() {
        $line = $this->getLine();
        $file = $this->getFile();
        $message = $this->getMessage();
        return "Line = $line , File = $file , Message = $message". NL ;
    }
}


$email = "example@bar.com";
try {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        throw new CustomException($email);
    }

    if(strpos($email, "example") !== false) {
        throw new Exception("email is example email.");
    }
} catch(CustomException $ex) {
  echo $ex->errorMessage();
} catch(Exception $ex) {
echo $ex->getMessage(). NL ;
} finally {

}

