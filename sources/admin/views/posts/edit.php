<section class="content-wrapper p-3">
    <div class="body_scroll">
        <div class="block-header p-3">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h3><? ?></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php">Blog</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=post">Post</a></li>
                        <li class="breadcrumb-item active">Thêm bài viết mới</li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong><?php echo 'Cảnh Báo: </strong> Bạn đang trong trang thêm bài viết mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card p-3">
                        <div class="body">
                            <form id="post-form" class="form-horizontal" method="post" action="admin.php?controller=posts&amp;action=updatePost" enctype="multipart/form-data" role="form">
                                <div class="row clearfix">
                                    <div class="col-sm-8">
                                        <input name="post_id" type="hidden" value="<?php echo isset($post) ? $post['id'] : '0'; ?>" />

                                        <!-- Edit By and Create By -->
                                        <?php global $user_nav;
                                        $get_user_by = User::findByID($_SESSION["user"]["id"]) ?>
                                        <?php if (isset($post)) : ?>
                                            <input name="editby" type="hidden" value="<?php echo $get_user_by['username']; ?>" /><?php else : ?>
                                            <input name="createby" type="hidden" value="<?php echo $get_user_by['id']; ?>" /><?php endif; ?>
                                        <h3 class="card-inside-title" style="font-weight:bold;">Tiêu đề bài viết:</h3>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="title" type="text" value="<?php echo isset($post) ? $post['title'] : ''; ?>" class="form-control" id="title" placeholder="Nhập tiêu đề bài viết..." required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="card-inside-title" style="font-weight:bold;">Slug (Đường dẫn link bài viết):</h3>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="slug" type="text" value="<?php echo isset($post) ? $post['slug'] : ''; ?>" class="form-control" id="slug" placeholder="Nhập đường dẫn link bài viết..." />
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-inside-title" style="font-weight:bold;">Loại Bài Viết:</h4>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <select name="type" class="form-control show-tick">
                                                    <?php foreach ($types as $type) {
                                                        $selected = '';
                                                        if ($post && ($post['type'] == $type['id'])) $selected = 'selected=""';
                                                        echo '<option value="' . $type['id'] . '" ' . $selected . '>' . $type['type_name'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <h4 class="card-inside-title" style="font-weight:bold;">Chế độ:</h4>
                                        <?php if (isset($post)) : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="draft" class="with-gap" value="0" <?php if ($post['type'] == "0") echo "checked"; ?>>
                                                    <label for="draft">Nháp</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="publish" class="with-gap" <?php if ($post['type'] == "1") echo "checked"; ?> value="1">
                                                    <label for="publish">Công khai</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="trash" class="with-gap" <?php if ($post['type'] == "2") echo "checked"; ?> value="2">
                                                    <label for="trash">Thùng rác</label>
                                                </div>
                                                
                                            <?php else : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="draft" class="with-gap" value="0" checked>
                                                    <label for="draft">Nháp</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="publish" class="with-gap" value="1">
                                                    <label for="publish">Công khai</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="trash" class="with-gap" value="2">
                                                    <label for="trash">Thùng rác</label>
                                                </div>
                                            <?php endif; ?>
                                        <h3 class="card-inside-title" style="font-weight:bold;">Nội dung 1:</h3>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="para1" id="ckeditor"><?php echo isset($post) ? $post['para1'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="card-inside-title" style="font-weight:bold;">Nội dung 2:</h3>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="para2" id="ckeditor"><?php echo isset($post) ? $post['para2'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <?php if (isset($post)) : ?>
                                            <div class="row clearfix">
                                                <div>
                                                    <div>
                                                        <h4 style="text-align: center;">Ảnh đại diện hiện tại</h4>
                                                        <img id="main_pic_now" style="text-align: center; max-width:250px;" src=<?php echo PATH_URL_IMG_BLOG . $post['main_pic']; ?>>
                                                    </div>
                                                    <div>
                                                        <h4 style="text-align: center;">Ảnh phụ hiện tại</h4>
                                                        <img id="sub_pic_now" style="text-align: center; max-width:250px;" src=<?php echo PATH_URL_IMG_BLOG . $post['sub_pic']; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <hr>
                                        <h3 style="text-align: center;">Thêm ảnh mới</h3>
                                        <div class="card col-md-12">
                                            <div class="header" style="text-align: center;">
                                                <h3 style="text-align: center;">Ảnh Đại Diện</h3>
                                            </div>
                                            <div class="body">
                                                <input id="main_pic" name="main_pic" type="file" class="form-control dropify" accept="image/*">
                                                <img id="main_pic_prev" class="img-fluid" style="text-align: center;max-width:300px;">
                                            </div>
                                            <div class="header" style="text-align: center;">
                                                <h3 style="text-align: center;">Ảnh phụ</h3>
                                            </div>
                                            <div class="body">
                                                <input id="sub_pic" name="sub_pic" type="file" class="form-control dropify" accept="image/*">
                                                <img id="sub_pic_prev" class="img-fluid" style="text-align: center;max-width:300px;">
                                            </div>
                                            <div class="form-group">
                                                <input name="sub_pic_quote" type="text" value="<?php echo isset($post) ? $post['sub_pic_quote'] : ''; ?>" class="form-control" id="name" placeholder="Nhập mô tả cho ảnh..." required="" />
                                            </div>
                                        </div>

                                        <div class="form-group" style="text-align: center;">
                                            <button class="btn btn-primary waves-effect" type="submit"><?php echo isset($post) ? 'Cập nhật lại bài viết' : 'Thêm bài viết mới'; ?></button>
                                            <a class="btn btn-warning waves-effect" href="?controller=posts">Trở về</a>
                                        </div>
                                    </div>
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
    CKEDITOR.replace('para1', {
        height: '300px'
    });
    CKEDITOR.replace('para2', {
        height: '300px'
    });

    function preview(pic, pic_prev) {
        const main_pic = document.getElementById(pic)
        main_pic.onchange = evt => {
            const [file] = main_pic.files
            if (file) {
                const main_pic_prev = document.getElementById(pic_prev);
                main_pic_prev.src = URL.createObjectURL(file)
        }
        }
    }
    preview("main_pic", "main_pic_prev")
    preview("sub_pic", "sub_pic_prev")
</script>