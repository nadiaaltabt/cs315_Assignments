<!DOCTYPE html>
<html lang="en">
<head>
	<title>categories</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
session_start();
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=expense_t;", "root", "");
if($database){
    echo 'true';
}

if(isset($_POST['save'])){
    echo 'true1';
    $checkname = $database->prepare("SELECT * FROM categories WHERE   name_categories=:name_categories");
    echo 'true2';
    $name_categories = $_POST['name_categories'];
   // $id_user = $_POST['id_user'];

    $checkname->bindParam(":name_categories", $name_categories);
    $checkname->bindParam(":id_user", $id_user);
    $checkname->execute();
    echo 'true3';
    if($checkname->rowCount() > 0){
        
        echo 'Duplicate name categories found in database';
    }else{
       
        $name_categories = $_POST['name_categories'];
        $comment= $_POST['comment'];
        $value= $_POST['value'];
        $addcat= $database->prepare("INSERT INTO categories(id_categories,id_user,name_categories, comment, value) VALUES(:id_categories,:id_user,:name_categories, :comment, :value)");
        $addcat->bindParam(":id_categories", $id_categories);
        $addcat->bindParam(":name_categories", $name_categories);
        $addcat->bindParam(":comment", $comment);
        $addcat->bindParam(":value", $value);
        $addcat->bindParam(":id_user", $id_user);
        if($addcat->execute()){
            echo 'add category successful';
            header("location:http://localhost/Assigmint3_nadia_altabt/catugre.php",true);
        }else{
            echo 'Error';
        }
    }
}
    

 
?>

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
			
			<?php 
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

<body>

<main>
	<center>
    <br><br>
 <h1 ><em><strong>Add categories </strong></em></h1>

	<div class="view" >
	
	<form  method="POST"  >
    <br><br> <br><br> <br><br>
  <label for="name_categories"><em><strong>name_categories:</em></strong></label>
  <input type="text" id="name_categories" name="name_categories" required   ><br>
  <br><br>
  <label for="value"><em><strong>the amount:</em></strong></label>
  <input type="text" id="value" name="value" required   ><br>
  <br>
  <label for="comment"><em><strong>comment:</em></strong></label>
  <input type="text" id="comment" name="comment" required   ><br>
  <br>
  <button type="save" name="save"value="save">save</button>
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