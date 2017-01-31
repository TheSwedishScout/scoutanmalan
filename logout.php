<?php 
include ("function.php");          
session_destroy();
//send to start peage
header('Location: index.php');
exit;
?>