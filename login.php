<?php
session_start();
require ('database/LoginRegister.php');
$login = new LoginRegister( );
// include header.php file
include('header.php');
if (isset($_POST['login'])) {
    $data['Email'] = $_POST['Email'];
    $data['Password'] = md5($_POST['Password']);
    if (LoginRegister::loginUser($data) > 0) {
        session_unset();
        echo "<script>
           var result = confirm('Tài Khoản Đăng Nhập Thành Công');
              if(result)  {
                  location.href='http://127.0.0.1/webmobi/';
              } else {
                 location.href='http://127.0.0.1/webmobi/login.php';
              }
        </script>";
    } else {
        $_SESSION['error_login']='Sai Tài Khoản Hoặc Mật Khẩu';
        echo "<script>location.href='http://127.0.0.1/webmobi/login.php';</script>";
    }
}
?>
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <div style="color: red">
                        <?php if (isset($_SESSION['error_login'])){echo $_SESSION['error_login'];} ?>
                    </div>
                    <form action="http://127.0.0.1/webmobi/login.php" method="post">
                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0" type="email" required name="Email" placeholder="Email Address">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0" required type="password" name="Password" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <button class="register-button mt-0" name="login">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php
// include footer.php file
include('footer.php');
?>