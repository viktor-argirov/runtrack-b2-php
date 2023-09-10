<?php

class Floor {

    private $id;
    private $name;
    private $level;

    public function __construct(
        int $id = null,
        string $name = "",
        int $level = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getLevel(){
        return $this->level;
    }
    public function setLevel($level){
        $this->level = $level;
    }


    public function __toString() {
        return "Floor ID: " . $this->id . "<br>" .
               "Name: " . $this->name . "<br>" .
               "Level: " . $this->level . "<br>" .
               "<br>";
    }


    function getRooms(){
        
    }
}


?>