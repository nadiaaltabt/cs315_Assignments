<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data_User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<body>
<header id="h">
	<img src="./img/ett.jpg" >
 </header>
 <nav id="navbar">
    <ul class="navcontent">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.html">About us</a></li>
        <li><a href="catugre.php">Add categories </a></li>
        <li><a href="#">Reports</a></li>
        <?php 
        session_start();
if(isset($_SESSION['user'])){
	

		echo 'wellcom   '.$_SESSION['user']->username;
		echo "<form><button type='submit' name='logout'>logout</button> </form>";
	}else{
		header("location:http://localhost/Assigmint3_nadia_altabt/login.php",true);
		die("");
	
	 }
	 if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header("location:http://localhost/Assigmint3_nadia_altabt/login.php",true);
	 }

?>
        
            </ul>
</nav>
<main>
<?php 

if(isset($_SESSION['user'])){
   echo '<center><div class="sin_box">
   <form method="POST">
   <br><br>
   <em><strong>
first_Name:
' .$_SESSION['user']->f_name.'
<br><br>
last_Name:
' .$_SESSION['user']->l_name.' 
<br><br>
userName:
' .$_SESSION['user']->username.'
<br><br>
Email:
' .$_SESSION['user']->email.'
<br><br>
phone:
' .$_SESSION['user']->phone.'
<br><br>
Password:
' .$_SESSION['user']->password.'
<br><br>
Confirm Password:

' .$_SESSION['user']->Confirmpassword.'</em></strong>
<br><br>

</form></center></div>';
}

?>
		
</main>
<footer>
 <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>



</footer>
</body>
</html>