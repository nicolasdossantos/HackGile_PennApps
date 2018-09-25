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


    public function __construct($arr = [])
    {
        $this->name = $arr['name'] ?? '';
        $this->priority = $arr['priority'] ?? 3;
        $this->project_id = $arr['project_id'] ?? 0;
        $this->description = $arr['description'] ?? '';
        $this->claimed_by = $arr['claimed_by'] ?? 0;
        $this->complete = $arr['complete'] ?? 0;
        $this->sprint_id = $arr['sprint_id'] ?? 0;
    }

    public function set_sprint_id($sprint_id)
    {
        $this->sprint_id = $sprint_id;
    }

    public function claim_story($memberId)
    {
        $this->claimed_by = $memberId;
    }


}