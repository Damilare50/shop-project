<?php

//require database conn
require('../database/DBController.php');

//require product class
require('../database/Product.php');

//Database Object
$db = new DBController();

//Product Object
$product = new Product($db);

if (isset($_POST['itemid'])) {
    $results = $product->getProduct($_POST['itemid']);
    echo json_encode($results);
}