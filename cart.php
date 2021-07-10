<?php
ob_start();
//header
include('header.php');
?>

<?php
    //products
    count($product->getData('cart')) ? include('Templates/_cart.php'): include('Templates/notFound/_cart_notFound.php');

    //wishlist
    count($product->getData('wishlist')) ? include('Templates/_wishlist.php'): include('Templates/notFound/_wishlist_notFound.php');

    //new_phones
    include('Templates/_new-phones.php');
    
?>

<?php
//footer
include('footer.php');
?>