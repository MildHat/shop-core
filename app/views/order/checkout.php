<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/5.jpg);">
    <div class="auto-container">
        <h1>Checkout</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="index.html">Home </a></li>
            <li>Checkout</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--CheckOut Page-->
<div class="checkout-page">
    <div class="auto-container">

        <!--Checkout Details-->
        <div class="checkout-form">
            <form method="post" action="">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="form-column col-md-6 col-sm-12 col-xs-12">
                        <div class="sec-title">
                            <h3>Billing Details</h3>
                        </div>

                        <div class="row clearfix">

                            <!--Form Group-->
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">First Name <sup>*</sup></div>
                                <input type="text" name="f_name" value="" placeholder="" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Last Name <sup>*</sup></div>
                                <input type="text" name="s_name" value="" placeholder="" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Company Name</div>
                                <input type="text" name="company_name" value="" placeholder="" required>
                            </div>


                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Country</div>
                                <select name="country">
                                    <option>United State</option>
                                    <option>Pakistan</option>
                                    <option>India</option>
                                    <option>Australia</option>
                                </select>
                            </div>


                            <!--Form Group-->
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Address <sup>*</sup></div>
                                <input type="text" name="address" value="" placeholder="Street address" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">Town/City</div>
                                <input type="text" name="city" value="" placeholder="" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                <div class="field-label">State / County</div>
                                <input type="text" name="state" value="" placeholder="" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                <div class="field-label">Postal Code</div>
                                <input type="text" name="postal_code" value="" placeholder="" required>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Phone <sup>*</sup></div>
                                <input type="text" name="phone_number" value="" placeholder="" required>
                            </div>

                             <!--Form Group-->
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <div class="field-label">Email Address</div>
                                <input type="text" name="email" value="" placeholder="" required>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <h3>Additional Info</h3>
                                <div class="field-label">Other Notes</div>
                                <textarea name="additional" placeholder="Notes about your order , e.g., special notes for delivery. "></textarea>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="info-column col-md-6 col-sm-12 col-xs-12">
                        <div class="inner-column">
                            <div class="order-box">
                                <div class="title-box clearfix">
                                    <div class="clearfix">Product <span> Total</span></div>
                                </div>
                                <ul class="qty">
                                    <?php $total = 0; ?>
                                    <?php foreach ($productsInCart as $product): ?>
                                        <li class="clearfix">
                                            <?= $product['title'] ?> × <?= $product['quantity'] ?>
                                            <span>$<?php echo $total += $product['price'] * $product['quantity']; ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                                <ul class="total">
                                    <li class="clearfix">Total <span class="total-price">$<?= $total ?></span></li>
                                </ul>
                            </div>

                            <!--Payment Box-->
                            <div class="payment-box">
                                <div class="lower-box text-right">
                                    <input type="submit" class="theme-btn btn-style-four" value="Place Your Order"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--End Checkout Details-->

    </div>
</div>
<!--End CheckOut Page-->
