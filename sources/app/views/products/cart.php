<!-- shopping cart -->
<section class="p-3" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); padding-top:60px"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                </ol>
            </nav>
            <!--  form -->
            <form action="/products/cart" method="post">

                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">

                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">

                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">
                                                <?php echo $num_items_in_cart ?> items
                                            </h6>
                                        </div>
                                        <!-- src -> ... alt -> ... Shirt->.. -->
                                        <hr class="my-4">


                                        <?php if (empty($products)): ?>
                                        <h6 class="mb-0 text-muted">No added products</h6>
                                        <?php else: ?>
                                        <?php foreach ($products as $product): ?>
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <a href="/products/product/<?= $product['id'] . "-" . $product['slug'] ?>">
                                                    <img src="<?= PATH_URL_IMG_PRODUCT . $product['img1']; ?>"
                                                        class="img-fluid rounded-3"
                                                        alt="<?php echo $product['name']; ?>">
                                                </a>

                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2">
                                                <a href="/products/product/<?= $product['id'] . "-" .$product['slug'] ?>">
                                                    <h6 class="text-black mb-0">
                                                        <?php echo $product['name']; ?>
                                                    </h6>
                                                </a>
                                                <p><span class="text-muted">Màu:
                                                        <?php echo $product['color'] ?>
                                                    </span>
                                                </p>
                                                <a href="/index.php?controller=products&action=cart&remove=<?= $product['id'] ?>"
                                                    class="remove"><button class="btn" type="button">Xóa</button></a>
                                            </div>
                                            <!-- quantity
                        <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input id="form1" min="0" name="quantity" value="1" type="number"
                            class="form-control form-control-sm" />

                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        -->
                                            <div class="col-md-3 col-lg-3 col-xl-1 d-flex">
                                                <input type="number" name="quantity-<?= $product['id'] ?>"
                                                    value="<?= $products_in_cart[$product['id']] ?>" min="1" max="100"
                                                    placeholder="Quantity" style="min-width: 1px;" required>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2 ">
                                                <?php if ($product['saleoff']): ?>
                                                <del>
                                                    <?php echo number_format($product['price'], 0, ',', '.'); ?>
                                                </del>
                                                <br>
                                                <span style="color:#dc3545; font-size:120%">
                                                    <?php echo number_format($product['price'] - $product['price'] * $product['percentoff'] / 100, 0, ',', '.') ?>
                                                </span>

                                                <?php else:
                                                    echo number_format($product['price'], 0, ',', '.'); ?>
                                                <?php endif; ?>
                                            </div>
                                            <!-- 
                                            <div class="col-md-1 col-lg-1 col-xl-2 text-end">
                                                 number_format($product['price'] * $products_in_cart[$product['id']], 0, ',', '.') ?>
                                            </div> -->

                                        </div>

                                        <hr class="my-4">

                                        <?php endforeach; ?>
                                        <?php endif; ?>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="/products" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <!-- total price-->
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">
                                                <?php echo $num_items_in_cart ?> items
                                            </h5>
                                            <h5>
                                                <?php echo number_format($subtotal, 0, ',', '.'); ?>
                                            </h5>
                                        </div>





                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>
                                                <?php echo number_format($subtotal, 0, ',', '.'); ?>
                                            </h5>
                                        </div>

                                        <input type="submit" class="btn btn-dark btn-block btn-lg" value="Update"
                                            name="update">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="/products/order" method="post">
                <div class="mb-3 mt-2">
                    <label for="inputprovince">Tỉnh/thành nhận hàng</label>
                    <input type="text" class="form-control mt-1" id="province_order" name="province_order"
                        placeholder="Tỉnh/thành" required>

                </div>
                <div class="mb-3">
                    <label for="inputaddress">Địa chỉ nhận hàng</label>
                    <textarea class="form-control mt-1" id="address_order" name="address_order" placeholder="Địa chỉ"
                        rows="3" required></textarea>
                </div>
                <?php if (isset($_SESSION['user'])): ?>
                <input type="submit" class="btn btn-dark btn-block btn-lg" value="Order" name="order">
                <?php else: ?>
                <a href="/pages/login" class="btn mt-3 text-uppercase">Đăng nhập để đặt hàng</a>
                <?php endif; ?>
            </form>
            <hr class="my-4">
            <!-- end form -->

        </div>
    </div>
</section>

<!-- end of shopping cart -->