<?php
require_once(USER_PATH . 'models/Category.php');
$categories = Category::all();
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="/">
            Fashion
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin.php?controller=admin">Admin</a>
                    </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/pages">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/about">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/contact">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">All</a>
                    </li>
                    <?php
                    foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/products/cate/<?php echo $category['slug']; ?>">
                            <?php echo $category['category_name']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                    data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-icon position-relative text-decoration-none" href="/products/cart">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="/products/order">
                    <i class="fa fa-fw fa-money-bill-wave"></i>
                </a>
                
                <a class="nav-icon position-relative text-decoration-none" href="/pages/user">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="/pages/logout">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
                <?php else: ?>
                <a href="/pages/login">
                    <input type="submit" class="btn btn-success" value="Đăng nhập">
                </a>
                <?php endif; ?>

            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->