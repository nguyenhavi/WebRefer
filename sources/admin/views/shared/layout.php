<?php
// $title = $product['product_name'] . ' - Fashion Shop';
// $image_product = PATH_URL . 'public/upload/products/' . $product['img1'];
// $url_product = 'product/' . $product['id'] . '-' . $product['slug'];

// if (isset($image_product)) $link_image = $image_product;
// else $link_image = PATH_URL . '';
// if (isset($url_product)) $url_site = PATH_URL . $url_product . '/';
// else $url_site = PATH_URL . 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- SEO -->
  <meta property="og:site_name" content="Fashion Shop" />
  <meta property="og:title" content="<?php echo isset($title) ? $title : 'Fashion Shop'; ?>" />
  <meta property="article:tag" content="<?php echo isset($title) ? $title : 'Fashion Shop'; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $url_site; ?>" />
  <link rel="canonical" href="<?php echo $url_site; ?>" />
  <meta property="article:publisher" content="https://www.facebook.com/100030314627238" />
  <meta property="og:description" content="Kinh doanh các mặt hàng thời trang áo quần, giày dép, phụ kiện, ...." />
  <meta property="og:image" content="<?php echo $link_image; ?>" />
  <meta property="og:image:secure_url" content="<?php echo $link_image; ?>" />
  <meta property="og:image:width" content="700" />
  <meta property="og:image:height" content="345" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="fb:app_id" content="100030314627238" />
  <meta name="twitter:description" content="Kinh doanh các mặt hàng thời trang áo quần, giày dép, phụ kiện, ...." />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo isset($title) ? $title : 'Fashion Shop'; ?>" />
  <meta name="twitter:image" content="<?php echo $link_image; ?>" />
  <!-- End SEO -->
  <title>Fashion | Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/admin/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/preloader.css">
  <link rel="stylesheet" href="plugins/material-design-iconic-font/css/material-design-iconic-font.css">

  <!-- Java Script -->


  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/admin/adminlte/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php require_once(ADMIN_PATH . 'views/shared/preloader.php') ?>
  <?php require_once(ADMIN_PATH . 'views/shared/sidebar.php') ?>

  <nav class="main-header navbar navbar-white navbar-light" style="height: 30px;">
    <a class="nav-link ms-2" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

  </nav>

  <section class="content">
    <?= @$content ?>
  </section>

  <script src="js/preloader.js"></script>
</body>

</html>