<?php
require __DIR__.'/../models/ResponseModel.php';
class ResponseParser {

    function createSuccessModel($success, $responseMessage, $responseObject) {
        $responseModel = new ResponseModel();
        $responseModel->success = $success;
        $responseModel->responseMessage = $responseMessage;
        $responseModel->responseData = $responseObject;
        return $responseModel;
    }

    function createErrorModel($success, $responseMessage, $responseObject) {
        $responseModel = new ResponseModel();
        $responseModel->success = $success;
        $responseModel->responseMessage = $responseMessage;
        $responseModel->responseData = $responseObject;
        return $responseModel;
    }
}
?>