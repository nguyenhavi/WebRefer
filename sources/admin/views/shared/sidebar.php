<?php
require_once ADMIN_PATH . "/models/PostType.php";
require_once ADMIN_PATH . "/models/User.php";
$user = User::findByID($_SESSION['user']['id']);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <span class="brand-text font-weight-light">Fashion</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo PATH_URL_IMG.$user["avatar"] ?>" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Hello,
          <?php echo $user["username"] ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- DashBoard -->
        <li class="nav-item menu-open">
          <a href="?controller=admin&action=home" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- End Dashboard -->

        <!-- Users -->
        <li class="nav-item menu-open">
          <a href="?controller=users&action=home" class="nav-link active">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Người dùng
            </p>
          </a>
        </li>
        <!-- End Users -->
        <!-- Categories -->
        <li class="nav-item menu-open">
          <a href="?controller=categories&action=home" class="nav-link active">
             <i class="zmdi zmdi-apps zmdi-hc-lg ms-1 me-2"></i>
            <p>
              Danh mục sản phẩm
            </p>
          </a>
        </li>
        <!-- End Categories -->

        <!-- Products -->
        <li class="nav-item">
          <a class="nav-link active">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              Sản phẩm
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=products" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả sản phẩm</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=products&by=hot" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sản phẩm hot</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=products&by=new" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sản phẩm mới </p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=products&by=sale" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sản phẩm khuyến mãi</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Orders -->
        <li class="nav-item menu-open">
          <a class="nav-link active">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Đơn hàng
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=orders" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả đơn hàng</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=orders&by=new" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng mới</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=orders&by=process" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng đang xử lí</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=orders&by=complete" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng đã xử lí</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=orders&by=cancel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng bị hủy</p>
              </a>
            </li>
          </ul>

        </li>

        <!-- Blog -->
        <li class="nav-item menu-open">
          <a class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Bài viết
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=posts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả bài viết</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=posts&action=status&by=0" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bài viết chưa publish</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=posts&action=status&by=1" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bài viết publish</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="?controller=posts&action=status&by=2" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <a class="nav-link active">
              <p>
                Chủ đề
              </p>
            </a>
            <?php
            $ptypes = PostType::all();
            foreach ($ptypes as $type) {
              $slug = $type["slug"];
              $type_name = $type["type_name"];

              echo '<ul class="nav nav-treeview" style="display: none;">  
                    <li class="nav-item">
                      <a href="?controller=posts&action=home&by=' . $slug . '" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>' . $type_name . '</p>
                      </a>
                    </li>
                  </ul>';
            }
            ?>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>