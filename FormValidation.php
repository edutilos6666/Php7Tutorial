<!DOCTYPE html>
<html>
<head>
    <style>
        .error {
            color: red ;
        }
    </style>
</head>

<body>
<?php
  $id = $name = $age = $wage = $email =
      $idErr = $nameErr = $ageErr = $wageErr= $emailErr = "";

  $nl = "<br/>";


  function beautify_data($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data ;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      $name = $_POST["name"];
      $age = $_POST["age"];
      $wage = $_POST["wage"];
      $email = $_POST["email"];

     if(empty($id)) {
         $idErr = "id is required." ;
     } else {
         $id = beautify_data($id);
     }

     if(empty($name)) {
         $nameErr = "name is required.";
     } else {
         $name = beautify_data($name);
     }

     if(empty($age)) {
         $ageErr = "age is required.";
     } else {
         $age = beautify_data($age);
     }

     if(empty($wage)) {
         $wageErr = "wage is required.";
     } else {
         $wage = beautify_data($wage);
     }

     if(empty($email)) {
         $emailErr = "email is required.";
     } else {
         $email = beautify_data($email);
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "incorrect email.";
         }
     }
  }

?>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <span class="error">* Required Fields</span>
    <br/>
    id: <input type="text" name="id"
      value="<?php echo $id; ?>"
    />
    <span class="error">* <?php echo $idErr; ?></span>
    <br/><br/>
    name: <input type="text" name="name"
     value="<?php echo $name; ?>"
    />
    <span class="error">* <?php echo $nameErr; ?></span>
    <br/><br/>

    age: <input type="text" name="age"
     value="<?php echo $age; ?>"
    />
    <span class="error">* <?php echo $ageErr; ?></span>
    <br/><br/>

    wage: <input type="text" name="wage"
     value="<?php echo $wage ; ?>"
    />
    <span class="error">* <?php echo $wageErr; ?></span>
    <br/><br/>

    email: <input type="text" name="email"
    value="<?php echo $email; ?>"
    />
    <span class="error">* <?php echo $emailErr; ?></span>
    <br/><br/>

    <input type="submit" />
    <br/>
</form>

<?php
   echo "<h3>Your Input</h3>";
   echo $id . $nl ;
   echo $name . $nl ;
   echo $age . $nl;
   echo $wage. $nl ;
   echo $email. $nl ;
?>
</body>
</html>