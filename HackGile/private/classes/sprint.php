<?php

class sprint extends Database
{
    static protected $table_name = 'sprints';
    static protected $db_columns = ['id', 'name', 'duration', 'project_id'];
    public $id;
    public $name;
    public $duration; //total time
    public $stories = array(); //all tasks on project
    public $project_id;
    public $countdown; //time remaining
    public $doAddStory = false;

    public function __construct($name, $duration, $project_id) {
        $this->name = $name ?? '';
        $this->duration =  sprintf("%02d:00:00", $duration);
        $this->project_id = $project_id;
    }


    public function add_story($title, $description, $priority)
    {
        $this->doAddStory = true;
        $newStory = new story($title, $description, $priority);
        $this->stories[] = $newStory;
//        $sql = "INSERT INTO stories (priority, complete, name,
//            description) VALUES(" . $_POST['priority'] . " , " . 0 . " , " .
//            $_POST['name'] . " , " . $_POST['description'] . ") WHERE sprintId = " .
//            $_POST['sprintID'];
//        $result = $database->query($sql);
        return $newStory;
    }


    public function startSprint($duration) {
        $this->countdown = $duration;
    }

    public function alertTime() {
        $hours = $this->duration / 60 / 60;
        $minutes = $this->duration / 60 % 60;
        return sprintf("%2d:%02d", $hours, $minutes);
    }

    public function getCompletionPercentage() {
        $completeCount = 0;
        foreach($this->stories as $story){
            if($story->isComplete){
                $completeCount++;
            }
        }
        if(count($this->stories) == 0) {
            return 100;
        }
        $percentage  = (100 * $completeCount / count($this->stories));
        return $percentage;
    }

    public function getStatusColor(){
        if($this->getCompletionPercentage() == 100){
            return "green";
        }
        else{
            return "teal";
        }
    }
}