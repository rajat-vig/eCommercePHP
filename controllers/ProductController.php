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
                $productResponse = $blManagerObj->getAllProducts($this->dbConnection);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($productResponse);
                break;
            }
            case 'POST':
            $productObj = $this->getProductModel($this->requestObj);
            $blManagerObj = new BLManager();
            $productResponse = $blManagerObj->createProduct($productObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($productResponse);
            break;
            case 'PUT':
            $blManagerObj = new BLManager();
            $productCurrentDetails = $blManagerObj->getProduct($this->dbConnection, $this->productId);
            $productObj = $this->updateProductModel($this->requestObj, $productCurrentDetails);
            $productResponse = $blManagerObj->updateProduct($productObj, $this->dbConnection, $this->productId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($productResponse);
            break;
            case 'DELETE':
            $blManagerObj = new BLManager();
            $productResponse = $blManagerObj->deleteProduct($this->dbConnection, $this->productId);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($productResponse);
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
    private function updateProductModel($requestObj, $productCurrentDetails) {
        global $RQ_DESCRIPTION, $RQ_PRICE, $RQ_PRODUCTNAME, $RQ_SHIPPING_COST, $RQ_IMAGE_URL;
        $productObj = new ProductModel();
        $productObj->productName = $requestObj[$RQ_PRODUCTNAME] ?? $productCurrentDetails->responseData[$RQ_PRODUCTNAME]; 
        $productObj->description = $requestObj[$RQ_DESCRIPTION] ?? $productCurrentDetails->responseData[$RQ_DESCRIPTION];
        $productObj->imageUrl  = $requestObj[$RQ_IMAGE_URL] ?? $productCurrentDetails->responseData[$RQ_IMAGE_URL];
        $productObj->price  = $requestObj[$RQ_PRICE] ?? $productCurrentDetails->responseData[$RQ_PRICE];
        $productObj->shippingCost = $requestObj[$RQ_SHIPPING_COST] ?? $productCurrentDetails->responseData[$RQ_SHIPPING_COST];
    	return $productObj;
    }
}
?>