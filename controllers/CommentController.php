<?php
class CommentController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $productId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $productId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->productId = $productId;
        $this->requestObj = $requestObj;
    }

    public function processRequest() {
    }
}
?>