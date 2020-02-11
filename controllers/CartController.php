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
        global $RQ_USERID;
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
            $cartCurrentDetails = $blManagerObj->showProducts($this->dbConnection, $this->requestObj[$RQ_USERID]);
            $cartObj = $this->updateCartModel($this->requestObj, $cartCurrentDetails);
            $cartResponse = $blManagerObj->updateProducts($cartObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($cartResponse);
            break;
            case 'DELETE':
            $blManagerObj = new BLManager();
            $cartResponse = $blManagerObj->deleteProducts($this->dbConnection);
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
    private function updateCartModel($requestObj, $cartCurrentDetails) {
        global $RQ_USERID, $RQ_PRODUCTID, $RQ_QUANTITY;
        $cartObj = new CartModel();
        $cartObj->userId = $requestObj[$RQ_USERID] ?? $cartCurrentDetails->responseData[$RQ_USERID]; 
        $cartObj->productId = $requestObj[$RQ_PRODUCTID] ?? $cartCurrentDetails->responseData[$RQ_PRODUCTID];
        $cartObj->quantity  = $requestObj[$RQ_QUANTITY] ?? $cartCurrentDetails->responseData[$RQ_QUANTITY];
    	return $cartObj;
    }
}
?>