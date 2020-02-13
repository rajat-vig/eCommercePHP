<?php
class ImageController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $commentId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $commentId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->productId = $commentId;
        $this->requestObj = $requestObj;
    }

    public function processRequest() {
    }
}
?>