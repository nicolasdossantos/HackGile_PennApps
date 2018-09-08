<?php

class Projects extends DatabaseObject
{

    static protected $table_name = "projects";
    static protected $db_columns = ['id', 'name', 'description', 'max_members', 'git_link'];

    public $id;
    public $name;
    public $description;
    public $max_member;
    public $git_link;

    public function __construct($args = [])
    {
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->max_member = $args['max_members'] ?? 4;
        $this->git_link = $args['git_link'] ?? '';
    }


    protected function validate()
    {
        $this->errors = [];

        if (is_blank($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        } elseif (!has_length($this->name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "First name must be between 2 and 255 characters.";
        }

        return $this->errors;
    }

}

?>
