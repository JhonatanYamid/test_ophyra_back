<?php
require __DIR__ . "/config/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
if ((isset($uri[2]) && $uri[2] != 'products') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
require PROJECT_ROOT_PATH . "/Controller/Api/ProductsController.php";
$objFeedController = new ProductsController();
$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}();
?>