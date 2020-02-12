<?php
class CommentController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $productId;
    private $requestObj;
    private $secondId;

    public function __construct($dbConnection, $requestMethod, $productId, $requestObj, $secondId) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->productId = $productId;
        $this->requestObj = $requestObj;
        $this->secondId = $secondId;
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
            if ($this->productId) {
                $blManagerObj = new BLManager();
                $commentsResponse = $blManagerObj->getProductComments($this->dbConnection, $this->productId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($commentsResponse);
                break;
            }
            else {
                $blManagerObj = new BLManager();
                $productResponse = $blManagerObj->getUserComments($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($productResponse);
                break;
            }
        } 
    }
}
?>