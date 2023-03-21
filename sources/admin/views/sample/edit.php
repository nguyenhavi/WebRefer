
<section class="content-wrapper">
    <div class="body_scroll">
        <div class="block-header m-3">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h3><? ?></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?controller=admin&action=home"><i class="zmdi zmdi-home"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="?controller=products&action=home">Sản phẩm</a></li>
                        <li class="breadcrumb-item active"><?php echo isset($product) ? 'Cập nhật sản phẩm: ' . $product['name']  : 'Thêm sản phẩm mới'; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong><?php echo isset($product) ? 'Cảnh Báo: </strong> Bạn đang trong trang chỉnh sửa của sản phẩm "' . $product['name'] . '", Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>' : 'Cảnh Báo: </strong> Bạn đang trong trang tạo một sản phẩm mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>'; ?>
                    </div>
                    <?php if (isset($product)) { ?>
                        <div class="col-lg-12">
                            <div class="card col-md-12">
                                <h3>Thông tin về sản phẩm</h3>
                                <table id="info" class="table">
                                    <tr>
                                        <td><strong>Tên sản phẩm</strong></td>
                                        <td><?php echo $product['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Loại sản phẩm</strong></td>
                                        <td><?php  while($type = $types->fetch_assoc())  {
                                                if ($product && ($product['type_id'] == $type['id']))  echo  $type['type_name'];
                                            } ?></td>
                                    <tr></tr>
                                    <td><strong>Thuộc nhóm danh mục</strong> </td>
                                    <td><?php foreach ($categories as $category) {
                                            if ($product && ($product['category_id'] == $category['id']))  echo  $category['category_name'];
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Color</strong> </td>
                                        <td><?php echo $product['color']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Size</strong> </td>
                                        <td><?php echo $product['size']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Material</strong> </td>
                                        <td><?php echo $product['material']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total View</strong> </td>
                                        <td><?php echo $product['totalView']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Price</strong> </td>
                                        <td><?php echo $product['price']; ?> VNĐ</td>
                                    </tr>
                                    <?php if ($product['saleoff'] == 1) { ?>
                                        <tr>
                                            <td><strong>Percent Off</strong> </td>
                                            <td><?php echo $product['percentoff']; ?> %</td>
                                        </tr>
                                        <tr>
                                            <td><stcategorierong>Price (Sale)</stcategorierong> </td>
                                            <td><?php echo $product['price'] - $product['price'] * $product['percentoff'] / 100; ?> VNĐ</td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal p-3" method="post" action="admin.php?controller=products&amp;action=updateProduct" enctype="multipart/form-data" role="form">
                                <input name="product_id" type="hidden" value="<?php echo isset($product) ? $product['id'] : '0'; ?>" />
                                <?php /* global $user_nav;
                                $get_user_by = get_a_record('users', $user_nav) */ ?>
                                <?php if (isset($product)) : ?>
                                    <input name="editby" type="hidden" value="<?php echo $_SESSION['user']['username']; ?>" />
                                    <input name="createby" type="hidden" value="<?php echo $product['createBy']; ?>" />
                                <?php else : ?>
                                    <input name="createby" type="hidden" value="<?php echo $_SESSION['user']['username']; ?>" /><?php endif; ?>
                                <h3 class="card-inside-title" style="font-weight:bold;">Tên Sản Phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" max='500' type="text" value="<?php echo isset($product) ? $product['name'] : ''; ?>" class="form-control" id="name" placeholder="Nhập tên sản phẩm..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Slug (Đường dẫn link product):</h3>
                                <p>Đường dẫn link sẽ tự động được tạo giống với tên danh mục...</p>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="slug" type="text" value="<?php echo isset($product) ? $product['slug'] : ''; ?>" class="form-control" id="slug" placeholder="Nhập đường dẫn link sản phẩm..." />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Loại Sản Phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="type_id" class="form-control show-tick">
                                            <?php foreach ($types as $type) {
                                                $selected = '';
                                                if ($product && ($product['typeid'] == $type['id'])) $selected = 'selected=""';
                                                echo '<option value="' . $type['id'] . '" ' . $selected . '>' . $type['type_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Nhóm Danh Mục:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control show-tick">
                                            <?php foreach ($categories as $category) {
                                                $selected = '';
                                                if ($product && ($product['category_id'] == $category['id'])) $selected = 'selected=""';
                                                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['category_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Giá Sản Phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="price" type="type" maxlength="11" value="<?php echo isset($product) ? $product['price'] : 0; ?>" class="form-control" id="price" placeholder="0" pattern="[0-9\.]+" required="" />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Màu cho sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="color" type="text" maxlength="250" value="<?php echo isset($product) ? $product['color'] : ''; ?>" class="form-control" id="color" placeholder="Color..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Kích cỡ cho sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="size" type="text" required maxlength="100" value="<?php echo isset($product) ? $product['size'] : ''; ?>" class="form-control" id="size" placeholder="Size ..." />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Chất liệu của sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="material" type="text" maxlength="250" value="<?php echo isset($product) ? $product['material'] : ''; ?>" class="form-control" id="material" placeholder="Material ..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Lượt xem sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="totalview" pattern="[0-9\.]+" type="text" maxlength="11" value="<?php echo isset($product) ? $product['totalView'] : ''; ?>" class="form-control" id="totalview" placeholder="Lượt view..." />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Lựa chọn giảm giá (Sale off):</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php if (isset($product)) : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if ($product['saleoff'] == "1") echo "checked"; ?>>
                                                    <label for="male">Bật giảm giá</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="Female" class="with-gap" <?php if ($product['saleoff'] == "0") echo "checked"; ?> value="0">
                                                    <label for="Female">Không giảm giá</label>
                                                </div>
                                            <?php else : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="male" class="with-gap" value="1">
                                                    <label for="male">Bật giảm giá</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="Female" class="with-gap" checked value="0">
                                                    <label for="Female">Không giảm giá</label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Số % giảm giá sản phẩm (từ 0 -> 100 và chỉ nhập nếu chọn "bật giảm giá"):</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="percent_off" type="text" maxlength="11" value="<?php echo isset($product) ? $product['percentoff'] : ''; ?>" class="form-control" id="percent_off" pattern="[0-9\.]+" placeholder="Number Precent Off ..." />
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Chọn ngày tạo mới sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input name="createdate" id="createdate" type="date" value="<?php echo isset($product) ? $product['createDate'] : date('d/m/Y'); ?>" class="form-control" placeholder="Please choose date & time...">
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Thông tin sơ sơ về sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" placeholder="Thông tin sản phẩm..."><?php echo isset($product) ? $product['description'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-inside-title" style="font-weight:bold;">Chi tiết về sản phẩm:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="detail" id="ckeditor" placeholder="Chi tiết sản phẩm..."><?php echo isset($product) ? $product['detail'] : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($product)) : ?>
                                    <div class="row clearfix">
                                        <div style="text-align: center;" class="col-lg-3 col-md-4">
                                            <div>
                                                <h4>Ảnh đại diện</h4>
                                                <?php if (strlen($product['img1']) <> 0) { ?>
                                                    <img style="max-width:250px;" src="public/upload/products/<?php echo $product['img1']; ?>">
                                                <?php } else echo '<h6>Vị trí này chưa có ảnh</h6>'; ?>
                                            </div>
                                        </div>
                                        <div style="text-align: center;" class="col-lg-3 col-md-4">
                                            <div>
                                                <h4>Ảnh 2</h4>
                                                <?php if (strlen($product['img2']) <> 0) { ?>
                                                    <img style="max-width:250px;" src="public/upload/products/<?php echo $product['img2']; ?>">
                                                <?php } else echo '<h6>Vị trí này chưa có ảnh</h6>'; ?>
                                            </div>
                                        </div>
                                        <div style="text-align: center;" class="col-lg-3 col-md-4">
                                            <div>
                                                <h4>Ảnh 3</h4>
                                                <?php if (strlen($product['img3']) <> 0) { ?>
                                                    <img style="max-width:250px;" src="public/upload/products/<?php echo $product['img3']; ?>">
                                                <?php } else echo '<h6>Vị trí này chưa có ảnh</h6>'; ?>
                                            </div>
                                        </div>
                                        <div style="text-align: center;" class="col-lg-3 col-md-4">
                                            <div>
                                                <h4>Ảnh 4</h4>
                                                <?php if (strlen($product['img4']) <> 0) { ?>
                                                    <img style="max-width:250px;" src="public/upload/products/<?php echo $product['img4']; ?>">
                                                <?php } else echo '<h6>Vị trí này chưa có ảnh</h6>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <hr>
                                <h3>Thay đổi ảnh tuỳ thích</h3>
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="card">
                                        <div class="header">
                                            <h3 style="text-align: center;">Ảnh Đại Diện</h3>
                                        </div>
                                        <div class="body">
                                            <input name="img1" type="file" class="form-control dropify" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="header">
                                            <h3 style="text-align: center;">Ảnh 2</h3>
                                        </div>
                                        <div class="body">
                                            <input name="img2" type="file" class="form-control dropify">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="header">
                                            <h3 style="text-align: center;">Ảnh 3</h3>
                                        </div>
                                        <div class="body">
                                            <input name="img3" type="file" class="form-control dropify">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="header">
                                            <h3 style="text-align: center;">Ảnh 4</h3>
                                        </div>
                                        <div class="body">
                                            <input name="img4" type="file" class="form-control dropify">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit"><?php echo isset($product) ? 'Cập nhật sản phẩm trên' : 'Thêm sản phẩm mới'; ?></button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=products">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('detail', {
        height: '800px'
    });
</script>