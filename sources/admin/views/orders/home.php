<section class="content-wrapper">
  <div class="body_scroll">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?controller=admin">Home</a></li>
              <li class="breadcrumb-item active">Đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
      <!-- Basic Examples -->
      <div class="row clearfix p-2">
        <div class="col-lg-12 ">
          <div class="card p-2">
            <div class="header">
              <h2><strong>Truy Xuất Dữ Liệu </strong>
              <u> 
                <?php 
                  if(isset($_GET["by"])) {
                    $by=$_GET["by"];
                    if($by=="new")
                      echo "Đơn hàng mới"; 
                    if($by=="process")
                      echo "Đơn hàng đang xử lí"; 
                    if($by=="complete")
                      echo "Đơn hàng đã xử lí"; 
                    if($by=="cancel")
                      echo "Đơn hàng bị hủy"; 
                  }else
                    echo "Tất cả các đơn hàng" 

                ?>  
              </u>         
            </h2>


            </div>
            <div class="body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>UserName | ID (User)</th>
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
                      <th>UserName | ID (User)</th>
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
                        <?php if ($order['user_id'] <> 0) : $user_order = User::findByID($order['user_id']) ?>
                          <td><?php if (isset($user_order)) {
                                echo $user_order["username"] . "|" . $user_order["id"];
                              } ?> </td>
                        <?php else : ?>
                          <td></td>
                        <?php endif; ?>
                        <td><?php echo $order['createtime'] ?></td>
                        <td><?php echo number_format($order['cart_total'], 0, ',', '.') ?></td>
                        <td><?php echo $status[$order['status']]; ?></td>
                        <td><a  href="admin.php?controller=orders&amp;action=view&amp;order_id=<?php echo $order['id']; ?>" 
                                class="btn btn-<?php if ($order['status'] == 0) echo 'warning';
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
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