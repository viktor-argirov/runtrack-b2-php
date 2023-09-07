<?php 
$mysqli = new mysqli('localhost', 'root', '123456789', 'lp_official');

if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

function find_all_students($mysqli) {
    $students = array();

    $query = "SELECT * FROM student";
    $result = $mysqli->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        $result->free();
    }

    return $students;
}

$all_students = find_all_students($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des étudiants</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        <?php foreach ($all_students as $student) : ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['grade_id']; ?></td>
                <td><?php echo $student['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php
$mysqli->close();
?>