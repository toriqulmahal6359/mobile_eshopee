<?php
ob_start();
//header
include('header.php');
?>

<?php
    //banner area
    include('Templates/_banner-area.php');

    //top_sale
    include('Templates/_top-sale.php');

    //special_price
    include('Templates/_special-price.php');

    //banner_ads
    include('Templates/_banner-ads.php');

    //new_phones
    include('Templates/_new-phones.php');

    //blogs
    include('Templates/_blogs.php');

?>

<?php
//footer
include('footer.php');
?>