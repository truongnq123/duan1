$("#register_user").validate({
    rules: {
        fullname: {
            required : true,
            minlength : 6,
            maxlength : 26
        },
        email: {
            required : true,
            email: /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/
        },
        password: {
            required : true,
            validatePassword: true,
            minlength : 6,
            maxlength : 12
        },
        phone:{
            required : true,
            number: true,
            validatePhone: true
        },
        birthday: {
            required : true,
            date: true
        },
        avatar: {
            required : true,
        },
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập tên !",
            minlength: "Nhập tên tối thiếu 6 ký tự",
            maxlength: "Nhập tên tối đa 26 ký tự"
        },
        email: {
            required: "Vui lòng nhập email !",
            email: "Nhập đúng định dạng email (VD:Kooing@gmail.com)"
        },
        birthday: {
            required: "Vui lòng nhập ngày sinh !",
            email: "Nhập đúng định dạng ngày tháng!"
        },
        phone:{
            required : "Số điện thoại không được bỏ trống",
            number: "Số điện thoại phải là số"
        },
        password: {
            required: "Vui lòng nhập mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        avatar: {
            required: "Vui lòng nhập ảnh !",
        }
    },
    submitHandler: function(form) {
        console.log(form);
      form.submit();
    }
 });

// validate checkout
$("#checkout").validate({
    rules: {
        fullname: {
            required: true,
            minlength : 6,
            maxlength : 26
        },
        address_spec: {
            required: true,
            minlength : 6,
            maxlength : 26
        },
        phone:{
            required : true,
            number: true,
            validatePhone: true
        },
        xa:{
            required: true
        },
        agree:{
            required: true
        }
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập tên !",
            minlength : "Nhập tối thiểu 6 ký tự",
            maxlength : "Nhập tối thiểu 26 ký tự"
        },
        address_spec: {
            required: "Vui lòng nhập địa chỉ cụ thể !",
            minlength : "Nhập tối thiểu 6 ký tự",
            maxlength : "Nhập tối thiểu 26 ký tự"
        },
        phone:{
            required : "Số điện thoại không được bỏ trống",
            number: "Số điện thoại phải là số"
        },
        xa:{
            required: "Vui nhập đầy đủ địa chỉ !"
        },
        agree:{
            required: "Bạn phải đồng ý điều khoản của chúng tôi"
        }
       
    },
    submitHandler: function(form) {
      form.submit();
    }
 });


// validate yêu thích
$("#favorite").validate({
    rules: {
        color: {
            required: true,
        },
        size: {
            required: true,
        },
        quantity:{
            required: true,
            min: 1,
            number: true
        }
    },

    messages: {
        color: {
            required: "Vui lòng chọn màu sắc !",
        },
        size: {
            required: "Vui lòng chọn kích cỡ !",
        },
        quantity:{
            required: "Vui lòng chọn số lượng !",
            min: "Số lượng phải lớn hơn 0",
            number: "Vui lòng nhập số !"
        }
       
    },
    submitHandler: function(form) {
      form.submit();
    }
 });


 $.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(value);
}, "Mật khẩu không chứa ký đặc biệt ít nhất 1 số và 1 chữ cái");

$.validator.addMethod("vourcher", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/.test(value);
}, "Vui lòng nhập Vourcher không chứa ký tự đặc biệt");

$.validator.addMethod("validatePhone", function (value, element) {
    return this.optional(element) ||  /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(value);
}, "Bạn phải nhập đúng số điện thoại");