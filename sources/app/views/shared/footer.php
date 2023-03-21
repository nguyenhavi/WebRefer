<?php
require_once(USER_PATH . 'models/Category.php');
$categories = Category::all();
?>
  <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Fashion</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:028-3864-7256">028-3864-7256</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@hcmut.edu.vn">info@hcmut.edu.vn</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Danh mục sản phẩm</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                    <?php 
                    foreach ($categories as $category): ?>
                    <li>
                        <a class="text-decoration-none" href="/products/<?php echo 'cate/'.$category['slug'];?>"><?php echo $category['category_name'];?></a>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Thông tin chung</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/">Trang chủ</a></li>
                        <li><a class="text-decoration-none" href="/pages/about">Thông tin</a></li>
                        <li><a class="text-decoration-none" href="/pages/contact">Liên hệ</a></li>
                    </ul>
                </div>

            </div>

            
        </div>
    </footer>
    <!-- End Footer -->