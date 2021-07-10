<?php
ob_start();
//header
include('header.php');
?>

<?php
    //products
    include('Templates/_products.php');

    //top_sale
    include('Templates/_top-sale.php');
    
?>

<?php
//footer
include('footer.php');
?>