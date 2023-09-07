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

function find_ordered_students() {
    $mysqli = connect_to_database();

    $sql = "SELECT grade.name AS promotion, student.fullname, student.gender, student.birthdate
            FROM grade
            LEFT JOIN student ON grade.grade_id = student.grade_id
            ORDER BY promotion, student.grade_id";

    $result = $mysqli->query($sql);

    $resultats = [];

    while ($row = $result->fetch_assoc()) {
        $promotion = $row["promotion"];
        $etudiant = [
            "fullname" => $row["fullname"],
            "gender" => $row["gender"],
            "birthdate" => $row["birthdate"]
        ];

        if (!isset($resultats[$promotion])) {
            $resultats[$promotion] = [];
        }
        $resultats[$promotion][] = $etudiant;
    }

    $mysqli->close();

    return $resultats;
}

$promotions_etudiants = find_ordered_students();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Promotions et Étudiants</title>
</head>
<body>
    <h1>Liste des Promotions et Étudiants</h1>
    <table border="1">
        <tr>
            <th>Promotion</th>
            <th>Étudiants</th>
        </tr>
        <?php foreach ($promotions_etudiants as $promotion => $etudiants) : ?>
            <tr>
                <td><?php echo $promotion; ?></td>
                <td>
                    <ul>
                        <?php foreach ($etudiants as $etudiant) : ?>
                            <li><?php echo $etudiant["fullname"] . " " . $etudiant["gender"] . " (Âge: " . $etudiant["birthdate"] . ")"; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
