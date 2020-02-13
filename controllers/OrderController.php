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
    }
}
?>