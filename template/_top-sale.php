<?php 
  
  shuffle($product_get); 

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['top-sale-submit'])) {
      $cart->addToCart($_POST['item_id'], $_POST['user_id'], '#top-sale');
    }
  }
?>




<section id="top-sale">
  <div class="container py-5">
    <h4 class="font-size-20">Top Sales</h4>
    <hr>
    <div class="owl-carousel owl-theme">
      <?php foreach ($product_get as $item) {?>
      <div class="item py-2">
        <div class="product">
          <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item["item_image"] ?? './assets/products/1.png'; ?>" alt="Product1" class="img-fluid"></a>
          <div class="text-center">
            <h6><?php echo $item["item_name"] ?? "Unknown"; ?></h6>
            <div class="rating text-warning font-size-12">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="far fa-star"></i></span>
            </div>
            <div class="price py-2">
              <span>&dollar;<?php echo $item["item_price"] ?? "0"; ?></span>
            </div>
            <form method="POST">
              <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?? 1; ?>">
              <input type="hidden" name="user_id" value="<?php echo 1; ?>">
              <?php 
                if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                  echo '<button type="submit" disabled class="btn btn-success font-size-12">In Cart!</button>';
                } else {
                  echo '<button type="submit" name="new-phones-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                }
              ?>
            </form>
          </div>
        </div>
      </div>
      <?php }; ?>
    </div> 
  </div>
</section>