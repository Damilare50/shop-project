<?php 
  $brand = array_map(function ($pro) { return $pro["item_brand"];}, $product_get);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_get);

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['special-price-submit'])) {
      $cart->addToCart($_POST['item_id'], $_POST['user_id'], '#special-price');
    }
  }

  $in_cart = $cart->getCartId($product->getData('cart'));
?>


<section id="special-price">
  <div class="container">
    <h4 class="font-size-20">Special Price</h4>
    <div id="filters" class="button-group text-right font-size-16">
      <button class="btn is-checked" data-filter="*">All brands</button>
      <?php 
        array_map(function ($brand){
          printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
        }, $unique);
      ?>
    </div>
    <div class="grid">
      <?php array_map(function ($item) use ($in_cart) {?>
      <div class="grid-item border <?php echo $item["item_brand"] ?? "Brand"; ?>">
        <div class="item py-2" style="width: 200px;">
          <div class="product">
            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item["item_image"] ?? "./assets/products/13.png" ?>" alt="Product13" class="img-fluid"></a>
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
                <span>&dollar;<?php echo $item["item_price"] ?? "0" ?></span>
              </div>
              <form method="POST">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?? 1; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php 
                  if (in_array($item['item_id'], $in_cart ?? [])) {
                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In Cart!</button>';
                  } else {
                    echo '<button type="submit" name="special-price-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php }, $product_get); ?>
    </div>
  </div>
</section>