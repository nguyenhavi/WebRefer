<section class="content-wrapper">
    <div class="body_scroll">
        <div class="block-header p-2">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Thông tin đơn hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?controller=admin"><i class="zmdi zmdi-home"></i> Fashion</a></li>
                        <li class="breadcrumb-item"><a href="?controller=orders">Đơn hàng</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card p-2">
                        <div class="header">
                            <h2><strong>Truy Xuất Dữ Liệu</strong> "Tất cả các sản phẩm trong đơn hàng" </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Giá gốc</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Số lượng</th>
                                            <th>Giá Tổng SL</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Giá gốc</th>
                                            <th>Giá khuyến mãi</th>
                                            <th>Số lượng</th>
                                            <th>Giá Tổng SL</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $stt = 0;
                                        $order_total = 0;
                                        foreach ($order_detail as $product) :
                                            $stt++;
                                            if ($product["type_id"] == 3) {
                                                $order_total += ($product['price'] - (($product['price']) * ($product['percentoff']) / 100)) * $product['quantity'];
                                            } else
                                                $order_total += $product['price'] * $product['quantity'];
                                        ?>
                                            <tr>
                                                <td><?= $stt; ?></td>
                                                <td><?= $product["name"] ?></td>
                                                <td><?php if (is_file(PATH_URL_IMG_PRODUCT . $product['img1']))
                                                        echo '<image src="' . PATH_URL_IMG_PRODUCT . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />';
                                                    ?></td>
                                                <td><?php echo number_format($product['price'], 0, ',', '.') ?>đ</td>
                                                <td><?php if ($product['saleoff'] == 1) echo ($product['price'] - (($product['price']) * ($product['percentoff']) / 100)); ?></td>
                                                <td><?= $product['quantity'] ?></td>
                                                <td><?php if ($product["type_id"] == 3) {
                                                        echo number_format((($product['price'] - (($product['price']) * ($product['percentoff']) / 100)) * $product['quantity']), 0, ',', '.');
                                                    } else
                                                        echo number_format($product['price'] * $product['quantity'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <h3 style="font-weight: bold;text-align: center;">Thành tổng tiền : <?php echo number_format($order_total, 0, ',', '.'); ?> VNĐ</h3>
                                <h3 style="font-weight: bold; color: red; text-align: center;"><b> <?= $status[$order['status']] ?></b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <h3>Thông tin khách hàng</h3>
                        <table id="info" class="table">
                            <tr>
                                <td><strong>Họ và tên</strong></td>
                                <td><?php echo $order['customer']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tỉnh/ Thành phố</strong> </td>
                                <td><?php echo $order['province']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ</strong> </td>
                                <td><?php echo $order['address']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Di động</strong> </td>
                                <td><?php echo $order['phone']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Thời gian</strong> </td>
                                <td><?php echo $order['createtime']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tin nhắn từ khách hàng</strong> </td>
                                <td><?php echo $order['message']; ?></td>
                            </tr>
                        </table>
                        <?php if ($order['status'] == 0) { ?>
                            <form id="order_form" method="post" action="admin.php?controller=orders&amp;action=updateStatus" role="form">
                                <div style="text-align: center;" class="form-group">
                                    <input name="order_id" type="hidden" value="<?php echo $order['id']; ?>" />
                                    <input name="status" type="hidden" value="1" />
                                    <button class="btn btn-primary waves-effect" type="submit">Tiến hành xử lý đơn hàng</button>
                                    <a href="admin.php?controller=orders" class="btn btn-warning waves-effect">Quay lại</a>
                                </div>
                            </form>
                            <form id="order_form" method="post" action="admin.php?controller=orders&amp;action=updateStatus" role="form">
                                <div style="text-align: center;" class="form-group">
                                    <input name="order_id" type="hidden" value="<?php echo $order['id']; ?>" />
                                    <input name="status" type="hidden" value="3" />
                                    <button class="btn btn-danger waves-effect" type="submit">Hủy đơn hàng</button>
                                </div>
                            </form>
                            
                        <?php } elseif ($order['status'] == 1) { ?>
                            <form id="order_form" method="post" action="admin.php?controller=orders&amp;action=updateStatus" role="form">
                                <div style="text-align: center;" class="form-group">
                                    <input name="order_id" type="hidden" value="<?php echo $order['id']; ?>" />
                                    <input name="status" type="hidden" value="2" />
                                    <button class="btn btn-primary waves-effect" type="submit">Xác nhận đã xử lý thành công đơn hàng này</button>
                                    <a href="admin.php?controller=orders" class="btn btn-warning waves-effect">Quay lại</a>
                                </div>
                            </form> 
                        <?php } else { ?>
                            <div style="text-align: center;">
                                <a onclick="return confirm('Are you sure to delete?')" class="btn btn-primary waves-effect" href="admin.php?controller=orders&amp;action=delete&amp;order_id=<?= $order['id'] ?>">Xoá đơn hàng này</a>
                                <a href="?controller=orders" class="btn btn-warning waves-effect">Quay lại</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $("#dataTable").DataTable({
            "paging": false,
            "searching": true,
            "pageLength": 50,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');

    });
</script>