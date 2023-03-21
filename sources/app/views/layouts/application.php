<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fashion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="public/apple-icon.png">
  <link rel="shortcut icon" type="image/x-icon" href="/public/favicon.ico">

  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/css/templatemo.css">

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="/public/css/fontawesome.min.css">
  <link rel="stylesheet" href="/public/css/custom.css">

  <!-- Start Script -->
  <script src="/public/js/jquery-1.11.0.min.js"></script>
  <script src="/public/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/public/js/bootstrap.bundle.min.js"></script>
  <script src="/public/js/templatemo.js"></script>



  <!-- End Script -->
</head>

<body>
  <?php
  include USER_PATH.'views/shared/header.php';
  include USER_PATH.'views/shared/modal.php';
  ?>
  <?=@$content ?>
    <?php
    include USER_PATH.'views/shared/footer.php';
    ?>
</body>

</html>