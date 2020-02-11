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
            $cartResponse = $blManagerObj->addProduct($cartObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($cartResponse);
            break;
            case 'PUT':
            $blManagerObj = new BLManager();
            $cartCurrentDetails = $blManagerObj->showProducts($this->dbConnection, $this->userId);
            $cartObj = $this->updateCartModel($this->requestObj, $cartCurrentDetails);
            $cartResponse = $blManagerObj->updateProducts($productObj, $this->dbConnection, $this->userId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($cartResponse);
            break;
        }
    }

    private function getCartModel($requestObj) {
        global $RQ_USERID, $RQ_PRODUCTID, $RQ_QUANTITY;
        $cartObj = new CartModel();
        $cartObj->userId = $requestObj[$RQ_USERID]; 
        $cartObj->productId = $requestObj[$RQ_PRODUCTID];
        $cartObj->quantity = $requestObj[$RQ_QUANTITY];
    	return $cartObj;
    }
}
?>