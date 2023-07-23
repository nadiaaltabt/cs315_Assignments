<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expense_t";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to handle exceptions and display error message
function handleException($exception) {
    echo "Error: " . $exception->getMessage();
}

try {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get expense details from form inputs
        $id_expense = $_POST["id_expense"];
        $name = $_POST["name"];
        $Amount = $_POST["value_e"];
        $date = $_POST["date"];
        $payment = $_POST["payment"];
        $id_categories = $_POST["id_categories"];

        // Update expense in the database
        $sql = "UPDATE expenses SET name='$name', value_e=$Amount, id_categories=$id_categories,date=:$date,payment=:$payment WHERE id_expense=$id_expense";
        
        if (mysqli_query($conn, $sql)) {
            echo "Expense updated successfully.";
        } else {
            throw new Exception("Error updating expense: " . mysqli_error($conn));
        }
    }

    // Fetch categories from categories table
    $categoriesSql = "SELECT * FROM categories";
    $categoriesResult = mysqli_query($conn, $categoriesSql);
    
} catch (Exception $e) {
    handleException($e);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify Expenses</title>
</head>
<body>
    <h1>Modify Expenses</h1>
    
    <?php
    // Display form to modify expenses
    $expensesSql = "SELECT * FROM expense";
    $expensesResult = mysqli_query($conn, $expensesSql);

    if (mysqli_num_rows($expensesResult) > 0) {
        while ($row = mysqli_fetch_assoc($expensesResult)) {
           
        $id_expense = $_POST["id_expense"];
        $name = $_row["name"];
        $Amount = $_row["value_e"];
        $date = $_row["date"];
        $payment = $_row["payment"];
        $id_categories = $_row["id_categories"];

            echo "<form method='POST' action=''>
                    <input type='hidden' name='id_expense' value='$id_expense'>
                    <label for='name'>name:</label>
                    <input type='text' name='name' value='$name'><br>
                    <label for='value_e'>Expense Amount:</label>
                    <input type='text' name='date' value='$date'><br>
                    <label for='date'>date:</label>
                    <input type='text' name='payment' value='$payment'><br>
                    <label for='payment'>payment:</label>
                    <input type='number' name='value_e' value='$Amount'><br>
                    <label for='id_categories'>id_categories:</label>
                    <select name='id_categories'>";
            
            // Display categories as options in the select dropdown
            if (mysqli_num_rows($categoriesResult) > 0) {
                while ($categoryRow = mysqli_fetch_assoc($categoriesResult)) {
                    $categoryOptionId = $categoryRow["id_categories"];
                    $categoryOptionName = $categoryRow["name"];

                    // Set the selected option based on the expense's category
                    if ($categoryId == $categoryOptionId) {
                        echo "<option value='$categoryOptionId' selected>$categoryOptionName</option>";
                    } else {
                        echo "<option value='$categoryOptionId'>$categoryOptionName</option>";
                    }
                }
            }

            echo "</select><br>
                  <input type='submit' value='Update Expense'>
                  </form><br>";
        }
    } else {
        echo "No expenses found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>