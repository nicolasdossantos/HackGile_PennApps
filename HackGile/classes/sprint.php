<?php

class sprint
{
    public $name;
    public $duration; //total time
    public $stories = array(); //all tasks on project
    public $countdown; //time remaining
    public $doAddStory = false;

    public function __construct($args = []) {
        $this->name = $args['name'] ?? '';
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

}