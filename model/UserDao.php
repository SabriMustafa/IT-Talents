<?php
namespace model;
use PDO;

class UserDao{
    /**
     * @var PDO|null
     */
    private $db;

    public function __construct() {
        $this->db = AbstractDao::getDb();
    }

    public function addUser(User $user){
       $sql = "INSERT INTO users (  
                    email,
                    password,
                    first_name, 
                    last_name, 
                    gender,
                     age)
                VALUE (?,?,?,?,?,?)";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$user->getEmail(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getGender(),
            $user->getAge()
        ]);
    }

    /**
     * @param $email
     * @return User
     */
    public function getByEmail($email){
        $sql= "SELECT 
                  id, 
                  email,
                  password, 
                  first_name, 
                  last_name, 
                  gender, 
                  is_admin,
                  age 
              FROM 
                  users 
              WHERE 
                  email = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$email]);
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        return empty($result) ? null : new User($result->id, $result->first_name,
            $result->last_name,
            $result->email,
            $result->password,
            $result->gender,
            $result->age
        );
    }

    public function getAll(){
        // return array of Users object
    }

}