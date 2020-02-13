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
            if ($sql->rowCount() > 0)
                $this->getUser($last_id);
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
            if ($sql->rowCount() > 0)
                $this->getUser($userId);
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
            if ($sql->rowCount() > 0) 
                $this->getProduct($last_id);
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
            if ($sql->rowCount() > 0)
                $this->getProduct($productId);
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

    function showProducts($userId) {
        try {
            $cmd = 'SELECT * FROM cart as c INNER JOIN product AS p ON c.product_id = p.product_id WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $userId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addProduct($cartObj) {
        try {
            $updateResult = $this->updateProducts($cartObj);
            if(is_null($updateResult)) {
                $cmd = 'INSERT INTO ' . 'cart' . ' (user_id, product_id, quantity) ' .
                'VALUES (:userId, :productId, :quantity)';
                $sql = $this->dbConnection->prepare($cmd);
                $sql->bindValue(':userId', $cartObj->userId);
                $sql->bindValue(':productId', $cartObj->productId);
                $sql->bindValue(':quantity', $cartObj->quantity);
                $sql->execute();
                if ($sql->rowCount() > 0)
                    return $this->showProducts($cartObj->userId);    
            } else
                return $updateResult;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateProducts($cartObj) {
        try {
            $cmd = 'UPDATE ' . 'cart' . ' SET quantity = quantity + :quantity' .
            ' WHERE user_id = :userId && product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $cartObj->userId);
            $sql->bindValue(':productId', $cartObj->productId);
            $sql->bindValue(':quantity', $cartObj->quantity);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $this->showProducts($cartObj->userId);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteProducts($cartObj) {
        try {
            $cmd = 'DELETE FROM cart WHERE user_id = :userId && product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $cartObj->userId);
            $sql->bindValue(':productId', $cartObj->productId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getUserProductComment($productId, $userId) {
        try {
            $cmd = 'SELECT * FROM comment WHERE product_id = :productId && user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->bindValue(':userId', $userId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getProductComments($productId) {
        try {
            $cmd = 'SELECT * FROM comment WHERE product_id = :productId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    function getUserComments() {
        try {
            $cmd = 'SELECT * FROM comment WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', 5);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addComment($commentObj) {
        try {
            $cmd = 'INSERT INTO ' . 'comment' . ' (user_id, product_id, rating, text) ' .
            'VALUES (:userId, :productId, :rating, :text)';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', $commentObj->userId);
            $sql->bindValue(':productId', $commentObj->productId);
            $sql->bindValue(':rating', $commentObj->rating);
            $sql->bindValue(':text', $commentObj->text);
            $sql->execute();
            echo $sql->rowCount();
            if ($sql->rowCount() > 0) 
                return $this->getProductComments($commentObj->productId);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateComment($commentObj) {
        try {
            $cmd = 'UPDATE ' . 'comment' . ' SET rating = :rating, text = :text' .
            ' WHERE comment_id = :commentId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':commentId', $commentObj->commentId);
            $sql->bindValue(':rating', $commentObj->rating);
            $sql->bindValue(':text', $commentObj->text);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $this->getUserProductComment($commentObj->productId, $commentObj->userId);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteComment($productId, $userId) {
        try {
            $cmd = 'DELETE FROM comment WHERE product_id = :productId && user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':productId', $productId);
            $sql->bindValue(':userId', $userId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getImages($commentId) {
        try {
            $cmd = 'SELECT * FROM image WHERE comment_id = :commentId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':commentId', $commentId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addImage($imageObj) {
        try {
            $cmd = 'INSERT INTO ' . 'image' . ' (comment_id, image_url) ' .
            'VALUES (:commentId, :imageUrl)';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':commentId', $imageObj->commentId);
            $sql->bindValue(':imageUrl', $imageObj->imageUrl);
            $sql->execute();
            if ($sql->rowCount() > 0) 
                return $this->getImages($imageObj->commentId);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteImages($commentId) {
        try {
            $cmd = 'DELETE FROM image WHERE comment_id = :commentId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':commentId', $commentId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getOrder($orderId) {
        try {
            $cmd = 'SELECT * FROM `order` WHERE order_id = :orderId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':orderId', $orderId);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getUserOrders() {
        try {
            $cmd = 'SELECT * FROM `order` WHERE user_id = :userId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':userId', 5);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addOrder($orderObj) {
        try {
            $id = abs(crc32(uniqid()));
            $date = date_create()->format('Y-m-d H:i:s');
            $cmd = 'INSERT INTO `order` (order_id, user_id, product_id, quantity, price, date) ' .
            'VALUES (:orderId, :userId, :productId, :quantity, :price, :date)';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':orderId', $id);
            $sql->bindValue(':userId', $orderObj->userId);
            $sql->bindValue(':productId', $orderObj->productId);
            $sql->bindValue(':quantity', $orderObj->quantity);
            $sql->bindValue(':price', $orderObj->price);
            $sql->bindValue(':date', $date);
            $sql->execute();
            if ($sql->rowCount() > 0) 
                return $this->getOrder($id);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateOrder($orderObj, $orderId) {
        try {
            $cmd = 'UPDATE `order` SET product_id = :productId, quantity = :quantity, price = :price' .
            ' WHERE order_id = :orderId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':orderId', $orderId);
            $sql->bindValue(':productId', $orderObj->productId);
            $sql->bindValue(':quantity', $orderObj->quantity);
            $sql->bindValue(':price', $orderObj->price);
            $sql->execute();
            if ($sql->rowCount() > 0)
                return $this->getOrder($orderId);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteOrder($orderId) {
        try {
            $cmd = 'DELETE FROM `order` WHERE order_id = :orderId';
            $sql = $this->dbConnection->prepare($cmd);
            $sql->bindValue(':orderId', $orderId);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>