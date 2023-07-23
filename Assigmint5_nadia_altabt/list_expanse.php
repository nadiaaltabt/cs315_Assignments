
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expense_t";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST["Update Expense"] )) {
    // Get form data
    $id_expense = $_POST["id_expense "];
    //$name = $_POST["name"];
    $value_e = $_POST["value_e"];
    //$date = $_POST["date"];
    //$payment = $_POST["payment"];
    //$comment= $_POST["comment"];

    // Update expense in the database
    $sql = "UPDATE expense SET value_e = '$value_e' WHERE id_expense = '$id_expense'";
    if ($conn->query($sql) === TRUE) {
        echo "Expense updated successfully.";
    } else {
        echo "Error updating expense: " . $conn->error;
    }
}

// Fetch expenses from the database
$sql = "SELECT * FROM expense";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Expenses</title>
</head>
<body>

<h2>Update Expenses</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id_expense">Expense ID:</label>
    <select name="id_expense">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row['id_expense']; ?>"><?php echo $row['id_expense']; ?></option>
        <?php } ?>
    </select><br><br>

    <label for="value_e">New Amount:</label>
	
    <input type="text" name="value_e"><br><br>
	
    <input type="submit" value="Update Expense"name="Update Expense" >
</form>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>