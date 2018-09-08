<?php
class Stories extends DatabaseObject{
    static protected $table_name = "story";
    static protected $db_columns = ['id', 'name', 'description'];

    public $id;
    public $name;
    public $description;

    public function __construct($args = [])
    {
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
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