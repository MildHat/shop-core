<!--Page Title-->
<section class="page-title style-two">
    <div class="auto-container">
        <ul class="bread-crumb clearfix">
            <li><a href="/">Home </a></li>
            <li><a href="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER'] ?>">Shop </a></li>
            <li><?= ucwords($product->title) ?></li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!-- Shop Product -->
<section class="shop-product">
    <div class="auto-container">
        <!-- Product Details -->
        <div class="product-details sticky-container">
            <div class="row clearfix">
                <div class="info-column pull-right col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-column">
                        <div class="detail-box sticky-box">
                            <h4><?= ucwords($product->title) ?></h4>
                            <?php if ($product->is_sale and $product->sale_price): ?>
                                <div class="item-price">
                                    <del>$<?= $product->price ?></del>
                                    $<?= $product->sale_price ?>
                                </div>
                            <?php else: ?>
                                <div class="item-price">$<?= $product->price ?></div>
                            <?php endif; ?>
                            <div class="text">
                                <?= $product->short_description ?>
                            </div>

                            <div class="color-and-size clearfix">
                                <div class="color-option pull-left">
                                    <h5>Color :</h5>
                                    <div class="color-list-two">
                                        <span class="brown active"></span>
                                        <span class="light-brown"></span>
                                        <span class="dark-brown"></span>
                                    </div>
                                </div>

                                <div class="size-option pull-left">
                                    <h5>Size : </h5>
                                    <span>6</span>
                                    <span class="active">7</span>
                                    <span>8</span>
                                </div>
                            </div>

                            <div class="other-options clearfix">
                                <div class="item-quantity">
                                    <div class="quantity-spinner">
<!--                                        <button type="button" class="minus minus-quantity">-</button>-->
                                        <input type="text" name="product" placeholder="1" class="prod_qty quantity-input">
<!--                                        <button type="button" class="plus plus-quantity">+</button>-->
                                    </div>
                                </div>
                                <button type="button" data-id="<?= $product->id ?>" data-title="<?= ucwords($product->title) ?>" data-price="<?php if ($product->is_sale and $product->sale_price) { echo $product->sale_price; } else { echo $product->price; } ?>" data-image="<?= $product->small_image ?>" data-quantity="1" class="theme-btn btn-style-three pull-left add-to-cart"><i class="flaticon-shopping-bag"></i> Add to Cart</button>
                                <div class="like pull-left"><a href="shopping-cart.html"><i class="flaticon-like"></i></a></div>
                            </div>

                            <ul class="info-list">
                                <li><span>Code : </span><?= $product->code ?></li>
                                <li><span>Categories : </span> <a href="#">Accessories</a>, <a href="#">Catalog</a>, <a href="#">Sidebag</a>, <a href="#">Backpacks</a></li>
