<?php

require('database/DBController.php');
require('database/Product.php');
require('database/Cart.php');

//DbController object
$db = new DBController();

//Product object
$product = new Product($db);
$product_shuffle = $product->getData();
// echo "<pre>";
// print_r($product->getData());
// die();

//Cart Object
$cart = new Cart($db);

// $arr = array(
//     'user_id' => 1,
//     'item_id' => 10,
// );
// $cart->insertIntoCart($arr);
?>