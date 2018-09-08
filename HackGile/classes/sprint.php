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

    public function add_story($story) {
        //$this->doAddStory = true;
        $this->stories[] = $story;
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