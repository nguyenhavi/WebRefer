<!-- details -->
<section class="p-3">
    <div class="row">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); padding-top:100px"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $product['name'] ?>
                </li>
            </ol>
        </nav>
        <div class="col-md-8 col-sm-12">
            <div class="row">

                <div class="col-12">

                </div>
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['img1'] ?>" class="d-block w-100"
                                    alt="<?php echo $product['name'] ?>">
                            </div>
                            <?php for ($idx = 2; $idx < 5; $idx += 1): ?>
                            <?php if ($product['img' . (string) $idx] != ""): ?>
                            <div class="carousel-item">
                                <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['img' . (string) $idx] ?>"
                                    class="d-block w-100" alt="<?php echo $product['name'] ?>">
                            </div>

                            <?php endif; ?>
                            <?php endfor; ?>

                        </div>
                        <button style="border:none;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button style="border:none;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-md-6 summary">
                    <h3 class="product-title">
                        <?php echo $product['name'] ?>
                    </h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">
                            <?php echo $product['totalView'] ?> reviews
                        </span>
                    </div>
                    <p class="product-description">Nguyên liệu:
                        <?php echo $product['material'] ?>
                    </p>
                    <p class="product-description"><strong>Mô tả</strong>
                        <?php echo $product['description'] ?>
                    </p>
                 
                    <h4 class="price">Giá: <span>
                    <?php if ($product['saleoff']): ?>
                                <del><?php echo number_format($product['price'], 0, ',', '.'); ?> </del>
                                <span style="color:#dc3545; font-size:120%"><?php echo number_format($product['price'] - $product['price'] * $product['percentoff'] / 100, 0, ',', '.') ?></span>
                            
                            <?php else:
                        echo number_format($product['price'], 0, ',', '.'); ?>
                            <?php endif; ?>
                        </span></h4>

                    <h5 class="colors">Màu:
                        <?php echo $product['color'] ?>

                    </h5>
                    <div class="action">
                        <form action="/products/cart" method="post">
                            <input type="number" name="quantity" value="1" min="1" max="10" placeholder="Quantity"
                                required>
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="submit" class="btn" value="Add To Cart">
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <h3 class="product-title">Mô tả</h3>
            <p>
                <?php echo $product['detail'] ?>
            </p>
        </div>
    </div>
</section>
<!-- end of details -->
