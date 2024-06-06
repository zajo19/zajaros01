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

// Požiadavka 01
echo "<h1>požiadavka 01</h1>";
$sql = "SELECT * FROM Zákazníci";
$result = $conn->query($sql);
display_table($result, "Zákazníci");

$sql = "SELECT * FROM Objednávky";
$result = $conn->query($sql);
display_table($result, "Objednávky");

$sql = "SELECT * FROM Dodávatelia";
$result = $conn->query($sql);
display_table($result, "Dodávatelia");

// Požiadavka 02
echo "<h1>požiadavka 02</h1>";
$sql = "SELECT * FROM Zákazníci ORDER BY krajina, názov";
$result = $conn->query($sql);
display_table($result, "Zákazníci");

// Požiadavka 03
echo "<h1>požiadavka 03</h1>";
$sql = "SELECT * FROM Objednávky ORDER BY dátum";
$result = $conn->query($sql);
display_table($result, "Objednávky");

// Požiadavka 04
echo "<h1>požiadavka 04</h1>";
$sql = "SELECT COUNT(*) as pocet FROM Objednávky WHERE YEAR(dátum) = 1995";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Počet objednávok v roku 1995: " . $row['pocet'] . "<br>";
} else {
    echo "0 results in table Objednávky for year 1995.<br>";
}

// Požiadavka 05
echo "<h1>požiadavka 05</h1>";
$sql = "SELECT meno FROM KontaktnéOsoby WHERE pozícia = 'manažér' ORDER BY meno";
$result = $conn->query($sql);
display_table($result, "KontaktnéOsoby");

// Požiadavka 06
echo "<h1>požiadavka 06</h1>";
$sql = "SELECT * FROM Objednávky WHERE dátum = '1995-09-28'";
$result = $conn->query($sql);
display_table($result, "Objednávky");

$conn->close();
?>

