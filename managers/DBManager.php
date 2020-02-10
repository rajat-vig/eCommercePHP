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

    function getAllProducts() {
        try {
            $cmd = 'SELECT * FROM product';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function createProduct($productObj) {
        try {
            $cmd = 'INSERT INTO ' . 'product' . ' (product_name, description, image_url, price, shipping_cost) ' .
            'VALUES (:productName, :description, :imageUrl, :price, :shippingCost)';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productName', $productObj->productName);
            $sql->bindValue(':description', $productObj->description);
            $sql->bindValue(':imageUrl', $productObj->imageUrl);
            $sql->bindValue(':price', $productObj->price);
            $sql->bindValue(':shippingCost', $productObj->shippingCost);
            $sql->execute();
            $last_id = $this->dbConnection->lastInsertId();
            if ($sql->rowCount() > 0) {
                $cmd = 'SELECT * FROM product WHERE product_id = ' . $last_id;
                $sql = $this->dbConnection->prepare($cmd);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateProduct($productObj, $productId) {
        try {
            $cmd = 'UPDATE ' . 'product' . ' SET product_name = :productName, description = :description, image_url = :imageUrl, price = :price, shipping_cost =  :shippingCost' .
            ' WHERE product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->bindValue(':productName', $productObj->productName);
            $sql->bindValue(':description', $productObj->description);
            $sql->bindValue(':imageUrl', $productObj->imageUrl);
            $sql->bindValue(':price', $productObj->price);
            $sql->bindValue(':shippingCost', $productObj->shippingCost);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $cmd = 'SELECT * FROM product WHERE product_id = ' . $productId;
                $sql = $this->dbConnection->prepare($cmd);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_ASSOC);
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteProduct($productId) {
        try {
            $cmd = 'DELETE FROM product WHERE product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>