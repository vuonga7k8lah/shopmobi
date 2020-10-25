<?php
session_start();
require ('database/LoginRegister.php');
$login = new LoginRegister( );
// include header.php file
include('header.php');
if (isset($_POST['register'])){
    $data['TenKH'] = $_POST['TenKH'];
    $data['DiaChi'] = $_POST['DiaChi'];
    $data['SDT'] =$_POST['SDT'];
    $data['Email'] =$_POST['Email'];
    $data['Password'] = $_POST['Password'];
    $data['cPassword'] = $_POST['cPassword'];
    if (LoginRegister::emailIsExist($data['Email']) > 0) {
        $_SESSION['errorEmail']='Email ĐÃ Tồn Tại';
    } else {
        $data['Password'] = md5($data['Password']);
        LoginRegister::insertData($data);
        session_unset();
        $_SESSION['success_Register']='Tai Khoản Tạo Thành Công';
        echo "<script>location.href='http://127.0.0.1/webmobi/login.php';</script>";
    }
}
?>

    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <div style="color: red">
                            <?php if (isset($_SESSION['errorEmail'])){echo $_SESSION['errorEmail'];} ?>
                        </div>
                    <form action="http://127.0.0.1/webmobi/register.php" method="post">
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-12 mb-20">
                                    <label>Full Name</label>
                                    <input class="mba-0" type="text" name="TenKH" required  placeholder="Full Name">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Address</label>
                                    <input class="mb-0" type="text" name="DiaChi" required placeholder="Address">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Number Phone</label>
                                    <input class="mb-0" type="text" name="SDT" required placeholder="Number Phone">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Email Address*</label>
                                    <input class="mb-0" type="email" name="Email" required placeholder="Email Address">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0" id="Password" type="password"name="Password" required placeholder="Password">
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Confirm Password</label><div class="pass"></div>
                                    <input class="mb-0" id="cPassword" type="password" name="cPassword" required placeholder="Confirm Password">
                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0" name="register">Register</button>
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