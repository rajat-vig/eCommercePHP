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

    private function getProductModel($requestObj) {
        global $RQ_DESCRIPTION, $RQ_PRICE, $RQ_PRODUCTNAME, $RQ_SHIPPING_COST, $RQ_IMAGE_URL;
        $productObj = new ProductModel();
        $productObj->productName = $requestObj[$RQ_PRODUCTNAME]; 
        $productObj->description = $requestObj[$RQ_DESCRIPTION];
        $productObj->imageUrl  = $requestObj[$RQ_IMAGE_URL];
        $productObj->price = $requestObj[$RQ_PRICE];
        $productObj->shippingCost = $requestObj[$RQ_SHIPPING_COST];
    	return $productObj;
    }
}
?>