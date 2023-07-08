<?php
$username="root";
$password="";
$database= new PDO("mysql:host=localhost;dbname=expense_t;","root","");
if($database){
    echo 'trou';
}

?>


<?php
session_start();
session_destroy();
header("Location: login.php");
?>