<?php

class Student {

    private $id;
    private $grade_id;
    private $email;
    private $fullname;
    private $birthdate;
    private $gender;

    public function __construct(
        int $id = null, 
        int $grade_id = null, 
        string $email = "",
        string $fullname = "",
        string $birthdate = "",
        string $gender = ""
        ){

        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;

    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getGrade_id() {
        return $this->grade_id;
    }

    public function setGrade_id($grade_id) {
        $this->grade_id = $grade_id;
    }

    
    public function getEmail() { 
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getFullname() {
        return $this->fullname;
    }
    
    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }
    
    public function getBirthdate() {
        return $this->birthdate;
    }
    
    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }
    
    public function getGender() {
        return $this->gender;
    }
    
    public function setGender($gender) {
         $this->gender = $gender;
    }

    public function __toString() {
        return "Student ID: " . $this->id . "<br>" .
               "Grade ID: " . $this->grade_id . "<br>" .
               "Email: " . $this->email . "<br>" .
               "Full Name: " . $this->fullname . "<br>" .
               "Birthdate: " . $this->birthdate . "<br>" .
               "Gender: " . $this->gender . "<br>" .
               "<br>";
    }
}
    
    


?>