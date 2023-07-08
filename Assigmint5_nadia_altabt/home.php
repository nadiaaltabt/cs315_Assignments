
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
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
			<li><a href="singup.php">Singup</a></li>
			<li><a href="login.php">Login </a></li>
			<li><a href="enfrmiton.php">enfrmiton </a></li>
			
			<?php session_start();
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
	<center>
<table>
      <td>
	<img src="./img/welcom1.jpg" style="margin: 0%;">
		</td>
		
	</table>
	</center>
		
</main>
<footer>
 <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>



</footer>
</body>
</html>