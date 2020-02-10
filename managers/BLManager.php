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
}
?>