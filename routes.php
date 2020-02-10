<?php
require __DIR__.'/controllers/UserController.php';

switch ($endPoint) {
    case 'user':
    $controller = new UserController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
    case 'product':
    $controller = new ProductController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
}
?>