<?php
require_once(USER_PATH . 'models/Product.php');
$products = Product::select_hot_product();
?>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="/img/pages/banner_img_01.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Fashion</b> Store</h1>
                            <h3 class="h2">Cửa hàng quần áo thời trang hàng đầu Việt Nam</h3>
                            <p>
                                Chúng tôi cung cấp những sản phẩm thời trang chất lượng cao, đa dạng về mẫu mã, phong
                                cách và giá cả phù hợp với mọi người.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="/img/pages/banner_img_02.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Tại sao chọn</b> chúng tôi</h1>
                            <h3 class="h2">Vô vàn chính sách ưu đãi</h3>
                            <p>
                                Miễn phí giao hàng toàn quốc, đổi trả trong vòng 30 ngày, hỗ trợ 24/7, giá cả cạnh
                                tranh, chất lượng sản phẩm tốt. Sản phẩm được nhập khẩu từ các thương hiệu nổi tiếng.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="img/pages/banner_img_03.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success">Về <b>chúng tôi</b></h1>
                            <h3 class="h2">Lí do ra đời</h3>
                            <p>
                                Hướng tới mục tiêu giúp mọi người ngày càng tự tin, trẻ trung, Fashion mong muốn mang
                                lại trải nghiệm mới với những sản phẩm mang xu hướng thời trang thịnh hành nhất.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Danh mục sản phẩm</h1>
            <p>
                Danh mục các sản phẩm được bán trên website
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="img/pages/shop_07.jpg" style="height:500px;"
                    class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Thời trang nam</h5>
            <p class="text-center"><a class="btn btn-success" href='/products/cate/nam'>Xem thêm</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="img/pages/shop_01.jpg" style="height:500px;"
                    class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Thời trang nữ</h2>
            <p class="text-center"><a class="btn btn-success" href='/products/cate/nu'>Xem thêm</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="img/pages/shop_00.jpg" style="height:500px;"
                    class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Thời trang trẻ em</h2>
            <p class="text-center"><a class="btn btn-success" href='/products/cate/tre-em'>Xem thêm</a></p>
        </div>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản phẩm bán chạy</h1>
                <p>
                    Sản phẩm được bán chạy nhất trên website
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($products as $product): ?>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="/products/product/<?php echo $product['id']; ?>">
                        <img src="<?= PATH_URL_IMG_PRODUCT.$product["img1"]?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted text-right"><?php echo $product['price']; ?></li>
                        </ul>
                        <a href="/products/product/<?php echo $product['id']; ?>" class="h2 text-decoration-none text-dark"><?php echo $product['name']; ?></a>
                        <p class="card-text">
                        <?php echo $product['description']; ?></li>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Featured Product -->