<?php

class project
{

    public $name;
    public $description;
    public $max_members;
    public $git_link;
    public $hackathon_length;
    public $hackathon_name;
    public $members= array() ;
    public $sprints = [];
    public $tasks = [];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? 0;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->max_members = $args['max_members'] ?? 5;
        $this->git_link = $args['git_link'] ?? '';
        $this->hackathon_length = $args['hackathon_length'] ?? 24;

    }

    public function is_admin($member)
    {
        if($member->is_admin){
            return true;
        }else{
            return false;
        }
    }

    public function add_member($member)
    {
        $this->members[] = $member;
    }

    public function remove_member($member)
    {
        if (($key = array_search($member, $this->members)) !== false) {
            unset($this->members[$key]);
        }

    }

    public function add_admin($member)
    {
        $member->is_admin = true;
    }

    public function add_story($args)
    {
        $new_story = new story($args);
        $this->tasks[] = $new_story;

        return $new_story;

    }

    public function set_max_number_members($max_members)
    {
        $this->max_members = $max_members;
    }

    public function create_sprint($name, $duration)
    {
        $newSprint = new sprint($name,$duration);
        return $newSprint;
    }

    public function number_of_sprints()
    {
        return count($this->sprints);
    }

    private static $default_project = null;

    public static function get_default_project1(){
        if (self::$default_project != null) {
            return self::$default_project;
        }
        $args = array(
            'id' => 0,
            'name' => 'HackAgile',
            'description' => 'Bringing Agile to Hackathons',
            'git_link' => 'https://github.com/nicolasdossantos/PennApps',
            'hackathon_length' => 36
        );
        self::$default_project = new project($args);
        return self::$default_project;
    }
}