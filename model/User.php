<?php
namespace model;


class User extends JsonObject {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $gender;
    private $age;

    public function __construct($first_name,$last_name,$email, $password,$gender,$age){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->age = $age;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getLastName()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->password;
    }

}