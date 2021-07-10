<!-- Shopping Cart -->
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['delete_cart_submit'])){
            $deleted_cart = $cart->deleteCart($_POST['item_id']);
        }

        //save for later
        if(isset($_POST['wishlist_submit'])){
            $cart->saveForLater($_POST['item_id']);
        }
    }
?>
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
                <?php 
                    foreach($product->getData('cart') as $item):
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
                                <div class="d-flex font-rale w-25">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-50 border bg-light" value="1" placeholder="1" disabled>
                                    <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
                                </div>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="delete_cart_submit"class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="wishlist_submit" class="btn font-baloo text-danger px-3">Save For Later</button>
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
            <!-- Subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivary</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-18">Subtotal (<?php echo isset($subTotal)? count($subTotal) : 0; ?> items)&nbsp;<span class="text-danger">$ <span class="text-danger" id="deal_price"><?php echo isset($subTotal)? $cart->getSum($subTotal): 0; ?></span></span></h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- ./Subtotal section -->
        </div>
        <!-- ./shopping cart items -->
    </div>
</section>
<!-- ./Shopping Cart -->