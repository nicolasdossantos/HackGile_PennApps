<?php

class project
{
    public $id;
    public $name;
    public $description;
    public $max_members;
    public $git_link;
    public $hackathon_length;
    public $hackathon_name;
    public $members = [];
    public $sprints = [];
    public $tasks = [];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? 0;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->max_members = $args['max_members'] ?? 5;
        $this->git_link = $args['git_link'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->hackathon_length = $args['hackathon_length'] ?? 24;

    }

    public function is_admin()
    {

    }

    public function add_member()
    {

    }

    public function remove_member()
    {

    }

    public function add_admin()
    {

    }

    public function add_story()
    {

    }

    public function set_max_number_members($max_members)
    {
        $this->max_members = $max_members;
    }

    public function create_sprint()
    {

    }


}