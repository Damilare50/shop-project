<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-item'])) {
      $deletedRecord = $cart->deleteCartItem($_POST['item_id']);
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add-wish-item'])) {
      $wishlist->addToWishlist($_POST['item_id'], $_POST['user_id']);
    }
  }

  $in_wish = $wishlist->getWishId($product->getData('wishlist'));
?>

<!--Shopping cart-->
<section id="cart" class="py-3">
  <div class="container-fluid w-75">
    <h5 class="font-size-20">Shopping Cart</h5> 
    <div class="row">
      <div class="col-sm-9">
        <?php 
          foreach($product->getData('cart') as $item) :
            $_cart = $product->getProduct($item['item_id']);
            $subTotal[] = array_map(function ($item) use ($in_wish) {
        ?>
        <div class="row border-top py-3 mt-3">
          <div class="col-sm-2">
            <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'; ?>" alt="cart1" style="height: 120px;" class="img-fluid">
          </div>
          <div class="col-sm-8">
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
              <a href="#" class="px-2 font-size-14">20,005 ratings</a>
            </div>
            <div class="qty d-flex pt-2">
              <div class="d-flex w-25">
                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
              </div>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                <button type="submit" name="delete-cart-item" class="btn text-danger border-right px-3">Delete</button>
              </form>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php 
                  if (in_array($item['item_id'], $in_wish ?? [])) {
                    echo '<button type="submit" disabled class="btn text-success font-size-12">In Wishlist!</button>';
                  } else {
                    echo '<button type="submit" name="add-wish-item" class="btn text-danger">Save for Later</button>';
                  }
                ?>
              </form>
            </div>
          </div>
          <div class="col-sm-2 text-right">
            <div class="font-size-20 text-danger">
              &dollar;<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
            </div>
          </div>
        </div>
        <?php
            return $item['item_price'];
          }, $_cart);
          endforeach;
        ?>
      </div>
      <?php 
        if (count($product->getData('cart')) != 0) :
      ?>
      <div class="col-sm-3">
        <div class="sub-total text-center mt-2 border">
          <h6 class="font-size-12 text-success py-3"><i class="fas fa-check"></i> Your Order is elegible for FREE delivery.</h6>
          <div class="border-top py-4">
            <h5 class="font-size-20">Subtotal(<?php echo isset($subTotal) ? count($subTotal) : 0; ?> items):&nbsp;<span class="text-danger">&dollar;<span id="deal-price"><?php echo isset($subTotal) ? $cart->getProductSum($subTotal) : 0; ?></span></span></h5>
            <button type="submit" class="btn btn-warning mt-3">Proceed to buy</button>
          </div>
        </div>
      </div>
      <?php 
        endif;
      ?>
    </div>
  </div>
</section>