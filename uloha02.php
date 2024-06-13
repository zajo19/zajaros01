<?php
// Pripojenie k databáze
include('connect.php');

// Funkcia na vykonanie SQL dotazu a získanie výsledkov
function executeQuery($conn, $query) {
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return null;
    }
}

echo "<h1>požiadavka 01</h1>";
$query = "SELECT * FROM Zákazníci UNION SELECT * FROM Objednávky UNION SELECT * FROM Dodávatelia";
$result = executeQuery($conn, $query);
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo implode(", ", $row) . "<br>";
    }
} else {
    echo "Žiadne výsledky.";
}

echo "<h1>požiadavka 02</h1>";
$query = "SELECT * FROM Zákazníci ORDER BY krajina, názov";
$result = executeQuery($conn, $query);
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo implode(", ", $row) . "<br>";
    }
} else {
    echo "Žiadne výsledky.";
}

echo "<h1>požiadavka 03</h1>";
$query = "SELECT * FROM Objednávky ORDER BY dátum";
$result = executeQuery($conn, $query);
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo implode(", ", $row) . "<br>";
    }
} else {
    echo "Žiadne výsledky.";
}

echo "<h1>požiadavka 04</h1>";
$query = "SELECT COUNT(*) AS pocet FROM Objednávky WHERE YEAR(dátum) = 1995";
$result = executeQuery($conn, $query);
if ($result) {
    $row = $result->fetch_assoc();
    echo "Počet objednávok v roku 1995: " . $row['pocet'];
} else {
    echo "Žiadne výsledky.";
}

echo "<h1>požiadavka 05</h1>";
$query = "SELECT meno FROM Zákazníci WHERE pozícia = 'manažér' ORDER BY meno";
$result = executeQuery($conn, $query);
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo $row['meno'] . "<br>";
    }
} else {
    echo "Žiadne výsledky.";
}

echo "<h1>požiadavka 06</h1>";
$query = "SELECT * FROM Objednávky WHERE dátum = '1995-09-28'";
$result = executeQuery($conn, $query);
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo implode(", ", $row) . "<br>";
    }
} else {
    echo "Žiadne výsledky.";
}

// Zatvorenie pripojenia k databáze
$conn->close();
?>
