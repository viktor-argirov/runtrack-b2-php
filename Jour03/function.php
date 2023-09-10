<?php
function findOneStudent(int $id){
    
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "lp_official";
    
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$studentData) {
        return null; 
    }
    $student = new Student(
        $studentData['id'],
        $studentData['grade_id'],
        $studentData['email'],
        $studentData['fullname'],
        $studentData['birthdate'],
        $studentData['gender']
    );

    return $student;

}


function findOneGrade(int $id){
        
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "lp_official";
    
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$sql = "SELECT * FROM grade WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();


$gradeData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$gradeData) {
    return null; 
}
$grade = new Grade(
    $gradeData['id'],
    $gradeData['room_id'],
    $gradeData['name'],
    $gradeData['year'],

);

return $grade;

}


function findOneFloor(int $id){

    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "lp_official";
    
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$sql = "SELECT * FROM floor WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();


$flooDrata = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$flooDrata) {
    return null; // Aucun étudiant trouvé avec cet ID
}
$floor= new Floor(
    $flooDrata['id'],
    $flooDrata['name'],
    $flooDrata['level'],

);

return $floor;


}

function findOneRoom(int $id){

    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "lp_official";
    
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$sql = "SELECT * FROM room WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();


$roomData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$roomData) {
    return null; 
}
$room = new Room(
    $roomData['id'],
    $roomData['floor_id'],
    $roomData['name'],
    $roomData['capacity'],

);

return $room;


}