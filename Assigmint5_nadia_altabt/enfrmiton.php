
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
        
            </ul>
</nav>
<main>
<?php 
session_start();
if(isset($_SESSION['user'])){
   echo '<center><div class="sin_box">
   <form method="POST">
   <br><br>
first_Name:
<input type="text" id="f_name" name="f_name" value="' .$_SESSION['user']->f_name.'"  required / >
<br><br>
last_Name:
<input type="text" id="l_name" name="l_name"value="' .$_SESSION['user']->l_name.'" required / >
<br><br>
userName:
<input type="text" id="username" name="username" value="' .$_SESSION['user']->username.'" required / >
<br><br>
Email:
<input type="email" id="email" name="email"  value="' .$_SESSION['user']->email.'" required/>
<br><br>
phone:
<input type="text" id="phone" name="phone"  value="' .$_SESSION['user']->phone.'" required  /  >
<br><br>
Password:
<input type="" id="password" name="password" value="' .$_SESSION['user']->password.'" class="form-control" required pattern="a-@!%$*^.A" title="most contion at least one number and one uppercase and lowercase letter and symbols, and at least 8 or more charetar"/><br>
<br><br>
Confirm Password:
<input type="" name="Confirmpassword" value="' .$_SESSION['user']->Confirmpassword.'"  class="form-control" required  pattern="a-@!%$*^.A" minlength="8"  title="most contion at least one number and one uppercase and lowercase letter and symbols, and at least 8 or more charetar"/ >

<br><br>
<button type="submit" name="update" value="' .$_SESSION['user']->id_user.'">update</button>
</form></center></div>';
if(isset($_POST['update'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost;dbname=expense_t;", "root", "");
    $update= $database->prepare("UPDATE datauser SET f_name=:f_name, l_name=:l_name,username=:username,
    password=:password,Confirmpassword=:Confirmpassword,phone=:phone,email=:email WHERE id_user=:id_user ");
    $update->bindParam("f_name", $_POST['f_name']);
    $update->bindParam("l_name", $_POST['l_name']);
    $update->bindParam("username", $_POST['username']); 
    $update->bindParam("password", $_POST['password']);
    $update->bindParam("Confirmpassword", $_POST['Confirmpassword']); 
    $update->bindParam("phone", $_POST['phone']);
    $update->bindParam("email", $_POST['email']);
    $update->bindParam("id_user", $_POST['update']);
    if($update->execute()){
        echo 'done update';
        $user=$database->prepare("SELECT *FROM datauser WHERE id_user=:id_user ");
        $user->bindParam('id_user',$_POST['update']);
        $user->execute();
       
        $_SESSION['user'] = $user->fetchObject();
        header("refresh:2;");
    } else {
      
        echo 'Error update';
    }
}
}

?>
		
</main>
<footer>
 <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>



</footer>
</body>
</html>