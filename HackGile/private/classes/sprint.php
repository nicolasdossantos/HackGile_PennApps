<?php

class sprint
{
    public $name;
    public $duration; //total time
    public $stories = array(); //all tasks on project
    public $countdown; //time remaining
    public $doAddStory = false;

    public function __construct($name, $duration) {
        $this->name = $name ?? '';
        $this->duration =  60 * 60 * $duration ?? 0;
    }



    public function addStory($args=[])
    {
        $this->doAddStory = true;
        $this->stories[] = new story($args);
        $sql = "INSERT INTO stories (priority, complete, name, 
            description) VALUES(" . $_POST['priority'] . " , " . 0 . " , " .
            $_POST['name'] . " , " . $_POST['description'] . ") WHERE sprintId = " .
            $_POST['sprintID'];
        $result = self::$database->query($sql);
        return $result;

    }


    public function startSprint($duration) {
        $this->countdown = $duration;
    }

    public function alertTime() {
        $hours = $this->duration / 60 / 60;
        $minutes = $this->duration / 60 % 60;
        return sprintf("%2d:%02d", $hours, $minutes);
    }

    public function getStatusColor(){

    }
}