<?php
 session_start();
 define ("NL", "<br/>");
 echo "favcolor = ". $_SESSION["favcolor"]. NL
. "favanimal = ". $_SESSION["favanimal"]. NL ;

 print_r($_SESSION);

# session_unset();
session_destroy();
?>