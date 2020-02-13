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
                $orderResponse = $blManagerObj->getOrder($this->dbConnection, $this->productId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($orderResponse);
                break;
            } 
    }
}
?>