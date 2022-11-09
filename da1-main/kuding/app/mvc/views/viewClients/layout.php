<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ico -->
    <link rel="shortcut icon" type="image/png" href="./public/images/layout/kooding-app-icon.ico"/>
    <!-- lib album -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.8.3/dist/css/lightgallery.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- jq-ui -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- custom checkbox -->
    <link rel="stylesheet" href="public/css/lib/checkboxes.min.css">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- css boostrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="public/css/style_layout.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/album.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời trang Hàn Quốc/Trang chủ</title>
</head>

<body>
    <div class="wrapper">
        <?php include_once "./app/mvc/views/viewClients/partials/__header.php"; ?>

        <!-- end header -->
        <?php include_once "./app/mvc/views/viewClients/pages/" . $data['page'] . ".php"; ?>

        <!-- footer -->
        <?php include_once "./app/mvc/views/viewClients/partials/__footer.php"; ?>

    </div>


    <!-- jqr ui-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- js boostrap 4 -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <!-- lib js query validate cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- js -->
    <script src="./public/js/layout/main.js"></script>
    <script src="./public/js/layout/backtop.js"></script>
    <script src="./public/js/layout/popupLogin.js"></script>
    <!-- pro -->
    <script src="./public/js/layout/products.js"></script>
    <script src="./public/js/layout/filter_product.js"></script>
    <script src="./public/js/layout/checkout.js"></script>
    <script src="./public/js/layout/product-details.js"></script>
    <script src="./public/js/layout/profile.js"></script>
    <script src="./public/js/layout/mess.js"></script>
    <!-- <script src="./public/js/layout/client.js"></script> -->

    <!-- validate form -->
    <script src="./public/js/validate/validatorClients/validator__profile.js"></script>
    <script src="./public/js/validate/validatorClients/validator_register.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="public/js/layout/slide_lib.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            $("#lightgallery").lightGallery();

        });
    </script>

</body>
<script src="https://dl.dropboxusercontent.com/s/6x9xf4l912dcp1d/Lightgallery.js"></script>
<script>
    $(document).ready(function() {
        $('#login_user').submit(function(e) {
            e.preventDefault();
            var action = 'loginClient';
            var email = $('#email_login').val();
            var password = $('#password_login').val();
            var remember = $('#remember')
            if (remember.prop("checked") == true) {
                remember = "check";
            } else {
                remember = "null";
            }
            if (email == '' || password == '') {
                $('.errLogin').html('Nhập đầy đủ thông tin');
                return false;
            } else {
                $("#loading_spinner").css({
                    "display": "block"
                });
                $.ajax({
                    url: "accountClient",
                    method: "GET",
                    data: {
                        action: action,
                        email: email,
                        mk: password,
                        remember: remember
                    },
                    success: function(data) {
                        $('.errLogin').html(data)
                    }

                })
            }
        })
        // handle register
        $('#register_user').submit(function(e) {
            e.preventDefault();
            var action = 'register';
            var fullname = $('#fullname').val()
            var birthday = $('#birthday').val()
            var email = $('#email_register').val();
            var password = $('#pass_register').val();
            var gender = $('#gender')
            var male = '';
            var female = '';
            // ktra có dc check
            if (gender.prop("checked") == true) {
                male = "check";
                female = null;
            } else {
                female = "check";
                male = null;
            }
            if (email == '' || password == '' || fullname == '' || birthday == '') {
                return false;
            } else {
                $("#loading_spinner").css({
                    "display": "block"
                });
                $.ajax({
                    url: "accountClient",
                    method: "GET",
                    data: {
                        action: action,
                        fullname: fullname,
                        birthday: birthday,
                        email: email,
                        mk: password,
                        male: male,
                        female: female

                    },
                    success: function(data) {
                        $('.errRegister').html(data)
                    }

                })
            }
        })

    })
</script>

</body>

</html>