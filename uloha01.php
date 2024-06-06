<?php
include 'connect.php';

function display_table($result, $table_name) {
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr>";
        // Fetch field names
        $field_info = $result->fetch_fields();
        foreach ($field_info as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";
        // Fetch data
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $data) {
                echo "<td>{$data}</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    } else {
        echo "0 results in table {$table_name}.<br>";
    }
}

// Request 01
echo "<h1>Request 01</h1>";
$sql = "SELECT * FROM Customers";
$result = $conn->query($sql);
display_table($result, "Customers");

$sql = "SELECT * FROM Orders";
$result = $conn->query($sql);
display_table($result, "Orders");

$sql = "SELECT * FROM Suppliers";
$result = $conn->query($sql);
display_table($result, "Suppliers");

// Request 02
echo "<h1>Request 02</h1>";
$sql = "SELECT * FROM Customers ORDER BY country, name";
$result = $conn->query($sql);
display_table($result, "Customers");

// Request 03
echo "<h1>Request 03</h1>";
$sql = "SELECT * FROM Orders ORDER BY date";
$result = $conn->query($sql);
display_table($result, "Orders");

// Request 04
echo "<h1>Request 04</h1>";
$sql = "SELECT COUNT(*) as count FROM Orders WHERE YEAR(date) = 1995";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Number of orders in 1995: " . $row['count'] . "<br>";
} else {
    echo "0 results in table Orders for year 1995.<br>";
}

// Request 05
echo "<h1>Request 05</h1>";
$sql = "SELECT name FROM Contacts WHERE position = 'manager' ORDER BY name";
$result = $conn->query($sql);
display_table($result, "Contacts");

// Request 06
echo "<h1>Request 06</h1>";
$sql = "SELECT * FROM Orders WHERE date = '1995-09-28'";
$result = $conn->query($sql);
display_table($result, "Orders");

$conn->close();
?>


