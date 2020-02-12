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
            if ($this->productId && $this->secondId) {
                $blManagerObj = new BLManager();
                $commentsResponse = $blManagerObj->getUserProductComment($this->dbConnection, $this->productId, $this->secondId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($commentsResponse);
                break;
            }
            else if ($this->productId) {
                $blManagerObj = new BLManager();
                $commentsResponse = $blManagerObj->getProductComments($this->dbConnection, $this->productId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($commentsResponse);
                break;
            }
            else {
                $blManagerObj = new BLManager();
                $commentsResponse = $blManagerObj->getUserComments($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($commentsResponse);
                break;
            }
        } 
    }
}
?>