<?php

class story
{
    public $substory = array();
    public $isComplete = false;
    public $isSubstory = false;
    public $parentStory;
    public $title;
    public $description;
    public $priority;

    public function __construct($title, $description, $priority) {
        $this->title = $title ?? '';
        $this->description = $description ?? '';
        $this->priority = $priority ?? 0;
    }

    public function edit_story_title($title){
        $this->title = $title;
    }

    public function edit_story_description($description){
        $this->description = $description;
    }

    public function complete(){
        $this->isComplete = true;
        if ($this->isSubstory){
            $this->parentStory->check_substory_completion();
        }
    }

    public function check_substory_completion(){
        $temp = true;
        foreach($this->substory as $story){
            if($story->isComplete === false){
                $temp = false;
                break;
            }
        }
        $this->isComplete = $temp;
    }

    public function add_substory($task){
        $this->substory[] = $task;
        $task->isSubstory = true;
        $task->parentStory = $this;
    }
    
    function __destruct()
    {
        //foreach($this->substory as $story){
            //unset($story);
        }
    //}
}