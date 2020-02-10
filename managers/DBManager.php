<?php
class DBManager {
    private $dbConnection;
    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    function getUser($userId) {
        try {
            $cmd = 'SELECT * FROM user WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $userId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getAllUsers() {
        try {
            $cmd = 'SELECT * FROM user';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function createUser($userObj) {
        try {
            $cmd = 'INSERT INTO ' . 'user' . ' (user_name, email, password, shipping_address) ' .
            'VALUES (:userName, :email, :password, :shipping_address)';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userName', $userObj->userName);
            $sql->bindValue(':email', $userObj->email);
            $sql->bindValue(':password', $userObj->password);
            $sql->bindValue(':shipping_address', $userObj->shippingAddress);
            $sql->execute();
            $last_id = $this->dbConnection->lastInsertId();
            if ($sql->rowCount() > 0) {
                $cmd = 'SELECT * FROM user WHERE user_id = ' . $last_id;
                $sql = $this->dbConnection->prepare($cmd);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateUser($userObj, $userId) {
        try {
            $cmd = 'UPDATE ' . 'user' . ' SET user_name = :userName, email = :email, password = :password, shipping_address =  :shippingAddress' .
            ' WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $userId);
            $sql->bindValue(':userName', $userObj->userName);
            $sql->bindValue(':email', $userObj->email);
            $sql->bindValue(':password', $userObj->password);
            $sql->bindValue(':shippingAddress', $userObj->shippingAddress);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $cmd = 'SELECT * FROM user WHERE user_id = ' . $userId;
                $sql = $this->dbConnection->prepare($cmd);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteUser($userId) {
        try {
            $cmd = 'DELETE FROM user WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $userId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getProduct($productId) {
        try {
            $cmd = 'SELECT * FROM product WHERE product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>