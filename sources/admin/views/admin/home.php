<section class="content">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$n_new_orders?></h3>
                <p>Đơn hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$revenue?><sup style="font-size: 20px">VNĐ</sup></h3>

                <p>Doanh Thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Thành viên mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$n_new_products?></h3>

                <p>Sản phẩm mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản phẩm mới</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên SP</th>
                      <th>Giá</th>
                      <th>Giá khuyến mãi</th>
                      <th>Ngày Tạo</th>
                      <th>Ảnh Đại Diện</th>
                      <th>Tổng Lượt View</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tên SP</th>
                      <th>Giá</th>
                      <th>Giá khuyến mãi</th>
                      <th>Ngày Tạo</th>
                      <th>Ảnh Đại Diện</th>
                      <th>Tổng Lượt View</th>
                      <th>Hành Động</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    while ($row = $products->fetch_assoc()) {
                      echo "<tr id='r-" . $row['id'] . "'>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . number_format($row['price'], 0, ',', '.') . "</td>";
                      if ($row["saleoff"] == 1)
                        echo "<td>" . number_format(($row['price'] - (($row['price']) * ($row['percentoff']) / 100)), 0, ',', '.') . "</td>";
                      else
                        echo "<td></td>";
                      echo "<td>" . $row['createDate'] . "</td>";
                      echo '<td> <image src="' . PATH_URL_IMG_PRODUCT . $row["img1"] . '?time=' . time() . '" style="max-width:100px;" /></td>';
                      echo "<td>" . $row['totalView'] . "</td>";
                    ?>
                      <td>
                        <a class="btn btn-primary" href="?controller=products&action=edit&id=<?php echo $row['id'] ?>">
                          Sửa
                        </a>

                        <a class="btn btn-danger mt-1 delete" data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-toggle="modal">
                          Xóa
                        </a>
                      </td>
                    <?php
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="?controller=products" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Blog LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản phẩm mới</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
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
                          <small><?= $post_status[$post['status']] ?></small>
                        </td>
                        <td><?= $post['slug'] ?></td>
                        <td><?= $post['type_name'] ?></td>

                        <td><span class="badge badge-info"></span></td>
                        <td><img src="<?= PATH_URL_IMG_BLOG . $post["main_pic"] . '?time=' . time() ?>" style="max-width:100px;" alt=""></td>
                        <td class="row ms-auto me-auto" style="width: 100px;">
                          <?php if ($post['status'] <> 2) : ?>
                            <a title="Thùng rác" class="btn btn-danger btn-round col-12" href="admin.php?controller=posts&action=trash&post_id=<?= $post['id'] ?>">
                              <i class="zmdi zmdi-delete"></i>
                            </a>
                          <?php else : ?>
                            <a title="Xóa" class="btn btn-danger btn-round col-12" href="admin.php?controller=posts&action=delete&post_id=<?= $post['id'] ?>">
                              <i class="zmdi zmdi-delete"></i> Xóa
                            </a>
                          <?php endif ?>

                          <a title="Sửa" class="btn btn-warning btn-icon btn-icon-mini btn-round col-12" href="admin.php?controller=posts&action=edit&post_id=<?= $post['id'] ?>">
                            <i class="zmdi zmdi-edit"></i>
                          </a>

                          <?php if ($post['status'] <> '0') : ?>
                            <a title="Xem" class="btn btn-success btn-icon btn-icon-mini btn-round" target="_blank" href="post/<?= $post['id'] . '-' . $post['slug'] ?>"> <i class="zmdi zmdi-eye"></i> </a>
                          <?php else : ?>
                            <a title="Public" class="btn btn-success btn-round" href="admin.php?controller=posts&action=publish&post_id=<?= $post['id'] ?>"> <i class="zmdi zmdi-sun"></i> Công khai</a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="?controller=products" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->



          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <section class="col-lg-5 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-light btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Đơn hàng chưa xử lí</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!-- /.table-responsive -->
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>Ngày đặt đơn</th>
                      <th>Tổng giá trị đơn hàng</th>
                      <th>Tình trạng</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>Ngày đặt đơn</th>
                      <th>Tổng giá trị đơn hàng</th>
                      <th>Tình trạng</th>
                      <th>Hành Động</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($orders as $order) : ?>
                      <tr>
                        <td><?php echo $order['id'] ?></td>
                        <td><a href="admin.php?controller=orders&amp;action=view&amp;order_id=<?php echo $order['id']; ?>"><?php echo $order['customer']; ?></a></td>
                        <td><?php echo $order['createtime'] ?></td>
                        <td><?php echo number_format($order['cart_total'], 0, ',', '.') ?></td>
                        <td><?php echo $status[$order['status']]; ?></td>
                        <td><a href="admin.php?controller=orders&amp;action=view&amp;order_id=<?php echo $order['id']; ?>" class="btn btn-<?php if ($order['status'] == 0) echo 'warning';
                                                                                                                                          elseif ($order['status'] == 1) echo 'success';
                                                                                                                                          else echo 'primary' ?> waves-effect waves-float btn-sm waves-green">
                            <i class="zmdi zmdi-<?php if ($order['status'] == 0) {
                                                  echo 'eyedropper';
                                                } elseif ($order['status'] == 1) {
                                                  echo 'eye';
                                                } else {
                                                  echo 'assignment-check';
                                                } ?>"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="?controller=orders" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>



          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</section>
<script src="js/admin/pages/dashboard.js"></script>