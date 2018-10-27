<?php

class member extends Database
{
    static protected $table_name = 'members';
    static protected $db_columns = ['id', 'email', 'first_name', 'last_name', 'hashed_password', 'project_id'];
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $hashed_password;
    public $project_id;


    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getAssociatedProjects()
    {
        return [project::get_default_project1()];
    }

    private static $member1 = null;

    public static function GetDefaultMember1()
    {
        if (self::$member1 !== null) {
            return self::$member1;
        }
        $args = array(
            "email" => "ndefilippis98@gmail.com",
            "first_name" => "Nick",
            "last_name" => "DeFilippis");

        self::$member1 = new Member($args);
        return self::$member1;
    }

    private static $member2 = null;

    public static function GetDefaultMember2()
    {
        if (self::$member2 !== null) {
            return self::$member2;
        }
        $args = array(
            "email" => "tuh36069@temple.edu",
            "first_name" => "Nicolas",
            "last_name" => "Dos Santos"
        );
        self::$member2 = new Member($args);
        return self::$member2;
    }

    private static $member3 = null;

    public static function GetDefaultMember3()
    {
        if (self::$member3 !== null) {
            return self::$member3;
        }
        $args = array(
            "email" => "tchin25@gmail.com",
            "first_name" => "Thomas",
            "last_name" => "Chin"
        );
        self::$member3 = new Member($args);
        return self::$member3;
    }

    private static $member4 = null;

    public static function GetDefaultMember4()
    {
        if (self::$member4 !== null) {
            return self::$member4;
        }
        $args = array(
            "email" => "angelaweiber@temple.edu",
            "first_name" => "Angela",
            "last_name" => "Weiber");
        self::$member4 = new Member($args);
        return self::$member4;
    }

    //Rewrite it
    public function deleteMember($member)
    {
        $member->email = '';
        $member->first_name = '';
        $member->last_name = '';
    }
}