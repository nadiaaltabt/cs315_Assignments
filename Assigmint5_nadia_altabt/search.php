<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expense_t";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $sql = "SELECT * FROM expense WHERE name LIKE '%$name%' AND date LIKE '%$date%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $x['y']= "Expense ID: " . $row["id_expense"] . "<br>";
                $x['m']= "name: " . $row["name"] . "<br>";
                $x['a']= "Amount: $" . $row["value_e"] . "<br>";
                $x['c']= "Date: " . $row["date"] . "<br>";
                $x['k']= "payment: " . $row["payment"] ."<br>";
                $x['l']="comment: " . $row["comment"] ."<br>";

            }
        } else {
            $x['d']="No expenses found.";
        }
    }

    $conn->close();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense Search</title>
   
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
            <li><a href="expanses.php">expanses </a></li>
            <li><a href="search.php">search </a></li>
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
    <main><center>
        <div class="sin_box">
            <br><br>
<h2>Expense Search</h2>
<form method="post" action="">
    <label for="name">Category name:</label>
    <input type="text" name="name" id="name">
    <br><br>
    <label for="date">Date:</label>
    <input type="date" name="date" id="date">
    <br><br>
    <div class="x">
<?php
   
   if(isset($x['d']))
    { 
        echo  $x['d'] ;
    }
    ?>
    </div>

    <input type="submit" name="submit" value="Search">
</form>
<div>
<?php
   
   if(isset($x['y']))
    { 
        echo  $x['y'] ;
        
    }
    if(isset($x['m']))
    { 
        echo  $x['m'] ;
        
    }
    if(isset($x['a']))
    { 
        echo  $x['a'] ;
        
    }
    if(isset($x['c']))
    { 
        echo  $x['c'] ;
        
    }
    if(isset($x['k']))
    { 
        echo  $x['k'] ;
        
    }
    if(isset($x['l']))
    { 
        echo  $x['l'] ;
        
    }
    ?>
    </div>
</div>
</center>
</main>
<footer>
    <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>
</footer>
</body>
</html>