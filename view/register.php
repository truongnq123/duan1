
<div>ád</div>
<div>ádasd</div>
<div>ádasd</div>
<div>ádasd</div>
<div>ádasd</div>
<div>ádasd</div>
<div>ádasd</div>
<div>ádasd</div>
<div></div>
<div></div>
<div></div>

<div class="boxtitle"> ĐĂNG KÍ THÀNH VIÊN</div>
 <div class="row boxcontent">
     <form action="./index.php?act=dangky" method="POST" onsubmit="return check();">
         <div class="dangky">
         email
             <input type="email" name="email" id="email">
         </div> <br>
         <span> <?php echo $email_err; ?></span>
         <div class="dangky">
         tên đăng nhập<input type="text" name="username" id="username">
         </div> <br>
        <span> <?php echo $username_err; ?></span>
         <div class="dangky">
         phone<input type="text" name="phone" id="phone">
         <span> <?php echo $phone_err; ?></span>
         </div><br>
         <div class="dangky">
         mật khẩu<input type="password" name="pass" id="pass">
         </div>
         <span> <?php echo $pass_err; ?></span>
          <br>
         <div class="dangky">
        <input type="submit" value="Đăng kí 11" name="dangky" onclick="check();">

        <button type="submit" ><a href="index.php?act=dangnhap" >đăng Nhập</a></button>
             
     </form>

     <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
            ?>
            <script>
     function check() {
        var ten=document.getElementById("tenkhach");
            if(ten.value==""){
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
        var phone =document.getElementById("email");
        if(email.value==""){
            alert("Bạn chưa nhập email");
            return false;
        }
        else {
            alert("Đăng ký thành công")
        }
    }
    
</script>