<!--                                <li><span>Share : </span>-->
<!--                                    <ul class="social-links-one">-->
<!--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
<!--                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="image-column col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><a href="/images/uploads/products/<?= $product->main_image ?>" class="lightbox-image" data-fancybox="gallery"><img src="/images/uploads/products/<?= $product->main_image ?>" alt=""></a></div>
                        <div class="image-box"><a href="/images/resource/shop-product-5.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/images/resource/shop-product-5.jpg" alt=""></a></div>
                        <div class="image-box"><a href="/images/resource/shop-product-6.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/images/resource/shop-product-6.jpg" alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Info Tabs -->
        <div class="product-info-tabs">
            <div class="prod-tabs tabs-box" id="product-tabs">
                <!--Tab Btns-->
                <ul class="tab-btns tab-buttons clearfix">
                    <li data-tab="#prod-description" class="tab-btn active-btn">Description</li>
                    <li data-tab="#prod-reviews" class="tab-btn">Review(03)</li>
                </ul>

                <!--Tabs Content-->
                <div class="tabs-container tabs-content">

                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="prod-description">

                        <div class="content">
                            <div class="text">
                                <?= $product->description ?>
                            </div>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="prod-reviews">

                        <!--Reviews Container-->
                        <div class="reviews-container">

                            <!--Reviews-->
                            <article class="review-box clearfix">
                                <figure class="rev-thumb"><img src="/images/resource/review-thumb-1.jpg" alt=""></figure>
                                <div class="rev-content">
                                    <div class="rev-info"><span>James Koster</span> June 7, 2013</div>
                                    <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                                    <div class="rev-text"><p>Product is simply dummy text of the printing and typesetting Autocare. Lorem Ipsum has been the workshop.</p></div>
                                </div>
                            </article>

                            <!--Reviews-->
                            <article class="review-box reply clearfix">
                                <figure class="rev-thumb"><img src="/images/resource/review-thumb-2.jpg" alt=""></figure>
                                <div class="rev-content">
                                    <div class="rev-info"><span>Cobus Besten</span> June 7, 2013</div>
                                    <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                                    <div class="rev-text"><p>Product is simply dummy text of the printing</p></div>
                                </div>
                            </article>

                            <!--Reviews-->
                            <article class="review-box clearfix">
                                <figure class="rev-thumb"><img src="/images/resource/review-thumb-3.jpg" alt=""></figure>
                                <div class="rev-content">
                                    <div class="rev-info"><span>Magnus</span> June 7, 2013</div>
                                    <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                                    <div class="rev-text"><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p></div>
                                </div>
                            </article>
                        </div>

                        <!-- Comment Form -->
                        <div class="shop-comment-form">
                            <h2>Add a Review</h2>
                            <div class="mail-text"><span class="theme_color">Your email address will not be published.</span> Required fields are marked*</div>
                            <div class="rating-box">
                                <div class="text"> Your Rating:</div>
                                <div class="rating"><a href="#" class="rate-box"><span class="fa fa-star"></span></a><a href="#" class="rate-box"><span class="fa fa-star"></span> <span class="fa fa-star"></span></a><a href="#" class="rate-box"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a><a href="#" class="rate-box"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a><a href="#" class="rate-box"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></a></div>
                            </div>
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <label>Your Review*</label>
                                    <textarea name="message" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="number" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <button class="theme-btn btn-style-three" type="submit" name="submit-form">Submit now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Post -->
        <div class="related-posts">
            <h3>Related Products</h3>

            <div class="row clearfix">
                <!-- Product Block -->
                <div class="product-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="product-details.html"><img src="/images/resource/products/17.jpg" alt=""></a>
                            <div class="link-box">
                                <a href="/images/resource/products/17.jpg" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                                <a href="#"><span class="flaticon-like-1"></span></a>
                                <a href="shopping-cart.html"><span class="flaticon-shopping-bag"></span></a>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="product-details.html">Casual Hat</a></h3>
                            <span class="price">$80.00</span>
                            <div class="color-list">
                                <span class="brown active"></span>
                                <span class="gray"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Block -->
                <div class="product-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="product-details.html"><img src="/images/resource/products/18.jpg" alt=""></a>
                            <div class="link-box">
                                <a href="/images/resource/products/18.jpg" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                                <a href="#"><span class="flaticon-like-1"></span></a>
                                <a href="shopping-cart.html"><span class="flaticon-shopping-bag"></span></a>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="product-details.html">Denim Pants</a></h3>
                            <span class="price">$155.70</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block -->
                <div class="product-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="product-details.html"><img src="/images/resource/products/19.jpg" alt=""></a>
                            <span class="tag">Sale!</span>
                            <div class="link-box">
                                <a href="/images/resource/products/19.jpg" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                                <a href="#"><span class="flaticon-like-1"></span></a>
                                <a href="shopping-cart.html"><span class="flaticon-shopping-bag"></span></a>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="product-details.html">Fancy Top</a></h3>
                            <span class="price">$172.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Block -->
                <div class="product-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="product-details.html"><img src="/images/resource/products/20.jpg" alt=""></a>
                            <span class="tag">Sale!</span>
                            <div class="link-box">
                                <a href="/images/resource/products/20.jpg" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                                <a href="#"><span class="flaticon-like-1"></span></a>
                                <a href="shopping-cart.html"><span class="flaticon-shopping-bag"></span></a>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="product-details.html">Trendy Sidebag</a></h3>
                            <span class="price"><del>$26.00</del> $22.10</span>
                            <div class="color-list">
                                <span class="gray active"></span>
                                <span class="dark-gray"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
