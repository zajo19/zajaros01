<?php
require_once "connect.php";

// požiadavka 01
echo "<h1>požiadavka 01</h1>";

echo "<h2>Zákazníci</h2>";
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

echo "<h2>Objednávky</h2>";
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

echo "<h2>Dodávatelia</h2>";
$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

// požiadavka 02
echo "<h1>požiadavka 02</h1>";
$sql = "SELECT * FROM customers ORDER BY country, companyName";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

// požiadavka 03
echo "<h1>požiadavka 03</h1>";
$sql = "SELECT * FROM orders ORDER BY orderDate";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

// požiadavka 04
echo "<h1>požiadavka 04</h1>";
$sql = "SELECT COUNT(*) AS count FROM orders WHERE YEAR(orderDate) = 1997";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Počet objednávok v roku 1997: " . $row['count'];

// požiadavka 05
echo "<h1>požiadavka 05</h1>";
$sql = "SELECT contactName FROM customers WHERE contactTitle LIKE '%Manager%' ORDER BY contactName";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['contactName'] . "<br>";
    }
}

// požiadavka 06
echo "<h1>požiadavka 06</h1>";
$sql = "SELECT * FROM orders WHERE orderDate = '1997-05-19'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
}

$conn->close();
?>
