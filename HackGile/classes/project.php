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

    public function set_max_number_members($max_members)
    {
        $this->max_members = $max_members;
    }

    public function create_sprint($name, $duration)
    {
        $newSprint = new sprint($name,$duration);
        array_push($this->sprints, $newSprint);

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
            'hackathon_length' => 36,

        );
        self::$default_project = new project($args);

        $sprint1 = self::$default_project->create_sprint("Initial Sprint", 2);
        $story1_1 = new story("Assess Knowledge", "Determine the technical skills and knowledge of each team member", 1);
        $story1_1->add_member(member::GetDefaultMember1());
        $story1_1->add_member(member::GetDefaultMember2());
        $story1_1->add_member(member::GetDefaultMember3());
        $story1_1->complete();
        $story1_2 = new story("Discuss Idea", "Discuss the ideas and goals for the final project", 1);
        $story1_2->add_member(member::GetDefaultMember1());
        $story1_2->add_member(member::GetDefaultMember2());
        $story1_2->add_member(member::GetDefaultMember3());
        $story1_2->complete();
        $story1_3 = new story("Determine Technologies", "Find the best suited technologies for this project", 1);
        $story1_3->add_member(member::GetDefaultMember1());
        $story1_3->add_member(member::GetDefaultMember2());
        $story1_3->add_member(member::GetDefaultMember3());
        $story1_3->complete();

        $sprint1->add_story($story1_1);
        $sprint1->add_story($story1_2);
        $sprint1->add_story($story1_3);


        $sprint2 = self::$default_project->create_sprint("Database Design", 2);
        $story2_1 = new story("Map out structure", "Write out the needed properties and how they'll be connected", 1);
        $story2_1->add_member(member::GetDefaultMember2());
        $story2_2 = new story("Draft MySQL file", "Create sql script that creates the above table", 1);
        $story2_2->add_member(member::GetDefaultMember2());
        //$story2_1->add_substory(($story2_2));
        $story2_3 = new story("Create Functions", "Mock up important functions that allows use to use the data in the database", 1);
        $story2_3->add_member(member::GetDefaultMember1());
        $story2_3->add_member(member::GetDefaultMember3());

        $sprint2->add_story($story2_1);
        $sprint2->add_story($story2_2);
        $sprint2->add_story($story2_3);


        $sprint3 = self::$default_project->create_sprint("Frontend Design", 4);
        $story3_1 = new story("Draw Mockups", "Draw Mockups of each screen on paper", 1);
        $story3_2 = new story("Implement Mockups", "Implement each page of that was mocked up", 1);
        $story3_3 = new story("Route pages", "Make sure all links work and pages are routed correctly", 1);

        $sprint3->add_story($story3_1);
        $sprint3->add_story($story3_2);
        $sprint3->add_story($story3_3);

        $sprint4 = self::$default_project->create_sprint("Backend Conncetion", 4);
        $story4_1 = new story("Create classes", "Create important php classes based on the database", 1);
        $story4_2 = new story("Connect to frontend", "Connect the data to the frontend", 1);

        $sprint4->add_story($story4_1);
        $sprint4->add_story($story4_2);

        $sprint5 = self::$default_project->create_sprint("Final Touches", 2);

        return self::$default_project;
    }
}