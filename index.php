<?php 
    ob_start();
    //Include Header template.
    require_once('header.php');
?>

<?php
    //include banner-area template
    require_once('./template/_banner-area.php');

    //include top-sale template
    require_once('./template/_top-sale.php');

    //include special-price template
    require_once('./template/_special-price.php');
 
    //include banner-adds template
    require_once('./template/_banner-adds.php');

    //include new-phones template
    require_once('./template/_new-phones.php');

    //include blogs-template
    require_once('./template/_blogs.php');
?>

<?php 
    //Include footer template.
    require_once('footer.php');
?>