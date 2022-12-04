<div class="full">
<div class="forgot_text">
   
   <p>Không vấn đề gì! Chỉ cần nhập email của bạn bên dưới và chúng tôi sẽ gửi cho bạn mật khẩu mới.</p>
   </div>
<div class="full-1">
<div class="row boxcontent">

    <form action="./index.php?act=quenmk" class="forgot_form" method="POST" class="from-dn">
        
    
    <div class="boxtitle"> 
        <h2>Quên mật khẩu:</h2>
        </div>
        
       
    <div class="nhap">
    <input type="text"  value="" name="email" placeholder="Nhập email của bạn" required >
    </div>
           
        

       <div class="button">
        <button type="submit" class="forgot_btn" name="guiemail" value="Giử ngay bây giờ">Giử ngay bây giờ </button>
        </div>
        <div class="mk">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
        </div>
        
    </form>

  
    </div>
</div>