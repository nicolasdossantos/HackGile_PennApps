<?php

class sprint
{
<<<<<<< HEAD
    public $duration; //total time
    public $stories = array(); //all tasks on project
    public $countdown; //time remaining
    public $doAddStory = false;

    public function __construct($args = []) {
        $this->duration =  $args['duration'] ?? '';
        $this->countdown = $args['countdown'] ?? '';
        $this->stories = $args['stories'] ?? '';
    }

    public function addStory($story) {
        $this->doAddStory = true;
        $this->stories = $story;
    }

    public function startSprint($duration) {
        $this->countdown = $duration;
    }

    public function alertTime() {

    }



=======
    public $number;
>>>>>>> ff75ed50646c96d5aa247a54662054829a282273
}