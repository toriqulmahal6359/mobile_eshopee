<!-- Wishlist -->
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['delete_cart_submit'])){
            $deleted_cart = $cart->deleteCart($_POST['item_id']);
        }
        if(isset($_POST['cart_submit'])){
            $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
        }
    }
?>
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlists</h5>

        <!-- wishlist items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
                <?php 
                    foreach($product->getData('wishlist') as $item):
                        $cart_item = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function($item){
                ?>
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="<?php echo $item['item_name']; ?>" style="height: 120px;" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Brand"; ?></h5>
                            <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                            <!-- product ratings-->
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-rale font-size-12">20,534 ratings</a>
                            </div>
                            <!-- ./product ratings-->
                            <!-- product qty -->
                            <div class="qty d-flex pt-2">
                                
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="delete_cart_submit"class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="cart_submit" class="btn font-baloo text-danger px-3">Add To Cart</button>
                                </form>
                                
                            </div>
                            <!-- ./product qty -->
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="font-baloo font-size-20 text-danger">
                                $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                            </div>
                        </div>
                    </div>
                <?php 
                    return $item['item_price'];
                    }, $cart_item);
                    endforeach; 
                    // print_r($subTotal);
                ?>
                <!-- ./cart item -->

            </div>
        </div>
        <!-- ./wishlist items -->
    </div>
</section>
<!-- ./Wishlist -->