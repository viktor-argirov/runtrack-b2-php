<?php
$mysqli = new mysqli('localhost', 'root', '123456789', 'lp_official');

if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

function insert_student($mysqli, $email, $fullname, $gender, $birthdate, $grade_id) {
    $query = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssi', $email, $fullname, $gender, $birthdate, $grade_id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = $_POST['input-birthdate'];
    $grade_id = $_POST['input-grade_id'];

    if (insert_student($mysqli, $email, $fullname, $gender, $birthdate, $grade_id)) {
        echo '<p>Étudiant ajouté avec succès.</p>';
    } else {
        echo '<p>Erreur lors de l\'insertion de l\'étudiant.</p>';
    }
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
    <h1>Ajouter un nouvel étudiant</h1>
    <form method="post" action="index.php">
        <label for="input-email">Email :</label>
        <input type="email" name="input-email" id="input-email" required><br>

        <label for="input-fullname">Nom complet :</label>
        <input type="text" name="input-fullname" id="input-fullname" required><br>

        <label for="input-gender">Genre :</label>
        <select name="input-gender" id="input-gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" name="input-birthdate" id="input-birthdate" required><br>

        <label for="input-grade_id">Identifiant de la classe :</label>
        <input type="number" name="input-grade_id" id="input-grade_id" required><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

<?php
$mysqli->close();
?>
