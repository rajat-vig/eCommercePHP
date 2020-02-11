<?php
class CartController extends BaseController {
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
            $blManagerObj = new BLManager();
            $cartResponse = $blManagerObj->showProducts($this->dbConnection, $this->userId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($cartResponse);
            break;
            case 'POST':
            $cartObj = $this->getCartModel($this->requestObj);
            $blManagerObj = new BLManager();
            $cartResponse = $blManagerObj->createProduct($cartObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($cartResponse);
            break;
        }
    }
}
?>