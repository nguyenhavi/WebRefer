<?php 
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo var_dump($_POST);
  }
  else {
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Editors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="../plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="../plugins/simplemde/simplemde.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <!-- Blog Title -->
        <div class="form-group">
          <label for="blog-title" class="h1 ml-2" >Tiêu đề bài viết</label>
          <input type="text" class="form-control m-2" name="blog-title">
        </div>
      
        <!-- Text Editor -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Summernote
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea name = "blog" id="summernote"  rows="20">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          
        </section>
        <div class="form-group ml-2">
          <button type="submit" class="btn btn-primary btn-lg">Đăng bài</button>
          <button type="button" class="btn btn-secondary btn-lg">Hủy</button>
        </div> 
    </form>
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
</body>
</html>

<?php } ?>