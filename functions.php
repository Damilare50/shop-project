<?php

    //require database conn
    require('./database/DBController.php');

    //require product class
    require('./database/Product.php');

    //require cart class
    require('./database/Cart.php');

    //require wishlist class
    require('./database/Wishlist.php');

    //Database Object
    $db = new DBController();

    //Product Object
    $product = new Product($db);
    $product_get = $product->getData();

    //Cart Object
    $cart = new Cart($db);

    //Wishlist Object
    $wishlist = new Wishlist($db);

