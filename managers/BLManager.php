<?php
require __DIR__.'/BaseManager.php';
class BLManager extends BaseManager {
    
    function getUser($dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESS, $USER_RETRIEVED_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getUser($userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESS, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVED_ERROR, $NULL);
        return $responseObject;
    }
    
    function getAllUsers($dbConnection) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESS, $USER_RETRIEVED_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->getAllUsers();
        $responseParserObject = new ResponseParser();

        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESS, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVED_ERROR, $NULL);

        return $responseObject;
    }

    function createUser($userObj, $dbConnection) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESS, $USER_RETRIEVED_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->createUser($userObj);
        $responseParserObject = new ResponseParser();

        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESS, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVED_ERROR, $NULL);

        return $responseObject;
    }

    function updateUser($userObj, $dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESS, $USER_RETRIEVED_ERROR;    
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->updateUser($userObj, $userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult != null)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESS, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVED_ERROR, $NULL);
        return $responseObject;
    }

    function deleteUser($dbConnection, $userId) {
        global $TRUE, $FALSE, $NULL, $USER_RETRIEVED_SUCCESS, $USER_RETRIEVED_ERROR;
        $dbManagerObj = new DBManager($dbConnection);
        $dbResult = $dbManagerObj->deleteUser($userId);
        $responseParserObject = new ResponseParser();
        if ($dbResult)
            $responseObject = $responseParserObject->createSuccessModel($TRUE, $USER_RETRIEVED_SUCCESS, $dbResult);
        else 
            $responseObject = $responseParserObject->createErrorModel($FALSE, $USER_RETRIEVED_ERROR, $NULL);
        return $responseObject;
    }
}
?>