<?php 
    $item_id = $_GET['item_id'] ?? 1;
    foreach($product->getData() as $item) :
        if($item['item_id'] == $item_id) :
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if(isset($_POST['products-submit'])) {
                  $cart->addToCart($_POST['item_id'], $_POST['user_id'], '#product');
                }
            }
?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to buy.</button>
                    </div>
                    <form method="post" class="col" >
                        <div class="form-group">
                            <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?? 1; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php 
                            if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                            echo '<button type="submit" disabled class="btn btn-success form-control">In Cart!</button>';
                            } else {
                            echo '<button type="submit" name="products-submit" class="btn btn-warning form-control">Add to Cart.</button>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <!--Product ratings-->
                <h5 class="font-size-20"><?php echo $item['item_name'] ?? 'Unknown'; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-size-14">20,005 ratings | 1000+ anwsered questions.</a>
                </div>
                <hr class="m-0">

                <!--Product Price-->
                <table class="my-3">
                    <tr class="font-size-14">
                        <td>M.R.P.</td>
                        <td><strike>&dollar;162.00</strike></td>
                    </tr>
                    <tr class="font-size-14">
                        <td>Deal Price</td>
                        <td class="font-size-20 text-danger">&dollar;<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;plus taxes.</small></td>
                    </tr>
                    <tr class="font-size-14">
                        <td>You save:</td>
                        <td><span class="font-size-16 text-danger">&dollar;10.00</span></td>
                    </tr>
                </table>

                <!--Product policy-->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-size-12">10 Days <br>Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-size-12">Fast <br>Delivery.</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-size-12">1 year <br>Warranty.</a>
                        </div>
                    </div>
                </div>
                <hr>

                <!--Order details-->
                <div id="order-details" class="d-flex flex-column text-dark">
                    <small>Delivery by: Dec 1 - Dec 3.</small>
                    <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 10098 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 200222.</small>
                </div>

                <!--Color and qty-->
                <div class="row">
                    <!--Color selector-->
                    <div class="col-6">
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6>Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                            </div>
                        </div>
                    </div>
                    <!--Quantity selector-->
                    <div class="col-6">
                        <div class="qty d-flex">
                            <h6>Quantity</h6>
                            <div class="px-4 d-flex">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty-input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Size-->
                <div class="size my-3">
                    <h6>Size</h6>
                    <div class="d-flex justify-content-between w-75">
                        <button class="btn border p-2 font-size-14">2GB RAM</button>
                        <button class="btn border p-2 font-size-14">4GB RAM</button>
                        <button class="btn border p-2 font-size-14">8GB RAM</button>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h6>Product Description.</h6>
                <hr>
                <p class="font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, reiciendis. Cupiditate in sint molestias odio dolor voluptatem sed ipsa sunt voluptas eaque reprehenderit ut id autem earum possimus, quis quaerat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci laudantium quaerat dolor fugiat vel, commodi quae consequuntur totam excepturi voluptatem officiis minus fugit incidunt. Facere ex autem nemo fuga labore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error velit dolorum quidem similique dolores commodi, laborum enim vitae quas eligendi a, reprehenderit nobis consectetur, tempore aperiam dignissimos! Ipsa, dolorem porro.</p>
                <p class="font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, reiciendis. Cupiditate in sint molestias odio dolor voluptatem sed ipsa sunt voluptas eaque reprehenderit ut id autem earum possimus, quis quaerat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci laudantium quaerat dolor fugiat vel, commodi quae consequuntur totam excepturi voluptatem officiis minus fugit incidunt. Facere ex autem nemo fuga labore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error velit dolorum quidem similique dolores commodi, laborum enim vitae quas eligendi a, reprehenderit nobis consectetur, tempore aperiam dignissimos! Ipsa, dolorem porro.</p>
            </div>
        </div>
    </div>
</section>

<?php 
    endif;
    endforeach; 
?>