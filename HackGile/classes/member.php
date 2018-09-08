<?php

class member
{
    public $name;
    public $email;

    public function __construct($args = []) {
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function deleteMember() {
        unset($this);
    }
}