<!DOCTYPE html>
<html>
<head>
 <title>Signup</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=expense_t;", "root", "");


        if(isset($_POST['register'])){
            $checkemail = $database->prepare("SELECT * FROM datauser WHERE email=:email");
            $email = $_POST['email'];
           
            $checkemail->bindParam(":email", $email);
            $checkemail->execute();
        
            if($checkemail->rowCount() > 0){
                echo 'Duplicate email found in database';
            }else{
                $f_name = $_POST['f_name'];
                $l_name = $_POST['l_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $Confirmpassword = $_POST['Confirmpassword'];
                $username = $_POST['username'];
                
            
                $adduser= $database->prepare("INSERT INTO datauser(f_name, l_name, email, phone, password, Confirmpassword, username)
                 VALUES(:f_name, :l_name, :email, :phone, :password, :Confirmpassword, :username)");
               
               
                $adduser->bindParam(":f_name", $f_name);
                $adduser->bindParam(":l_name", $l_name);
                $adduser->bindParam(":email", $email);
                $adduser->bindParam(":phone", $phone);
                $adduser->bindParam(":password",$password);
                $adduser->bindParam(":Confirmpassword",$Confirmpassword );
                $adduser->bindParam(":username", $username);
            
                if($adduser->execute()){
                    echo 'Registration successful';
                    header("location:http://localhost/Assigmint3_nadia_altabt/login.php",true);
                }else{
                    echo 'Error';
                }
            }
        }
    

?>    




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
			<li><a href="singup.php">Singup</a></li>
			<li><a href="login.php">Login </a></li>
		
		</ul>

</nav>


<main>
<center>
    <br><br>
 <h1 ><em><strong>Welcome to the site's <br>subscription page</strong></em></h1>
<div class="sin_box">
    <br>
<h3 ><em><strong>User Registration</em></strong></h3>
 <form   method="post"  >
    <br><br>
  <label for="f_name"><em><strong>first_Name:</em></strong></label>
  <input type="text" id="f_name" name="f_name" required  minlength="10" maxlength="15" ><br>
  <br>
  <label for="l_name"><em><strong>last_Name:</em></strong></label>
  <input type="text" id="l_name" name="l_name" required  minlength="10" maxlength="15" ><br>
  <br>
  <label for="username"><em><strong>userName:</em></strong></label>
  <input type="text" id="username" name="username"  required  minlength="10" maxlength="15"><br>
  <br>
  <label for="email"><em><strong>Email:</em></strong></label>
  <input type="email" id="email" name="email"  class="form-control" required><br>
  <br>
  <label for="phone"><em><strong>phone:</em></strong></label>
  <input type="text" id="phone" name="phone" required   maxlength="10" ><br>
  <br>
  <label for="password"><em><strong>Password:</em></strong></label>
  <input type="password" id="password" name="password" class="form-control" required pattern="a-@!%$*^.A" title="most contion at least one number and one uppercase and lowercase letter and symbols, and at least 8 or more charetar"><br>
  <br>
  <label><em><strong>Confirm Password:</em></strong></label>
  <input type="password" name="Confirmpassword" class="form-control" required  pattern="a-@!%$*^.A" minlength="8"  title="most contion at least one number and one uppercase and lowercase letter and symbols, and at least 8 or more charetar" >
  <br><br>
  <div class="x">
    <?php
  if(isset($x['y']))
  { 
      echo  $x['y'] ;
  }
  ?></div>

  <br>
  <button type="submit" name="register"value="register">register</button>
 </form>
</div></center>
</main>
<footer><p>Author: Nadia Altabt 
                <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>
    </footer>
</body>
</html>
