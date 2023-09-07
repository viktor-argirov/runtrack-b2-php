<?php
$mysqli = new mysqli('localhost', 'root', '123456789', 'lp_official');


if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

function find_all_students_grades($mysqli) {
    $students = array();

    $query = "SELECT student.email, student.fullname, grade.name FROM student
              LEFT JOIN grade ON student.grade_id = grade.grade_id";
    $result = $mysqli->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        $result->free();
    }

    return $students;
}

$all_students = find_all_students_grades($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des étudiants avec promotions</h1>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Nom complet</th>
            <th>Nom de promotion</th>
        </tr>
        <?php foreach ($all_students as $student) : ?>
            <tr>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['fullname']; ?></td>
                <td><?php echo $student['name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$mysqli->close();
?>
