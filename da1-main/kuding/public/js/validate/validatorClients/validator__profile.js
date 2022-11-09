$("#form_profile").validate({
    rules: {
      fullname: {
        required : true,
        minlength : 5,
        maxlength : 25
      },
      email: {
        required : true,
        email: /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/
      },
      phone:{
        required : true,
        number: true,
        validatePhone: true
      },
      birthday: {
        required : true,
        date : true
      }
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập tên !",
            minlength: "Nhập tên tối thiếu 5 ký tự",
            maxlength: "Nhập tên tối đa 25 ký tự"
        },
        email: {
            required: "Vui lòng nhập email !",
            email: "Nhập đúng định dạng email (VD:Kooing@gmail.com)"
        },
        phone:{
            required : "Số điện thoại không được bỏ trống",
            number: "Số điện thoại phải là số"
        },
        birthday: {
            required: "Vui lòng nhập ngày sinh !",
            date: "Nhập đúng định dạng ngày tháng !"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });
 
 $("#form_pass").validate({
    rules: {
        password: {
            required : true,
            validatePassword: true,
            minlength : 6,
            maxlength : 12
        },
        password_new: {
            required : true,
            validatePassword: true,
            minlength : 6,
            maxlength : 12
        },
        password_comfim: {
            required : true,
            validatePassword: true,
            minlength : 6,
            maxlength : 12
        },
    },

    messages: {
        password: {
            required: "Vui lòng nhập mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        password_new: {
            required: "Vui lòng nhập mật khẩu mới !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        password_comfim: {
            required: "Vui lòng xác nhận mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });

 $.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(value);
}, "Mật khẩu không chứa ký đặc biệt ít nhất 1 số và 1 chữ cái");

$.validator.addMethod("validatePhone", function (value, element) {
    return this.optional(element) ||  /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(value);
}, "Bạn phải nhập đúng số điện thoại");

