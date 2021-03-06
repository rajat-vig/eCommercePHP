<?php
class OrderController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $orderId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $orderId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->orderId = $orderId;
        $this->requestObj = $requestObj;
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
            if ($this->orderId) {
                $blManagerObj = new BLManager();
                $orderResponse = $blManagerObj->getOrder($this->dbConnection, $this->orderId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($orderResponse);
                break;
            }
            else {
                $blManagerObj = new BLManager();
                $orderResponse = $blManagerObj->getUserOrders($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($orderResponse);
                break;
            }
            case 'POST':
            $orderObj = $this->getOrderModel($this->requestObj);
            $blManagerObj = new BLManager();
            $orderResponse = $blManagerObj->addOrder($orderObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($orderResponse);
            break;
            case 'PUT':
            $blManagerObj = new BLManager();
            $orderCurrentDetails = $blManagerObj->getOrder($this->dbConnection, $this->orderId);
            $orderObj = $this->updateOrderModel($this->requestObj, $orderCurrentDetails);
            $orderResponse = $blManagerObj->updateOrder($orderObj, $this->dbConnection, $this->orderId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($orderResponse);
            break;
            case 'DELETE':
            $blManagerObj = new BLManager();
            $orderResponse = $blManagerObj->deleteOrder($this->dbConnection, $this->orderId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($orderResponse);
            break;
        } 
    }
    private function getOrderModel($requestObj) {
        global $RQ_PRICE, $RQ_PRODUCTID, $RQ_USERID, $RQ_QUANTITY;
        $orderObj = new OrderModel();
        $orderObj->userId = $requestObj[$RQ_USERID]; 
        $orderObj->productId = $requestObj[$RQ_PRODUCTID];
        $orderObj->price = $requestObj[$RQ_PRICE];
        $orderObj->quantity = $requestObj[$RQ_QUANTITY];
    	return $orderObj;
    }
    private function updateOrderModel($requestObj, $orderCurrentDetails) {
        global $RQ_PRICE, $RQ_PRODUCTID, $RQ_USERID, $RQ_QUANTITY;
        $orderObj = new OrderModel();
        $orderObj->userId = $requestObj[$RQ_USERID] ?? $orderCurrentDetails->responseData[$RQ_USERID]; 
        $orderObj->productId = $requestObj[$RQ_PRODUCTID] ?? $orderCurrentDetails->responseData[$RQ_PRODUCTID];
        $orderObj->price  = $requestObj[$RQ_PRICE] ?? $orderCurrentDetails->responseData[$RQ_PRICE];
        $orderObj->quantity  = $requestObj[$RQ_QUANTITY] ?? $orderCurrentDetails->responseData[$RQ_QUANTITY];
    	return $orderObj;
    }
}
?>