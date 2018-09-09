<?php

class story extends Database
{
    static protected $table_name = 'stories';
    static protected $db_columns = ['id', 'priority', 'complete', 'name', 'description', 'claimed_by', 'sprint_id', 'project_id'];


    public $id;
    public $priority;
    public $complete;
    public $name;
    public $description;
    public $claimed_by;
    public $sprint_id;
    public $project_id;


    public function __construct($description, $priority, $project_id, $name)
    {
        $this->name = $name ?? '';
        $this->priority = $priority ?? '3';
        $this->project_id = $project_id ?? 1;
        $this->description = $description ?? '';

    }

    public function set_sprint_id($sprint_id){
        $this->sprint_id = $sprint_id;
    }

    public function claim_story($memberId){
        $this->claimed_by = $memberId;
    }


}