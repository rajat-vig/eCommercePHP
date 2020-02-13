<?php
class ImageController extends BaseController {
    private $dbConnection;
    private $requestMethod;
    private $commentId;
    private $requestObj;

    public function __construct($dbConnection, $requestMethod, $commentId, $requestObj) {
        $this->dbConnection = $dbConnection;
        $this->requestMethod = $requestMethod;
        $this->commentId = $commentId;
        $this->requestObj = $requestObj;
    }

    public function processRequest() {
        switch ($this->requestMethod) {
            case 'GET':
            if ($this->commentId) {
                $blManagerObj = new BLManager();
                $imageResponse = $blManagerObj->getImages($this->dbConnection, $this->commentId);
                $utilityObj = new Utility();
                $utilityObj->sendResponse($imageResponse);
                break;
            }
            case 'POST':
            $imageObj = $this->getImageModel($this->requestObj);
            $blManagerObj = new BLManager();
            $imageResponse = $blManagerObj->addImage($imageObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($imageResponse);
        } 
    }
}
?>