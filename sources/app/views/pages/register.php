<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Đăng ký</h2>
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="fullname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="fullname" id="fullname" placeholder="Tên" />
                    </div>
                    <div class="form-group">
                        <label for="username"><i class="zmdi  zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label for="re_password"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="/public/img/form/signup-image.jpg" alt="sing up image"></figure>
                <a href="/pages/login" class="signup-image-link">Đã có tài khoản</a>
            </div>
        </div>
    </div>
</section>