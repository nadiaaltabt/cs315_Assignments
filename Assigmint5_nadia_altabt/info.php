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
			<li><a href="home.html">Home</a></li>
			<li><a href="about.html">About us</a></li>
			<li><a href="#">Add categories </a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="singup.php">Singup</a></li>
			<li><a href="login.php">Login </a></li>
			<li><a href="login.php">Logout </a></li>
		</ul>
</nav>

<body>

<main>
	<center>
	<div class="view" >
	<form >
		<h1><em><strong>User Data</em></strong></h1>
		<br><br>
   <h2><em><strong> User Name:</em></strong> <?php echo $_GET['username'];?></2h>
   <br><br>
   <h2><em><strong> first_Name:</em></strong> <?php echo $_GET['f_name'];?></2h>
   <br><br>
   <h2><em><strong> last_Name:</em></strong> <?php echo $_GET['l_name'];?></2h> 
   <br><br>
   <h2><em><strong> phone:</em></strong> <?php echo $_GET['phone'];?></2h>
   <br><br>
   <h2><em><strong> Email:</em></strong> <?php echo $_GET['email'];?></2h>
   <br><br>
   <h2><em><strong> password: </em></strong><?php echo $_GET['password'];?></2h>
   <br>
   


</form>

</div>
</center>
		
</main>
<footer>
    <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>
</footer>
</body>
</html>