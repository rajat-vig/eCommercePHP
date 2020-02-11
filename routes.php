<?php
require __DIR__.'/controllers/UserController.php';
require __DIR__.'/controllers/ProductController.php';
require __DIR__.'/controllers/CartController.php';

switch ($endPoint) {
    case 'user':
    $controller = new UserController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
    case 'product':
    $controller = new ProductController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
    case 'cart':
    $controller = new CartController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
}
?>