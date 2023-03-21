<section class="content-wrapper">
  <div class="body_scroll">
    <div class="block-header p-2">
      <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
          <h2>Bài viết</h2>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?controller=admin><i class="zmdi zmdi-home"></i> Fashion</a></li>
            <li class="breadcrumb-item">Blog</li>
            <li class="breadcrumb-item active">Posts</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid p-2">
      <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="card project_list p-3">

            <!-- Add Button -->
            <a href="admin.php?controller=posts&action=add" class="btn btn-success btn-icon float-left" type="button" style="width: 100px;">
              <i class="zmdi zmdi-plus"></i>
            </a>

            <div class="table-responsive">
              <table id="dataTable" class="table table-hover c_table theme-color">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th class="hidden-md-down">Date</th>
                    <th>Slug</th>
                    <th>Loại bài viết</th>
                    <th>Comment</th>
                    <th>Ảnh đại diện</th>
                    <th class="hidden-md-down">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($posts)) {
                    echo '<h3><strong>Hiện không có trang nào trong hệ thống.</strong></h3>';
                  }
                  foreach ($posts as $post) : ?>
                    <tr>
                      <td>
                        <strong><?= $post['title'] ?></strong>
                      </td>
                      <td>
                        <strong><?= $post['date'] ?></strong><br>
                        <small><?= $status[$post['status']] ?></small>
                      </td>
                      <td><?= $post['slug'] ?></td>
                      <td><?= $post['type_name']?></td>

                      <td><span class="badge badge-info"></span></td>
                      <td><img src="<?= PATH_URL_IMG_BLOG . $post["main_pic"] . '?time=' . time() ?>" style="max-width:100px;" alt=""></td>
                      <td class="row ms-auto me-auto" style="width: 100px;">
                        <?php if($post['status']<>2):?>
                          <a title="Thùng rác" class="btn btn-danger btn-round col-12" href="admin.php?controller=posts&action=trash&post_id=<?= $post['id'] ?>">
                            <i class="zmdi zmdi-delete"></i>
                          </a>
                        <?php else:?>
                          <a title="Xóa" class="btn btn-danger btn-round col-12" href="admin.php?controller=posts&action=delete&post_id=<?= $post['id'] ?>">
                            <i class="zmdi zmdi-delete"></i> Xóa
                          </a>
                        <?php endif?>

                        <a title="Sửa" class="btn btn-warning btn-icon btn-icon-mini btn-round col-12" href="admin.php?controller=posts&action=edit&post_id=<?= $post['id'] ?>">
                          <i class="zmdi zmdi-edit"></i>
                        </a>

                        <?php if ($post['status'] <> '0') : ?>
                          <a title="Xem" class="btn btn-success btn-icon btn-icon-mini btn-round" target="_blank" href="/posts/single/<?= $post['id'] . '-' . $post['slug'] ?>"> <i class="zmdi zmdi-eye"></i> </a>
                        <?php else : ?>
                          <a title="Public" class="btn btn-success btn-round" href="admin.php?controller=posts&action=publish&post_id=<?= $post['id'] ?>"> <i class="zmdi zmdi-sun"></i> Công khai</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script defer>
    $(document).ready(function() {

      $("#dataTable").DataTable({
        "paging": true,
        "searching": true,
        "pageLength": 50,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');


    });
  </script>

</section>