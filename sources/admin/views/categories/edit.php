<section class="content-wrapper">
    <div class="body_scroll">
        <div class="block-header m-3">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h3><? ?></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?controller=admin&action=home"><i class="zmdi zmdi-home"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="?controller=categorys&action=home">Danh mục</a></li>
                        <li class="breadcrumb-item active"><?php echo isset($category) ? 'Cập nhật danh mục: ' . $category['category_name']  : 'Thêm danh mục mới'; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong><?php echo isset($category) ? 'Cảnh Báo: </strong> Bạn đang trong trang chỉnh sửa của danh mục "' . $category['category_name'] . '", Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>' : 'Cảnh Báo: </strong> Bạn đang trong trang tạo một danh mục mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>'; ?>
                    </div>
                    <?php if (isset($category)) { ?>
                        <div class="col-lg-12">
                            <div class="card col-md-12">
                                <h3>Thông tin về danh mục</h3>
                                <table id="info" class="table">
                                    <tr>
                                        <td><strong>Tên danh mục</strong></td>
                                        <td><?php echo $category['category_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Đường dẫn</strong></td>
                                        <td><?php echo $category['slug']; ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="body">
                            <form id="category-form" class="form-horizontal p-3" method="post" action="admin.php?controller=categories&amp;action=updateCategory" enctype="multipart/form-data" role="form">
                                <input name="category_id" type="hidden" value="<?php echo isset($category) ? $category['id'] : '0'; ?>" />
                                <h3 class="card-inside-title" style="font-weight:bold;">Tên Danh mục:</h3>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" max='500' type="text" value="<?php echo isset($category) ? $category['category_name'] : ''; ?>" class="form-control" id="name" placeholder="Nhập tên danh mục..." required="" />
                                        </div>
                                    </div>
                                </div>

                                <h3 class="card-inside-title" style="font-weight:bold;">Slug (Đường dẫn link category):</h3>
                                <p>Đường dẫn link sẽ tự động được tạo giống với tên danh mục...</p>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="slug" type="text" value="<?php echo isset($category) ? $category['slug'] : ''; ?>" class="form-control" id="slug" placeholder="Nhập đường dẫn link danh mục..." />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit"><?php echo isset($category) ? 'Cập nhật danh mục trên' : 'Thêm danh mục mới'; ?></button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=categories">Trở về</a>
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
        height: '200px'
    });
</script>