<!-- New Phones -->
<?php
    shuffle($product_shuffle);

    //request method post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["new_phones_submit"])){
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    $in_cart = $cart->getCartId($product->getData('cart'));
?>
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>
        <!-- owl carousel-->
        <div class="owl-carousel owl-theme">
        <?php foreach($product_shuffle as $item){ ?>
            <div class="item py-2 bg-light">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="<?php echo $item['item_name']; ?>" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-3">
                            <span>$ <?php echo $item['item_price'] ?? '0'; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                                if(in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" class="btn btn-success font-size-12" disabled>In The Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add To Cart</button>';
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <!--./owl carousel-->
    </div>
</section>
<!-- ./New Phones -->