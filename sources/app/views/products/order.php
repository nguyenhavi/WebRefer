<?php
// hiển thị tất cả đơn hàng + statuss
?>

<section class="p-3" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;); padding-top:60px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                </ol>
            </nav>

            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">

                        <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">Orders</h1>
                                <h6 class="mb-0 text-muted">
                                    <?php echo $total_orders; ?> order(s)
                                </h6>
                            </div>
                            <!-- src -> ... alt -> ... Shirt->.. -->
                            <hr class="my-4">


                            <?php if (empty($orders)) : ?>
                                <h6 class="mb-0 text-muted">No added orders</h6>
                            <?php else : ?>
                                <?php foreach ($orders as $order) :  $count = 1; ?>
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-3">
                                            <b>Mã đơn hàng:</b>
                                            <?php echo $order['id']; ?>
                                            <br>
                                            <b>Tổng tiền:</b>
                                            <?php echo number_format($order['cart_total'], 0, ',', '.'); ?>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            <?php echo $order['createtime']; ?>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 ">
                                            <?php
                                            if ($order['status'] == 0)
                                                echo "Chờ xử lý"; // new
                                            elseif ($order['status'] == 1)
                                                echo "Đang xử lý"; //processing
                                            elseif ($order['status'] == 2)
                                                echo "Đã hoàn thành"; //complete 
                                            elseif ($order['status'] == 3)
                                                echo "Đã hủy"; //cancel
                                            ?>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 ">
                                            <?php if ($order['status'] == 0): ?>
                                            <form action="/products/order" method="post">
                                                <input type="hidden" name="remove_order_id" value="<?= $order['id'] ?>">
                                                <input type="submit" class="btn btn-dark btn-block btn-lg" value="Xóa đơn" name="remove_order">
                                            </form>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                    <?php foreach ($order_details["'" . $order['id'] . "'"] as $order_detail) : ?>

                                        <div class="accordion accordion-flush" id="accordionFlushExample<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                        ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                    ?>">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                                                                                            ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                                                                                                                                                        ?>">
                                                        Sản phẩm #<?php echo $count;
                                                                    $count = $count + 1 ?>
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                            ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                                                                        ?>" data-bs-parent="#accordionFlushExample<?php echo $order['id'] . $order_detail['id']; //order_id
                                                                                                                                                                                                                                                        ?>">
                                                    <div class="accordion-body">
                                                        <div class="row d-flex justify-content-between align-items-center">
                                                            <div class="col-md-3 col-lg-3 col-xl-2">
                                                                <a href="/products/product/<?= $order_detail['product_id'] . "-" . Product::select_product_by_id($order_detail['product_id'])['slug'] ?>">
                                                                    <img src="<?php echo PATH_URL_IMG_PRODUCT . Product::select_product_by_id($order_detail['product_id'])['img1']; ?>" class="img-fluid rounded-3" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-3">
                                                                <b><?php echo Product::select_product_by_id($order_detail['product_id'])['name']; ?></b>
                                                                <br>
                                                                Giá tiền:<?php $product = Product::select_product_by_id($order_detail['product_id']);
                                                                            if ($product['saleoff']) {
                                                                                echo number_format($order_detail['price'] - $order_detail['price'] * $product['percentoff'] / 100, 0, ',', '.');
                                                                            } else {
                                                                                echo number_format($order_detail['price'], 0, ',', '.');
                                                                            } ?>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2">
                                                                Số lượng: <?php echo $order_detail['quantity']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <hr class="my-4">

                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="/products" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                    </h6>
                                </div>
                                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>