<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php
if(isset($_POST['login'])){
$username="root";    
$password="";
$database= new PDO("mysql:host=localhost;dbname=expense_t;","root","");
$login= $database->prepare("SELECT *FROM datauser WHERE username=:username AND  password=:password");
$login->bindParam("username",$_POST['username']);
$login->bindParam("password",$_POST['password']);
$login->execute();

if($login->rowCount()=== 1){
    
$user = $login->fetchObject();

 if($user->active === 1){
   session_start();
  
 
    $_SESSION['user'] = $user;
 

    
    header("location:http://localhost/Assigmint3_nadia_altabt/home.php",true);
 
 }else{
   #header("location:http://localhost/Assigmint3_nadia_altabt/login.php",true);
   echo 'pless active account';
}
}else{
   # header("location:http://localhost/Assigmint3_nadia_altabt/login.php",true);
    echo ' error';
}
}

?>
<body>
<body>
<header id="h">
	<img src="./img/ett.jpg" >
	
 </header>
 
<nav id="navbar" >
	
		<ul class="navcontent">
			<li><a href="home.php">Home</a></li>
			<li><a href="about.html">About us </a></li>
            <li><a href="catugre.php">Add categories </a></li>
            <li><a href="#">Reports</a></li>
			<li><a href="singup.php">Singup</a></li>
			<li><a href="login.php">Login </a></li>
		
		<br>
        <div class='m'>
            <br>
   <?php
   
   if(isset($x['y']))
    { 
        echo  $x['y'] ;
    }
    ?>
    </div></ul>
</nav>

<main>
    <center>
        <br><br>
<h1 ><em><strong>Wellcom  User </em></strong></h1>
<div class="sin_box">
    <br>
<h3 ><em><strong>Login</em></strong></h3>

 <form  method="post" action="login.php">
  <br><br>
  <label for="username"><em><strong>Username:</em></strong></label>
  <input type="text" name="username" id="username" required  ><br><br>
<br> <br>
  <label for="password"><em><strong>Password:</em></strong></label>
  <input type="password" name="password" id="password" required><br><br>
  <br><br>
  <input type="checkbox" name="remember" ><em><strong>Remember Me </em></strong> <br><br>
  <br><br>

  <div class="x">
   <?php
   
   if(isset($x['y']))
    { 
        echo  $x['y'] ;
    }
    ?>
    </div>
    <br>
  <input type="submit"value="login" name="login">
  
 </form>
    
 </div></center>
</main>
<footer><p>Author: Nadia Altabt 
                <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>
    </footer>
</body>
</html>