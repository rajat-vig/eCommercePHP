<?php
require __DIR__.'/BaseManager.php';
class BLManager extends BaseManager {
    
    function getUser($dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESSFULLY, $USER_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getUser($userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }
    
    function getAllUsers($dbConnection) {
        global $TRUE, $FALSE, $NULL, $USERS_RETRIEVED_SUCCESSFULLY, $USERS_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getAllUsers();
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USERS_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USERS_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function createUser($userObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $USER_CREATED_SUCCESSFULLY, $USER_CREATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->createUser($userObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_CREATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_CREATION_ERROR, $NULL);
        return $responseObject;
    }

    function updateUser($userObj, $dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_UPDATED_SUCCESSFULLY, $USER_UPDATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateUser($userObj, $userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_UPDATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_UPDATION_ERROR, $NULL);
        return $responseObject;
    }

    function deleteUser($dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_DELETED_SUCCESSFULLY, $USER_DELETION_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteUser($userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_DELETED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_DELETION_ERROR, $NULL);
        return $responseObject;
    }


    function getProduct($dbConnection, $productId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_RETRIEVED_SUCCESSFULLY, $PRODUCT_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getProduct($productId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function getAllProducts($dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $PRODUCTS_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getAllProducts();
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCTS_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function createProduct($productObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_CREATED_SUCCESSFULLY, $PRODUCT_CREATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->createProduct($productObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_CREATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_CREATION_ERROR, $NULL);
        return $responseObject;
    }

    function updateProduct($productObj, $dbConnection, $prodId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_UPDATED_SUCCESSFULLY, $PRODUCT_UPDATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateProduct($productObj, $prodId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_UPDATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_UPDATION_ERROR, $NULL);
        return $responseObject;
    }

    function deleteProduct($dbConnection, $productId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_DELETED_SUCCESSFULLY, $PRODUCT_DELETION_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteProduct($productId);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_DELETED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_DELETION_ERROR, $NULL);
        return $responseObject;
    }

    function showProducts($dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $CART_RETRIEVED_SUCCESSFULLY, $CART_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->showProducts($userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $CART_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $CART_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function addProduct($cartObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_ADDED_SUCCESSFULLY, $PRODUCT_ADDING_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->addProduct($cartObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_ADDED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_ADDING_ERROR, $NULL);
        return $responseObject;
    }

    function updateProducts($cartObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $CART_UPDATED_SUCCESSFULLY, $CART_UPDATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateProducts($cartObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $CART_UPDATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $CART_UPDATION_ERROR, $NULL);
        return $responseObject;
    }

    function deleteProducts($cartObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_REMOVED_SUCCESSFULLY, $PRODUCT_REMOVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteProducts($cartObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_REMOVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_REMOVING_ERROR, $NULL);
        return $responseObject;
    }

    function getUserProductComment($dbConnection, $productId, $userId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_RETRIEVED_SUCCESSFULLY, $PRODUCT_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getUserProductComment($productId, $userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function getProductComments($dbConnection, $productId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_RETRIEVED_SUCCESSFULLY, $PRODUCT_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getProductComments($productId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function getUserComments($dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $PRODUCTS_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getUserComments();
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCTS_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function addComment($commentObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_CREATED_SUCCESSFULLY, $PRODUCT_CREATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->addComment($commentObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_CREATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_CREATION_ERROR, $NULL);
        return $responseObject;
    }

    function updateComment($commentObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_UPDATED_SUCCESSFULLY, $PRODUCT_UPDATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateComment($commentObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_UPDATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_UPDATION_ERROR, $NULL);
        return $responseObject;
    }

    function deleteComment($dbConnection, $productId, $userId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_DELETED_SUCCESSFULLY, $PRODUCT_DELETION_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteComment($productId, $userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_DELETED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_DELETION_ERROR, $NULL);
        return $responseObject;
    }

    function getImages($dbConnection, $commentId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_RETRIEVED_SUCCESSFULLY, $PRODUCT_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getImages($commentId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function addImage($imageObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $USER_CREATED_SUCCESSFULLY, $USER_CREATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->addImage($imageObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_CREATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_CREATION_ERROR, $NULL);
        return $responseObject;
    }

    function deleteImages($dbConnection, $commentId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_DELETED_SUCCESSFULLY, $PRODUCT_DELETION_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteImages($commentId);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_DELETED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_DELETION_ERROR, $NULL);
        return $responseObject;
    }

    function getOrder($dbConnection, $orderId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_RETRIEVED_SUCCESSFULLY, $PRODUCT_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getOrder($orderId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function getUserOrders($dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $PRODUCTS_RETRIEVING_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getUserOrders();
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCTS_RETRIEVED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCTS_RETRIEVING_ERROR, $NULL);
        return $responseObject;
    }

    function addOrder($orderObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_CREATED_SUCCESSFULLY, $PRODUCT_CREATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->addOrder($orderObj);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_CREATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_CREATION_ERROR, $NULL);
        return $responseObject;
    }

    function updateOrder($orderObj, $dbConnection, $orderId) {
        global $TRUE, $FALSE, $NULL, $PRODUCT_UPDATED_SUCCESSFULLY, $PRODUCT_UPDATION_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateOrder($orderObj, $orderId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $PRODUCT_UPDATED_SUCCESSFULLY, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $PRODUCT_UPDATION_ERROR, $NULL);
        return $responseObject;
    }

}
?>