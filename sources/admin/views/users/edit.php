

<section class="content-wrapper">
    <div class="body_scroll">
        <div class="block-header m-3">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Thông tin tài khoản cá nhân của bạn</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?controller=admin&action=home"><i class="zmdi zmdi-home"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="?controller=users&action=home">Người dùng</a></li>
                        <li class="breadcrumb-item active">Chỉnh sủa tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <h3>Thông tin tải khoản các nhân</h3>
                        <table id="info" class="table">
                            <tr>
                                <td><strong>Họ và tên</strong></td>
                                <td><?php echo $user_info['fullname']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tên Đăng nhập</strong> </td>
                                <td><?php echo $user_info['username']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Quyền lực</strong> </td>
                                <td><strong><?php if ($user_info['role'] == 0) {
                                                echo 'Người đăng ký';
                                            } elseif ($user_info['role'] == 1) {
                                                echo 'Admin - Quản trị viên';
                                            }?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong> </td>
                                <td><?php echo $user_info['email']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ</strong> </td>
                                <td><?php echo $user_info['address']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Di động</strong> </td>
                                <td><?php echo $user_info['phone_num']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ngày đăng ký tài khoản</strong> </td>
                                <td><?php echo $user_info['createDate']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Avatar</strong> </td>
                                <!-- Adding Random Parameter To Disable Cache Image -->
                                <td><img style="max-width:200px;" src="<?php echo PATH_URL_IMG.$user_info['avatar']; ?>?t=<?php echo time()?>" alt="<?php echo $user_info['username']; ?>"> </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <h2 style="font-weight: bold;">Phần chỉnh sửa thông tin cá nhân trên</h2>
                <div class="col-lg-12">
                    <form id="product-form" class="form-horizontal" method="post" action="?controller=users&action=updateUser" enctype="multipart/form-data" role="form">
                        <input name="user_id" type="hidden" value="<?php echo $user_info ? $user_info['id'] : '0'; ?>" />
                        <!-- Login User Permission Required  $login_user['role_id'] == 1-->
                        <?php if ($_SESSION['user']['role']==1) : ?>
                            <h4 class="card-inside-title" style="font-weight:bold;">Tên đăng nhập:</h4>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input name="username" type="text" maxlength="50" value="<?php echo $user_info ? $user_info['username'] : ''; ?>" class="form-control" id="name" placeholder="VD: tanhongit" required="" />
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title" style="font-weight:bold;">Chọn mức quyền quản trị (Role):</h2>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3 form-group">
                                        <select name="role" required class="form-control show-tick">
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <h4 class="card-inside-title" style="font-weight:bold;">Tên đăng nhập: "<?= $user_info['username'] ?>"</h4>
                            <input name="username" type="hidden" value="<?php echo $user_info ? $user_info['username'] : ''; ?>" class="form-control" />
                        <?php endif; ?>
                        <h4 class="card-inside-title" style="font-weight:bold;">Họ và tên User:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="fullname" type="text" maxlength="250" value="<?php echo $user_info ? $user_info['fullname'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Email:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="email" type="email" maxlength="250" value="<?php echo $user_info ? $user_info['email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nhập địa chỉ:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="address" type="text" maxlength="250" value="<?php echo $user_info ? $user_info['address'] : ''; ?>" class="form-control" id="material" placeholder="Địa chỉ người dùng ..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nhập số điện thoại:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="phone_num" type="text" pattern="[0-9\.]+" maxlength="20" value="<?php echo $user_info ? $user_info['phone_num'] : ''; ?>" class="form-control" id="totalview" required placeholder="0123456789..." />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Chọn ảnh Avatar Mới:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <input name="avatar" type="file" class="form-control dropify">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary waves-effect" type="submit">Cập nhật thông tin người dùng</button>
                            <a class="btn btn-warning waves-effect" href="?controller=users&action=home">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>