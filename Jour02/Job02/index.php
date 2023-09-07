<?php
$mysqli = new mysqli('localhost', 'root', '123456789', 'lp_official');

if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

function find_one_student($mysqli, $email) {
    $student = array();

    $query = "SELECT * FROM student WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $student = $result->fetch_assoc();
    }

    $stmt->close();

    return $student;
}

if (isset($_GET['input-email-student'])) {
    $email = $_GET['input-email-student'];
    $student_info = find_one_student($mysqli, $email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rechercher un étudiant par email</h1>
    <form method="get" action="index.php">
        <label for="input-email-student">Email de l'étudiant :</label>
        <input type="text" name="input-email-student" id="input-email-student" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php if (isset($student_info) && !empty($student_info)) : ?>
        <h2>Résultat :</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
            <tr>
                <td><?php echo $student_info['id']; ?></td>
                <td><?php echo $student_info['grade_id']; ?></td>
                <td><?php echo $student_info['email']; ?></td>
            </tr>
        </table>
    <?php elseif (isset($_GET['input-email-student'])) : ?>
        <p>Aucun étudiant trouvé avec cet email.</p>
    <?php endif; ?>
</body>
</html>

<?php
$mysqli->close();
?>
