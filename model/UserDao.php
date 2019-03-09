<?php

namespace model;

use Message\MessageHandler;
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

        }if (!empty($favourites)){
        return $favourites;

    }



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
        echo "dada";
        $sql = "INSERT INTO users (  
                    email,
                    password,
                    first_name, 
                    last_name, 
                    gender,
                     age,
                     is_admin)
                VALUE (?,?,?,?,?,?,?)";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$user->getEmail(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getGender(),
            $user->getAge(),
            $user->getIsAdmin()
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
                  age,
                  is_admin 
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
            $result->age,
            $result->is_admin
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

    public function insertIntoFavourites($productId)
    {

        $sql = "INSERT INTO favourites (user_id,product_id) VALUE (?,?)";
        $pstmt = $this->db->prepare($sql);
        $userId = $_SESSION["user"]->getId();
        $result = $pstmt->execute([$userId,$productId]);

        if($result){
            return json_encode(["success" => true, "msg" => "Liked"]);
        }else{
            return json_encode(["success" => false, "msg" => "Could not like product!"]);
        }
    }
 public function totalSum($spentMoney,$userId){

     $sql = "INSERT INTO orders_history (date,money,user_id) VALUE (NOW(),?,?)";
     $pstmt = $this->db->prepare($sql);
     $userId = $_SESSION["user"]->getId();
     $result = $pstmt->execute([$spentMoney,$userId]);
     if($result){
         return json_encode(["success" => true, "msg" => "Inserted successfully"]);
     }else{
         return json_encode(["success" => false, "msg" => "Could not insert into orders history!"]);
     }
    }

    public function getAll()
    {
        // return array of Users object
    }

}