<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "northwindmysql";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola spojenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Funkcia na načítanie údajov z tabuľky a vygenerovanie HTML tabuľky
function fetch_table_data($conn, $table_name) {
    $sql = "SELECT * FROM $table_name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Vygenerovanie HTML tabuľky
        $table_html = "<table border='1'><tr>";
        // Hlavičky tabuľky
        while ($field_info = $result->fetch_field()) {
            $table_html .= "<th>{$field_info->name}</th>";
        }
        $table_html .= "</tr>";
        
        // Dáta tabuľky
        while($row = $result->fetch_assoc()) {
            $table_html .= "<tr>";
            foreach($row as $value) {
                $table_html .= "<td>{$value}</td>";
            }
            $table_html .= "</tr>";
        }
        $table_html .= "</table>";
    } else {
        $table_html = "No records found in $table_name.";
    }
    
    return $table_html;
}

// Načítanie údajov z jednotlivých tabuliek
$zakaznici_table = fetch_table_data($conn, "Zákazníci");
$objednavky_table = fetch_table_data($conn, "Objednávky");
$dodavatelia_table = fetch_table_data($conn, "Dodávatelia");

// Uzavretie spojenia
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Požiadavka 01</title>
</head>
<body>
    <h1>Požiadavka 01</h1>
    <h2>Zákazníci</h2>
    <?php echo $zakaznici_table; ?>
    <h2>Objednávky</h2>
    <?php echo $objednavky_table; ?>
    <h2>Dodávatelia</h2>
    <?php echo $dodavatelia_table; ?>
</body>
</html>
