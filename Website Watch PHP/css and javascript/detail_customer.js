var boxShadowCSS = '0px 3px #1bcf4840';
var borderCSS = '2px solid red';
$(document).ready(function () {
    $("#SaveInfo").on('click', function () {

        var _IDCustomer = document.getElementById("IDCustomer").value;
        var _CreateAt = document.getElementById("CreateAt").value;
        var FullName = document.getElementById("FullName");
        var _FullName = FullName.value;
        var _Phone = document.getElementById("Phone").value;
        var _Email = document.getElementById("Email").value;
        var _Address = document.getElementById("Address").value;
        var _UserName = document.getElementById("UserName").value;
        var _PassWord = document.getElementById("PassWord").value;
        var _ChangePassWord = document.getElementById("ChangePassWord").value;
        console.log(_IDCustomer + " " + _CreateAt + " " + _FullName + " " + _Phone + " " + _Email + " " + " " + _Address + " " + " " + _UserName + " " + " " + _PassWord + " " + " " + _ChangePassWord);
        if (_FullName == "" || _FullName.length == 0) {
            setTimeout(() => {
                FullName.style.border = borderCSS;
                FullName.style.boxShadow = boxShadowCSS;
            }, 2000)
            Swal.fire({
                icon: 'error',
                title: 'Thông báo!',
                text: 'Họ và tên không được để trống!',
                timer: 1500,
                timerProgressBar: true,
            }).then((result) => {
                
            });

        }
        //else if (_Phone == "" || _Phone.length == 0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Thông báo!',
        //         text: 'Số điện thoại không được để trống!',
        //         timer: 1500,
        //         timerProgressBar: true,
        //     })
        // } else if (_Email == "" || _Email.length == 0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Thông báo!',
        //         text: 'Email không được để trống!',
        //         timer: 1500,
        //         timerProgressBar: true,
        //     })
        // } else if (_Address == "" || _Address.length == 0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Thông báo!',
        //         text: 'Địa chỉ không được để trống!',
        //         timer: 1500,
        //         timerProgressBar: true,
        //     })
        // } else if (_UserName == "" || _UserName.length == 0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Thông báo!',
        //         text: 'Tên đăng nhập không được để trống!',
        //         timer: 1500,
        //         timerProgressBar: true,
        //     })
        // } else if (_PassWord == "" || _PassWord.length == 0) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Thông báo!',
        //         text: 'Mật khẩu không được để trống!',
        //         timer: 1500,
        //         timerProgressBar: true,
        //     })
        //     PassWord.style.border = borderCSS;
        //     PassWord.style.boxShadow = boxShadowCSS;
        // }
    });


});