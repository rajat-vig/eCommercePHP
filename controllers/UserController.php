<?php
require __DIR__.'/BaseController.php';

class UserController {
    private $dbConnection;
    private $requestMethod;
    private $userId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $userId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->userId = $userId;
        $this->requestObj = $requestObj;
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
            if ($this->userId) {
                $blManagerObj = new BLManager();
                $userResponse = $blManagerObj->getUser($this->dbConnection, $this->userId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($userResponse);
                break;
            } 
            else {
                $blManagerObj = new BLManager();
                $userResponse = $blManagerObj->getAllUsers($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($userResponse);
                break;
            }
            case 'POST':
            $userObj = $this->getUserModel($this->requestObj);
            $blManagerObj = new BLManager();
            $userResponse = $blManagerObj->createUser($userObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($userResponse);
            break;

            case 'PUT':
            $blManagerObj = new BLManager();
            $userCurrentDetails = $blManagerObj->getUser($this->dbConnection, $this->userId);
            $userObj = $this->updateUserModel($this->requestObj, $userCurrentDetails);
            $userResponse = $blManagerObj->updateUser($userObj, $this->dbConnection, $this->userId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($userResponse);
            break;

            case 'DELETE':
            $blManagerObj = new BLManager();
            $userResponse = $blManagerObj->deleteUser($this->dbConnection, $this->userId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($userResponse);
            break;

        }
    }

    private function getUserModel($requestObj)
    {
        global $RQ_EMAIL, $RQ_PASSWORD, $RQ_USERNAME, $RQ_SHIPPING_ADDRESS;
        $userObj = new UserModel();
        $userObj->userName = $requestObj[$RQ_USERNAME]; 
        $userObj->email = $requestObj[$RQ_EMAIL];
        $userObj->password  = $requestObj[$RQ_PASSWORD];
        $userObj->shippingAddress = $requestObj[$RQ_SHIPPING_ADDRESS];
    	return $userObj;
    }

    private function updateUserModel($requestObj, $userCurrentDetails)
    {
        global $RQ_EMAIL, $RQ_PASSWORD, $RQ_USERNAME, $RQ_SHIPPING_ADDRESS;
        $userObj = new UserModel();
        $userObj->userName = $requestObj[$RQ_USERNAME] ?? $userCurrentDetails->responseData[$RQ_USERNAME]; 
        $userObj->email = $requestObj[$RQ_EMAIL] ?? $userCurrentDetails->responseData[$RQ_EMAIL];
        $userObj->password  = $requestObj[$RQ_PASSWORD] ?? $userCurrentDetails->responseData[$RQ_PASSWORD];
        $userObj->shippingAddress = $requestObj[$RQ_SHIPPING_ADDRESS] ?? $userCurrentDetails->responseData[$RQ_SHIPPING_ADDRESS];
    	return $userObj;
    }
}

?>