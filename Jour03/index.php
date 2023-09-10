<?php

include "class/Student.php";
include "class/Floor.php";
include "class/Grade.php";
include "class/Room.php";
include "function.php";


$grade = findOneGrade(3);
$students = $grade->getStudents();

$room = findOneRoom(1);
var_dump($room);
$grades = $room->getGrades($room->getId());
var_dump($grades);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Student list </h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nom complet</th>
            <th>Date de naissance</th>
            <th>Genre</th>
        </tr>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?php echo $student->getId(); ?></td>
                <td><?php echo $student->getEmail(); ?></td>
                <td><?php echo $student->getFullname(); ?></td>
                <td><?php echo $student->getBirthdate(); ?></td>
                <td><?php echo $student->getGender(); ?></td>
            </tr>
        <?php } ?>
    </table>
    <h1>Grade list</h1>
    <?php var_dump($grades);?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Room_ID</th>
            <th>Name</th>
            <th>Year</th>

        </tr>
        <?php foreach ($grades as $gradeBis) { ?>
            <tr>
                <td><?php echo $gradeBis->getId(); ?></td>
                <td><?php echo $gradeBis->getRoom_id(); ?></td>
                <td><?php echo $gradeBis->getName(); ?></td>
                <td><?php echo $gradeBis->getYear(); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>