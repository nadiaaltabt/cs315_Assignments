<!DOCTYPE html>
<html>
<head>
    <title>Add Expenses</title>
</head>
<body>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expense_t";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get expense details from form.
    $name = $_POST["name"];
    $value_e = $_POST["value_e"];
    $date = $_POST["date"];
    $payment = $_POST["payment"];
    $comment= $_POST["comment"];

    try {
        // Prepare and execute SQL query to insert expense into database.
        $sql = "INSERT INTO expense (name, value_e,date,payment,comment) VALUES ('$name', '$value_e','$date','$payment','$comment')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Expense added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

//$conn->close();
// Handle edit request
if (isset($_POST['edit'])) {
    $id_expense = $_POST['id_expense'];
    $value_e = $_POST['value_e'];
    // Update the expense amount in the database
    $sql = "UPDATE expense SET value_e='$value_e' WHERE id_expense='$id_expense'";
    if ($conn->query($sql) === TRUE) {
        echo "Expense updated successfully.";
    } else {
        echo "Error updating expense: " . $conn->error;
    }
}
// Handle delete request
if (isset($_GET['delete'])) {
    $id_expense = $_GET['delete'];
    // Delete the expense from the database
    $sql = "DELETE FROM expense WHERE id_expense='$id_expense'";
    if ($conn->query($sql) === TRUE) {
        echo "Expense deleted successfully.";
    } else {
        echo "Error deleting expense: " . $conn->error;
    }
}
// Fetch all expenses from the database
$sql = "SELECT * FROM expense";
$result = $conn->query($sql);
?>
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
<title>Monthly Expenses</title>
<main><center>
<!-- Insert form -->
<h2>Add Expenses</h2>
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
name catugries:
<input type="text" name="name" placeholder="name"><br><br>
name :
<input type="text" name="name_categories" placeholder="name_categories"><br><br>
Amount:
    <input type="text" name="value_e" placeholder="value_e"><br><br>
payment:
    <input type="text" name="payment" placeholder="payment"><br><br>
date:
    <input type="text" name="date" placeholder="date"><br><br>
comment:
    <input type="text" name="comment" placeholder="comment"><br><br>
    <input type="submit" value="Add Expense">
</form>
<h1>Monthly Expenses</h1>
<table>
<tr>
<th>ID</th>
<th>name</th>

<th>Amount</th>
<th>payment</th>
<th>date</th>
<th>comment</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php  
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['id_expense'] . "</td>";
        echo "<td>". $row['name'] . "</td>";
       // echo "<td>". $row('name_categories') . "</td>";
        echo "<td>". $row['value_e'] . "</td>";
        echo "<td>". $row['payment'] . "</td>";
        echo "<td>". $row['date'] . "</td>";
        echo "<td>". $row['comment'] . "</td>";
        echo "<td><a href='expanses.php?id_expense=" . $row['id_expense'] . "'>Edit</a></td>";
        echo "<td><a href='?delete=" . $row['id_expense'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No expenses found.</td></tr>";
}
?>
</center>
</table>
</main>
<footer>
    <p>Author: Nadia Altabt
   <a href="mailto:hege@example.com" target="_blank">n.atabt@uot.edu.ly</a></p>
</footer>
</body>
</html>


