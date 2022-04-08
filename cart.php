<?php
    ob_start();
    //Include Header template.
    require_once('header.php');
?>


<?php
    //include cart template
    require_once('./template/_cart-template.php');

    //include wishlist template or notFound file
    count($product->getData('wishlist')) ? require_once('./template/_wishlist.php') : require_once('./template/notFound/_wishlist_notFound.php');

    //include new-phones template
    require_once('./template/_new-phones.php');
?>



<?php
    //Include footer template.
    require_once('footer.php');
?>