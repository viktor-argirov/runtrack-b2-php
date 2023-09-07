<?php
function connect_to_database() {
    $host = "localhost"; 
    $username = "root"; 
    $password = "123456789"; 
    $database = "lp_official";
    
    $mysqli = new mysqli($host, $username, $password, $database);

    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    return $mysqli;
}

function find_full_rooms() {
    $mysqli = connect_to_database();

    $sql = "SELECT name, capacity, students_present FROM room";

    $result = $mysqli->query($sql);

    $resultats = [];

    while ($row = $result->fetch_assoc()) {
        $salle = $row;
        if ($salle["students_present"] >= $salle["capacity"]) {
            $salle["pleine"] = "Oui";
        } else {
            $salle["pleine"] = "Non";
        }

        $resultats[] = $salle;
    }

    $mysqli->close();

    return $resultats;
}

$salles = find_full_rooms();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Salles</title>
</head>
<body>
    <h1>Liste des Salles</h1>
    <table border="1">
        <tr>
            <th>Nom de la Salle</th>
            <th>Capacité</th>
            <th>Étudiants Présents</th>
            <th>Salle Pleine</th>
        </tr>
        <?php foreach ($salles as $salle) : ?>
            <tr>
                <td><?php echo $salle["name"]; ?></td>
                <td><?php echo $salle["capacity"]; ?></td>
                <td><?php echo $salle["students_present"]; ?></td>
                <td><?php echo $salle["pleine"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
