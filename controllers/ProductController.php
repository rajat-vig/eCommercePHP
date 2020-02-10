<?php
class ProductController extends BaseController {
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
        switch ($this->requestMethod) {
            case 'GET':
            if ($this->productId) {
                $blManagerObj = new BLManager();
                $productResponse = $blManagerObj->getProduct($this->dbConnection, $this->productId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($productResponse);
                break;
            } 
            else {
                $blManagerObj = new BLManager();
                $userResponse = $blManagerObj->getAllProducts($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($userResponse);
                break;
            }
            case 'POST':
            $productObj = $this->getProductModel($this->requestObj);
            $blManagerObj = new BLManager();
            $userResponse = $blManagerObj->createProduct($productObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($userResponse);
            break;
        }
    }
}
?>