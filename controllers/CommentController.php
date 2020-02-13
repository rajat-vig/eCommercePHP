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
            case 'POST':
            $commentObj = $this->getCommentModel($this->requestObj);
            $blManagerObj = new BLManager();
            $commentResponse = $blManagerObj->addComment($commentObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($commentResponse);
            case 'PUT':
            global $RQ_USERID, $RQ_PRODUCTID;
            $blManagerObj = new BLManager();
            $commentCurrentDetails = $blManagerObj->getUserProductComment($this->dbConnection, $this->requestObj[$RQ_PRODUCTID], $this->requestObj[$RQ_USERID]);
            $commentObj = $this->updateCommentModel($this->requestObj, $commentCurrentDetails);
            $commentResponse = $blManagerObj->updateComment($commentObj, $this->dbConnection);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($commentResponse);
            case 'DELETE':
            $blManagerObj = new BLManager();
            $commentResponse = $blManagerObj->deleteComment($this->dbConnection, $this->requestObj[$RQ_PRODUCTID], $this->requestObj[$RQ_USERID]);
            $utilityObj = new Utility();
            $utilityObj->sendResponse($commentResponse);
            break;
        } 
    }
    private function getCommentModel($requestObj) {
        global $RQ_USERID, $RQ_PRODUCTID, $RQ_COMMENT_RATING, $RQ_COMMENT_TEXT;
        $commentObj = new CommentModel();
        $commentObj->userId = $requestObj[$RQ_USERID]; 
        $commentObj->productId = $requestObj[$RQ_PRODUCTID];
        $commentObj->rating  = $requestObj[$RQ_COMMENT_RATING];
        $commentObj->text = $requestObj[$RQ_COMMENT_TEXT];
    	return $commentObj;
    }
    private function updateCommentModel($requestObj, $commentCurrentDetails) {
        global $RQ_USERID, $RQ_PRODUCTID, $RQ_COMMENT_RATING, $RQ_COMMENT_TEXT, $RQ_COMMENTID;
        $commentObj = new CommentModel();
        $commentObj->commentId = $requestObj[$RQ_COMMENTID] ?? $commentCurrentDetails->responseData[$RQ_COMMENTID];
        $commentObj->userId = $requestObj[$RQ_USERID] ?? $commentCurrentDetails->responseData[$RQ_USERID]; 
        $commentObj->productId = $requestObj[$RQ_PRODUCTID] ?? $commentCurrentDetails->responseData[$RQ_PRODUCTID];
        $commentObj->rating  = $requestObj[$RQ_COMMENT_RATING] ?? $commentCurrentDetails->responseData[$RQ_COMMENT_RATING];
        $commentObj->text = $requestObj[$RQ_COMMENT_TEXT] ?? $commentCurrentDetails->responseData[$RQ_COMMENT_TEXT];
    	return $commentObj;
    }
}
?>