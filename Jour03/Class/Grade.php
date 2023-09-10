<?php

class Grade {

    private $id;
    private $room_id;
    private $name;
    private $year;

    public function __construct(
        int $id = null,
        int $room_id = null,
        string $name = "",
        string $year = ""
    )
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getRoom_id(){
        return $this->room_id;
    }

    public function setRoom_id($room_id){
        $this->room_id = $room_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getYear(){
        return $this->year;
    }
    public function setYear($year){
        $this->year = $year;
    }

    public function __toString() {
        return "Grade ID: " . $this->id . "<br>" .
               "Room ID: " . $this->room_id . "<br>" .
               "Name: " . $this->name . "<br>" .
               "Year: " . $this->year . "<br>" .
               "<br>";
    }

    function getStudents(){

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
    
        $sql = "SELECT * FROM student WHERE grade_id = :grade_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':grade_id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        
        $studentsData = $stmt->fetchALL(PDO::FETCH_ASSOC);
    

        $students = [];

        foreach ($studentsData as $studentData) {
            $student = new Student(
                $studentData['id'],
                $studentData['grade_id'],
                $studentData['email'],
                $studentData['fullname'],
                $studentData['birthdate'],
                $studentData['gender']
            );
            $students[] = $student;
    }
    return $students;
    
}
}

?>