<?php
$username_err = $email_err = $pass_err = $phone_err = "";
$username = $email = $pass = $phone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_err = "chưa nhập tên đăng nhập";
    }else{
        $username=test_input($_POST["username"]);
    }
}
if (empty($_POST["email"])) {
    $email_err = "Email is required";
}
if (empty($_POST["phone"])) {
    $phone_err = " chưa nhập số điện thoai";
}
if (empty($_POST["phone"])) {
    $pass_err = " chưa nhập mật khẩu";
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<div class="boxtitle"> ĐĂNG KÍ THÀNH VIÊN</div>
<div class="row boxcontent">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="POST">
        <div class="dangky">
            email
            <input type="email" name="email" id="email">
            <span> <?php echo $email_err; ?></span>
        </div> 
        
        <div class="dangky">
            tên đăng nhập<input type="text" name="username" id="username">
            <span> <?php echo $username_err; ?></span>
        </div> 
        
        <div class="dangky">
            phone<input type="text" name="phone" id="phone">
            <span> <?php echo $phone_err; ?></span>
        </div>
        
        <div class="dangky">
            mật khẩu<input type="password" name="pass" id="pass">
            <span> <?php echo $pass_err; ?></span>
        </div> 
        
        <div class="dangky">
            <input type="submit" value="Đăng kí" name="dangky" ">

        

    </form>

    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    <script>
        function check() {
            var ten = document.getElementById("tenkhach");
            if (ten.value == "") {
                alert("chưa nhập tên khách hàng!");
                return false;
            }
            var user = document.getElementById("username");
            if (user.value == "") {
                alert("Ban chua nhập tên dang nhap ");
                return false;
            }
            var pass1 = document.getElementById("pass");
            if (pass1.value == "") {
                alert("Ban chua nhap mat khau");
                return false;
            }
            var phone = document.getElementById("email");
            if (email.value == "") {
                alert("Bạn chưa nhập email");
                return false;
            } else {
                alert("Đăng ký thành công")
            }
        }
    </script>