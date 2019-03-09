<?php
namespace model;
class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $gender;
    private $age;
    private $is_admin;
    /**
     * User constructor.
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $password
     * @param $gender
     * @param $age
     * @param $is_admin
     */
    public function __construct($id = null, $first_name = null, $last_name = null,
                                $email = null, $password = null, $gender = null, $age = null,$is_admin=0)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->age = $age;
        $this->is_admin=$is_admin;
    }

    /**
     * @return int
     */
    public function getIsAdmin(): int
    {
        return $this->is_admin;
    }

    /**
     * @param int $is_admin
     */
    public function setIsAdmin(int $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }
}