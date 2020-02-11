<?php
class CartController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $productId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $userId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->productId = $userId;
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
        }
    }
}
?>