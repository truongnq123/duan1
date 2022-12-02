<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div>a</div>
<div class="forgot_content">
    <div class="forgot_title">
        <p>Quên mật khẩu</p>
    </div>
    <div class="forgot_text">
        <p>Không vấn đề gì! Chỉ cần nhập email của bạn bên dưới và chúng tôi sẽ gửi cho bạn mật khẩu mới.</p>
    </div>
    <form action="./index.php?act=quenmk" class="forgot_form" method="POST">
        <div class="forgot_input">
            <input type="text" class="forgot" value="" name="email" placeholder="Nhập email của bạn">
        </div>

        <div class="result">

        </div>
        <input type="submit" class="forgot_btn" name="guiemail" value="Giử ngay bây giờ">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
    </form>


</div>