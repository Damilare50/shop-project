<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-wish-item'])) {
      $deletedRecord = $wishlist->deleteWishItem($_POST['item_id']);
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['wishlist-submit'])) {
      $cart->addToCart($_POST['item_id'], $_POST['user_id'], '#wishlist');
    }
  }

  $in_carT = $cart->getCartId($product->getData('cart'));
?>

<!--Wishlist-->
<section id="wishlist" class="py-3">
  <div class="container-fluid w-75">
    <h5 class="font-size-20">Wishlist</h5> 
    <div class="row">
      <div class="col-sm-9">
        <?php 
          foreach($product->getData('wishlist') as $item) :
            $_cart = $product->getProduct($item['item_id']);
            $subTotal[] = array_map(function ($item) use ($in_carT) {
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
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                <button type="submit" name="delete-wish-item" class="btn text-danger border-right pl-0 pr-3">Delete</button>
              </form>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?? 1; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php 
                if (in_array($item['item_id'], $in_carT ?? [])) {
                  echo '<button type="submit" disabled class="btn text-success font-size-12">In Cart!</button>';
                } else {
                  echo '<button type="submit" name="wishlist-submit" class="btn text-danger">Add to Cart</button>';
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
    </div>
  </div>
</section>