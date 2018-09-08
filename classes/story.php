<?php

class story
{
    public $substory = array();
    public $isComplete = false;
    public $priority;
    public $title;
    public $description;

    public function __construct($args=[]) {
        $this->title = $args['title'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->priority = $args['priority'] ?? '';
    }

    public function edit_story_title(){

    }

    public function edit_story_description(){

    }

    public function delete_story(){

    }
}