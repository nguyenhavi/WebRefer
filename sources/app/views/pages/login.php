<!-- Sign in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="/img/form/signin-image.jpg" alt="sing up image"></figure>
                <a href="/pages/register" class="signup-image-link">Chưa có tài khoản ?</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Đăng nhập</h2>
                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="username" placeholder="Tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu" />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>