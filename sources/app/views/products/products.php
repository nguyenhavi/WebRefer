<!--men collection -->
<!--men collection -->
<section id="mencollection" class="py-5 ">
    <div class="container">

        <?php if (!isset($_GET['category'])) : ?>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); padding-top:80px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tất cả sản phẩm
                    </li>
                </ol>
            </nav>
            <div class="row g-0">
                <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <form action="/products" method="post">
                        <input type="submit" class="btn m-2 text-dark <?php if (!(isset($_POST['bestsellers'])) && !(isset($_POST['onsale'])) && !(isset($_POST['newarrival'])))
                                                                            echo 'active-filter-btn'; ?>" value="All" name="all">
                        <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['bestsellers']))
                                                                            echo 'active-filter-btn'; ?>" value="Best Sellers" name="bestsellers">
                        <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['onsale']))
                                                                            echo 'active-filter-btn'; ?>" value="On Sale" name="onsale">
                        <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['newarrival']))
                                                                            echo 'active-filter-btn'; ?>" value="New Arrival" name="newarrival">
                    </form>

                </div>

                <div class="collection-list mt-4 row gx-0 gy-3">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                            <div class="collection-img position-relative">
                                <a href="/products/product/<?php echo $product['id'] . "-" . $product['slug']; ?>">
                                    <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['img1'] ?>" class="w-100">
                                    <?php if ($product['type_id'] == 1) : ?>
                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">HOT</span>
                                    <?php elseif ($product['type_id'] == 2) : ?>
                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">NEW</span>
                                    <?php elseif ($product['type_id'] == 3) : ?>
                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                                    <?php endif; ?>
                                </a>

                            </div>
                            <div class="text-center">
                                <div class="rating mt-3">
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-capitalize my-1">
                                    <?php echo $product['name'] ?>
                                </p>
                                <span class="fw-bold">
                                    <?php if ($product['saleoff']) : ?>
                                        <del>
                                            <?php echo number_format($product['price'], 0, ',', '.'); ?>
                                        </del>
                                        <span style="color:#dc3545; font-size:120%">
                                            <?php echo number_format($product['price'] - $product['price'] * $product['percentoff'] / 100, 0, ',', '.') ?>
                                        </span>

                                    <?php else :
                                        echo number_format($product['price'], 0, ',', '.'); ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else : ?>
                <?php foreach ($categories as $category) :
                    if ($_GET['category'] == $category['slug']) : ?>

                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); padding-top:80px" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $category['category_name'] ?>
                                </li>
                            </ol>
                        </nav>
                        <div class="title text-center ">
                            <h2 class="position-relative d-inline-block">Thời trang
                                <?php echo $category['category_name'] ?>
                            </h2>
                        </div>

                        <div class="row g-0">
                            <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                                <form action="/products/cate/<?php echo $category['slug']; ?>" method="post">
                                    <input type="submit" class="btn m-2 text-dark <?php if (!(isset($_POST['bestsellers'])) && !(isset($_POST['onsale'])) && !(isset($_POST['newarrival'])))
                                                                                        echo 'active-filter-btn'; ?>" value="All" name="all">
                                    <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['bestsellers']))
                                                                                        echo 'active-filter-btn'; ?>" value="Best Sellers" name="bestsellers">
                                    <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['onsale']))
                                                                                        echo 'active-filter-btn'; ?>" value="On Sale" name="onsale">
                                    <input type="submit" class="btn m-2 text-dark <?php if (isset($_POST['newarrival']))
                                                                                        echo 'active-filter-btn'; ?>" value="New Arrival" name="newarrival">
                                </form>

                            </div>

                            <div class="collection-list mt-4 row gx-0 gy-3">
                                <?php foreach ($products as $product) :
                                    if (($product['category_id'] == $category['id'])) : ?>

                                        <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                                            <div class="collection-img position-relative">
                                                <a href="/products/product/<?php echo $product['id'] . "-" . $product['slug']; ?>">
                                                    <img src="<?php echo PATH_URL_IMG_PRODUCT . $product['img1'] ?>" class="w-100">
                                                    <?php if ($product['type_id'] == 1) : ?>
                                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">HOT</span>
                                                    <?php elseif ($product['type_id'] == 2) : ?>
                                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">NEW</span>
                                                    <?php elseif ($product['saleoff']) : ?>
                                                        <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                                                    <?php endif; ?>
                                                </a>

                                            </div>
                                            <div class="text-center">
                                                <div class="rating mt-3">
                                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                                </div>
                                                <p class="text-capitalize my-1">
                                                    <?php echo $product['name'] ?>
                                                </p>
                                                <span class="fw-bold">
                                                    <?php if ($product['saleoff']) : ?>
                                                        <del>
                                                            <?php echo number_format($product['price'], 0, ',', '.'); ?>
                                                        </del>
                                                        <span style="color:#dc3545; font-size:120%">
                                                            <?php echo number_format($product['price'] - $product['price'] * $product['percentoff'] / 100, 0, ',', '.') ?>
                                                        </span>

                                                    <?php else :
                                                        echo number_format($product['price'], 0, ',', '.'); ?>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>

                                <?php endif;
                                endforeach; ?>
                            </div>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
</section>
<!-- end of collection men-->
