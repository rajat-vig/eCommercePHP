<?php
require __DIR__.'/controllers/UserController.php';
require __DIR__.'/controllers/ProductController.php';
require __DIR__.'/controllers/CartController.php';
require __DIR__.'/controllers/CommentController.php';
require __DIR__.'/controllers/ImageController.php';

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
    case 'comment':
    $controller = new CommentController($dbConnection, $requestMethod, $userId, $requestObject, $secondId);
    $controller->processRequest();
    break;
    case 'image':
    $controller = new ImageController($dbConnection, $requestMethod, $userId, $requestObject);
    $controller->processRequest();
    break;
}
?>