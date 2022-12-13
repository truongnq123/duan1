<script src="./src/js/index.js"></script>
</div>
</body>
<div class="banner_footer">
    <img src="./src/img/banner_footer.jpg" alt="">
</div>
<div class="service_pay">
    <div class="service">
        <div class="icon">
            <i class="fa-regular fa-comments" aria-hidden="true"></i>
        </div>
        <h2>24/7 Customer Suport</h2>
        <p>Have a question? Call a or chat online.</p>
    </div>
    <div class="service">
        <div class="icon">
            <i class="fa-regular fa-credit-card" aria-hidden="true"></i>
        </div>
        <h2>Money Back Guarantee</h2>
        <p>Pay with the world’s and secure payment methods.</p>
    </div>
    <div class="service">
        <div class="icon"><i class="fa-solid fa-hand-holding-dollar" aria-hidden="true"></i></div>
        <h2>Shop With Confidence</h2>
        <p>Our Buyer Protection purchasefrom click to delivery.</p>
    </div>
    <div class="service">
        <div class="icon">
            <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
        </div>
        <h2>90 Days Return</h2>
        <p>Passage Of Lorem Ipsum To Be Embarrassing</p>
    </div>
</div>
<link rel="stylesheet" href="./src/css/footer.css">
<script src="https://kit.fontawesome.com/21c3572f51.js" crossorigin="anonymous"></script>

</html>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Roboto;
    }

    /* body{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
    background: url(https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_footer_cho_website/Aare.svg);
} */
    footer {
        position: relative;
        width: 100%;
        height: 500px;

        padding: 20px 80px;
        background: white;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin: 20px 0px;
    }

    footer .container {

        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        flex-direction: row;
    }

    footer .container .noi-dung {
        margin-right: 30px;
    }

    footer .container .noi-dung.about {
        width: 40%;
    }

    footer .container .noi-dung.about h2 {
        position: relative;
        color: black;
        font-weight: 500;
        margin-bottom: 15px;
    }

    footer .container .noi-dung.about h2:before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }

    footer .container .noi-dung.about p {
        color: #999;
    }

    /*Thiết Lập Cho Thành Phần Icon Mạng Xã Hội*/
    .social-icon {
        margin-top: 20px;
        display: flex;
    }

    .social-icon li {
        list-style: none;
    }

    .social-icon li a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background: #222;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        text-decoration: none;
        border-radius: 4px;
    }

    .social-icon li a:hover {
        background: #f00;
    }

    .social-icon li a .fa {
        color: #fff;
        font-size: 20px;
    }

    .links h2 {
        position: relative;
        color: black;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .links h2 {
        position: relative;
        color: black;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .links h2::before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }

    .links {
        position: relative;
        width: 25%;
    }

    .links ul li {
        list-style: none;
    }

    .links ul li a {
        color: #999;
        text-decoration: none;
        margin-bottom: 10px;
        display: inline-block;
    }

    .links ul li a:hover {
        color: black;
    }

    .btn {
        display: inline-block;
        background: transparent;
        color: inherit;
        font: inherit;
        border: 0;
        outline: 0;
        padding: 0;
        margin-top: 16px;
        transition: all 200ms ease-in;
        cursor: pointer;
    }

    .btn--primary {
        background: #222;
        color: #fff;
        box-shadow: 0 0 10px 2px rgba(0, 0, 0, .1);
        border-radius: 2px;
        padding: 8px 24px;
    }

    .btn--primary:hover {
        background: #f00;
    }

    .btn--primary:active {
        background: #f00;
        box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, .2);
    }

    .form__field {
        width: 90%;
        background: #fff;
        color: #a3a3a3;
        font: inherit;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
        border: 0;
        outline: 0;
        padding: 8px 4px;
    }

    .contact h2 {
        position: relative;
        color: black;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .contact h2::before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }

    .contact {
        width: calc(35% - 60px);
        margin-right: 0 !important;
    }

    .contact .info {
        position: relative;
    }

    .contact .info li {
        display: flex;
        margin-bottom: 16px;
    }

    .contact .info li span:nth-child(1) {
        color: #fff;
        font-size: 20px;
        margin-right: 10px;
    }

    .contact .info li span {
        color: #999;
    }

    .contact .info li a {
        color: #999;
        text-decoration: none;
    }
</style>
<footer>
    <div class="container">
        <!--Bắt Đầu Nội Dung Giới Thiệu-->
        <div class="noi-dung about">
            <h2>Về Chúng Tôi</h2>
            <img src="./src/img/logo.png" alt="">
            <ul class="social-icon">
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                <li><a href=""><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
        <!--Kết Thúc Nội Dung Giới Thiệu-->
        <!--Bắt Đầu Nội Dung Đường Dẫn-->
        <div class="noi-dung links">
            <h2>Đường Dẫn</h2>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Về Chúng Tôi</a></li>
                <li><a href="#">Thông Tin Liên Lạc</a></li>
                <li><a href="#">Dịch Vụ</a></li>
                <li><a href="#">Điều Kiện Chính Sách</a></li>
            </ul>
        </div>
        <!--Kết Thúc Nội Dung Đường Dẫn-->
        <!--Bắt Đâu Nội Dung Liên Hệ-->
        <div class="noi-dung contact">
            <h2>Thông Tin Liên Hệ</h2>
            <ul class="info">
                <li><span><i class="fa fa-map-marker"></i></span>
                    <span>Văn phòng Tuyển sinh: Tòa nhà FPT Polytechnic, phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội</span>
                </li>
                <li>
                    <span><i class="fa fa-phone"></i></span>
                    <p><a href="#">+84 123 456 789</a>
                        <br />
                        <a href="#">+84 987 654 321</a>
                    </p>
                </li>
                <li>
                    <span><i class="fa fa-envelope"></i></span>
                    <p><a href="#">vuletien2003@gmail.com</a></p>
                </li>
                <!-- <li>
                     <form class="form">
                         <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                         <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                     </form>
                 </li> -->
            </ul>
        </div>
        <!--Kết Thúc Nội Dung Liên Hệ-->
    </div>
</footer>