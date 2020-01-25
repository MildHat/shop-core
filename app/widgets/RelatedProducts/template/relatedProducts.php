<?php if ($this->data): ?>
<!-- Related Post -->
<div class="related-posts">
    <h3>Related Products</h3>

    <div class="row clearfix">
        <?php foreach ($this->data as $product): ?>
            <!-- Product Block -->
            <div class="product-block col-md-3 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box">
                        <a href="/product/<?= $product['alias'] ?>"><img src="/images/uploads/products/<?= $product['main_image'] ?>" alt=""></a>
                        <?php if ($product['is_sale']): ?>
                            <span class="tag">Sale!</span>
                        <?php endif; ?>
                        <div class="link-box">
                            <a href="/images/uploads/products/<?= $product['main_image'] ?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                            <a href="#"><span class="flaticon-like-1"></span></a>
                            <a><span data-id="<?= $product['id'] ?>" data-title="<?= ucwords($product['title']) ?>" data-price="<?php if ($product['is_sale'] and $product['sale_price']) { echo $product['sale_price']; } else { echo $product['price']; } ?>" data-image="<?= $product['small_image'] ?>" data-quantity="1" class="flaticon-shopping-bag add-to-cart"></span></a>
                        </div>
                    </div>
                    <div class="content-box">
                        <h3><a href="/product/<?= $product['alias'] ?>"><?= $product['title'] ?></a></h3>
                        <span class="price">
                            <!-- deleted price -->
                            <?php if ($product['is_sale'] and $product['sale_price']): ?>
                                <del>$<?= $product['price'] ?></del>
                            <?php endif; ?>

                            <!-- price -->
                            <?php if ($product['is_sale'] and $product['sale_price']): ?>
                                $<?= $product['sale_price'] ?>
                            <?php else: ?>
                                $<?= $product['price'] ?>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>