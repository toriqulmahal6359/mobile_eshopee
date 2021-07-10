<!-- product -->
<?php
    $item_id = $_GET['item_id'] ?? '1';
    $product_page = $product->getData();
    $in_cart = $cart->getCartId($product->getData('cart'));
    foreach($product_page as $item):
        if($item['item_id'] == $item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ;?>" alt="<?php echo $item['item_name']; ?>" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                    </div>
                    <div class="col">
                        <?php
                            if(in_array($item['item_id'], $in_cart ?? [])){
                                echo '<button type="submit" class="btn btn-success font-size-16 form-control" disabled>In The Cart</button>';
                            }else{
                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add To Cart</button>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="font-rale font-size-14 px-2">20,534 ratings | 1000+ answered Questions</a>
                </div>
                <hr class="m-0">

                <!-- product price-->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P: </td>
                        <td><strike>$ <?php echo $item['item_price']; ?></strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price: </td>
                        <td class="text-danger font-size-20">$ <span><?php echo $item['item_price']; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save: </td>
                        <td><span class="font-size-16 text-danger">$ 15.00</span></td>
                    </tr>
                </table>
                <!-- ./product price-->

                <!-- policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days <br>Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Fast Track <br>Delivery</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- ./policy -->
                <hr>
                <!-- Order Details-->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivary By : May 31 - June 10</small>
                    <small>Sold By <a href="#">Bla Bla Electronics</a>(4.5 out of 5 | 18198 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;&nbsp;Deliver To Customer - 424201</small>
                </div>
                <!-- ./Order Details-->

                <div class="row">
                    <div class="col-6">
                        <!-- color -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-12"></button></div>
                                <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-12"></button></div>
                                <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-12"></button></div>
                            </div>
                        </div>
                        <!-- ./color -->
                    </div>
                    <div class="col-6">
                        <!-- product qty-->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="font-rale px-4 d-flex">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 border bg-light" value="1" placeholder="1" disabled>
                                <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- ./product qty-->
                    </div>
                </div>

                <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size:</h6>
                    <div class="d-flex justify-content-between w-50">
                        <div class="font-rubik border p-2 font-size-14">
                            <button class="btn p-0 font-size-14">4 GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2 font-size-14">
                            <button class="btn p-0 font-size-14">8 GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2 font-size-14">
                            <button class="btn p-0 font-size-14">12 GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- ./size -->

            </div>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium vitae eos doloribus ut accusantium natus qui, laudantium impedit inventore amet officiis atque rerum sint. Quidem illo ipsum laudantium voluptatibus facere numquam recusandae? Nostrum rerum cum nihil magni? Officia est deserunt labore a, pariatur ut vitae omnis nostrum inventore corporis culpa vero? Suscipit, vel. Harum, quod quia. In ad veritatis iusto.</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium vitae eos doloribus ut accusantium natus qui, laudantium impedit inventore amet officiis atque rerum sint. Quidem illo ipsum laudantium voluptatibus facere numquam recusandae? Nostrum rerum cum nihil magni? Officia est deserunt labore a, pariatur ut vitae omnis nostrum inventore corporis culpa vero? Suscipit, vel. Harum, quod quia. In ad veritatis iusto.</p>
            </div>
        </div>
    </div>
</section>

<?php
    endif;
    endforeach;
?>
<!-- ./product -->

