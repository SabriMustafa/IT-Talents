<?php

namespace model;

use PDO;

class UserDao
{
    /**
     * @var PDO|null
     */
    private $db;

    public function __construct()
    {
        $this->db = AbstractDao::getDb();
    }

    public function getFavourites($id)
    {
        $sql = "SELECT product_id FROM favourites WHERE user_id=?";
        $pstm = $this->db->prepare($sql);
        $pstm->execute([$id]);
        $rows = $pstm->fetchAll(PDO::FETCH_ASSOC);
        $productIds = [];
        foreach ($rows as $row) {
            $productIds[] = $row["product_id"];
        }
        foreach ($productIds as $productId) {

            $sql = "SELECT name,model,price FROM products WHERE id=?";
            $pstm = $this->db->prepare($sql);
            $pstm->execute([$productId]);
            $row = $pstm->fetch(PDO::FETCH_ASSOC);
            $favourites[] = $row;

        }

        return $favourites;

    }

    public function getAllOrders($id)
    {
        $sql = "SELECT date,money FROM orders_history where user_id=?";
        $pstm = $this->db->prepare($sql);
        $pstm->execute([$id]);
        $result = $pstm->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function addUser(User $user)
    {
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
    public function getByEmail($email)
    {

        $sql = "SELECT 
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

    public function updateData(User $user)
    {

        $sql = "UPDATE users SET email = ?, 
                      password = ?, 
                      first_name = ?, 
                      last_name = ?, 
                        gender = ?, 
                        age = ? WHERE id=?;";

        $id = $_SESSION["user"]->getId();

        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$user->getEmail(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getGender(),
            $user->getAge(),
            $id]);
        //session_destroy();
        return true;
    }

    public function getAll()
    {
        // return array of Users object
    }

}