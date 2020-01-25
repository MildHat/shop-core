<div class="container mt-5">
    <h2><?= ucwords($brand->title) ?></h2>
</div>
<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--content side-->
            <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="shop-upper-box clearfix">
                    <div class="items-label pull-left"><!--Showing <?//= $offset + 1 ?> <?//= $offset + count($products) ?> of <?//= $countOfProducts ?> results-->
                        <div class="link-box">
                            <a href="shop-grid.html" class="active"><i class="fa fa-th"></i></a>
                            <a href="shop-list.html"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                    <div class="sort-by pull-right">
                        <select class="custom-select-box">
                            <option>Default Sorting</option>
                            <option>Price: Lowest First</option>
                            <option>Price: Highest First</option>
                            <option>Ascending</option>
                            <option>Descending</option>
                        </select>
                    </div>
                </div>

                <div class="row clearfix">

                    <?php if ($products): ?>
                        <?php foreach ($products as $product): ?>
                            <!-- Product Block -->
                            <div class="product-block col-md-4 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <a href="/product/<?= $product->alias ?>"><img src="/images/uploads/products/<?= $product->main_image ?>" alt=""></a>
                                        <?php if ($product->is_sale): ?>
                                            <span class="tag">Sale!</span>
                                        <?php endif; ?>
                                        <div class="link-box">
                                            <a href="/images/uploads/products/<?= $product->main_image ?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-eye-1"></span></a>
                                            <a href="#"><span class="flaticon-like-1"></span></a>
                                            <a><span data-id="<?= $product->id ?>" data-title="<?= ucwords($product->title) ?>" data-price="<?php if ($product->is_sale and $product->sale_price) { echo $product->sale_price; } else { echo $product->price; } ?>" data-image="<?= $product->small_image ?>" data-quantity="1" class="flaticon-shopping-bag add-to-cart"></span></a>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <h3><a href="/product/<?= $product->alias ?>"><?= ucwords($product->title) ?></a></h3>
                                        <span class="price">
                                            <!-- deleted price -->
                                            <?php if ($product->is_sale and $product->sale_price): ?>
                                                <del>$<?= $product->price ?></del>
                                            <?php endif; ?>

                                            <!-- price -->
                                            <?php if ($product->is_sale and $product->sale_price): ?>
                                                $<?= $product->sale_price ?>
                                            <?php else: ?>
                                                $<?= $product->price ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!--                Styled Pagination -->
                <!--                <div class="styled-pagination text-center">-->
                <!--                    <ul class="clearfix">-->
                <!--                        --><?php //if ($page > 1): ?>
                <!--                            <li><a href="/products/page---><?//= $page - 1 ?><!--"><i class="fa fa-angle-left"></i></a></li>-->
                <!--                        --><?php //endif; ?>
                <!---->
                <!--                        --><?php //for ($i = 1; $i <= $amountOfPages; $i++): ?>
                <!--                            <li class="--><?php //if ($page === $i) echo 'active'; ?><!--"><a href="/products/page---><?//= $i ?><!--">--><?//= $i ?><!--</a></li>-->
                <!--                        --><?php //endfor; ?>
                <!---->
                <!--                        --><?php //if ($page < $amountOfPages): ?>
                <!--                            <li><a href="/products/page---><?//= $page + 1 ?><!--"><i class="fa fa-angle-right"></i></a></li>-->
                <!--                        --><?php //endif; ?>
                <!--                    </ul>-->
                <!--                </div>-->
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <aside class="sidebar shop-sidebar">

                    <?php if ($categories): ?>
                        <!-- Categories -->
                        <?= $categories->getHtml() ?>
                    <?php endif; ?>

                    <?php if($brands): ?>
                        <!-- Brands -->
                        <?= $brands->getHtml() ?>
                    <?php endif; ?>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Page Container -->
