<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__.'/constants.php';
require __DIR__.'/config/DatabaseConnector.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

# get the endpoint present in the url to direct the request
$endPoint = isset($uri[3]) ? $uri[3] : null;

# the user id / product id is, of course, optional and must be a number:
$userId = isset($uri[4]) ? (int) $uri[4] : null;

# the second id is, of course, optional and must be a number:
$secondId = isset($uri[5]) ? (int) $uri[5] : null;

#to identify the appropriate action
$requestMethod = $_SERVER["REQUEST_METHOD"];

#...
$requestObject = (array) json_decode(file_get_contents('php://input'), TRUE);

#...
$dbConnection = (new DatabaseConnector($DB_HOST, $DB_PORT, $DB_DATABASE, $DB_USERNAME, $DB_PASSWORD))->getConnection();

?>