//todo: box error
{
  /* <div class="filterError">
<div class="boxError">
    <div class="textError">
    </div>
    <a href="" id="backError">Quay lại</a>
</div>
</div> */
}

//* Check form đăng nhập
if (document.getElementById("btnSubmitLogin")) {
  document.getElementById("btnSubmitLogin").onclick = (e) => {
    var userName = document.getElementById("userName");
    var pass = document.getElementById("pass");
    var error = false;
    var checkUserName = "";
    var checkPass = "";

    //* hàm check lỗi
    function checkError(textError) {
      e.preventDefault();
      var error = document.querySelector(".filterError");
      var text = `<span>!</span> ${textError} <br /><br />`;
      error.style.visibility = "visible";
      error.style.opacity = 1;
      // setTimeout(() => {
      //   error.style.visibility = "hidden";
      //   error.style.opacity = 0;
      // }, 3000);
      return text;
    }

    //* Check user name
    if (userName.value == "") {
      checkUserName = checkError("Tên đăng nhập không được bỏ trống.");
      error = true;
    }

    //* Check password
    if (pass.value == "") {
      checkPass = checkError("Mật khẩu không được bỏ trống.");
      error = true;
    }

    //* Hiển thị lỗi
    if (error == true) {
      document.querySelector(".textError").innerHTML =
        checkUserName + checkPass;
    }
  };
}

//* Check form đăng ký
if (document.getElementById("btnSubmitSignUp")) {
  document.getElementById("btnSubmitSignUp").onclick = (e) => {
    var userName = document.getElementById("ur_name");
    var email = document.getElementById("cus_email");
    var pass = document.getElementById("ur_pass");
    var forgot_pass = document.getElementById("forgot_pass");
    var error = false;
    var checkUserName = "";
    var checkEmail = "";
    var checkPass = "";
    var checkForgotPass = "";

    //* hàm check lỗi
    function checkError(textError) {
      e.preventDefault();
      var error = document.querySelector(".filterError");
      var text = `<span>!</span> ${textError} <br /><br />`;
      error.style.visibility = "visible";
      error.style.opacity = 1;
      // setTimeout(() => {
      //   error.style.visibility = "hidden";
      // }, 3000);
      return text;
    }

    //* Check user name
    if (userName.value == "") {
      checkUserName = checkError("Tên đăng nhập không được bỏ trống.");
      error = true;
    }

    //* Check email
    if (email.value == "") {
      checkEmail = checkError("Email không được bỏ trống.");
      error = true;
    }

    //* Check password
    if (pass.value == "") {
      checkPass = checkError("Mật khẩu không được bỏ trống.");
      error = true;
    }

    //* Check confirm password
    if (forgot_pass.value == "") {
      checkForgotPass = checkError("Nhập lại mật khẩu không được bỏ trống.");
      error = true;
    }

    //* Hiển thị lỗi
    if (error == true) {
      document.querySelector(".textError").innerHTML =
        checkUserName + checkEmail + checkPass + checkForgotPass;
    } else {
      var loading = document.querySelector(".loading");
      loading.style.visibility = "visible";
    }
  };
}

//* Check forgot pass
if (document.getElementById("submitForm")) {
  document.getElementById("submitForm").onclick = (e) => {
    var email = document.getElementById("cus_email");
    if (document.getElementById("code")) {
      var code = document.getElementById("code");
      var pass = document.getElementById("ur_pass");
      var forgot_pass = document.getElementById("forgot_pass");
    }
    var error = false;
    var checkCode = "";
    var checkEmail = "";
    var checkPass = "";
    var checkForgotPass = "";

    //* hàm check lỗi
    function checkError(textError) {
      e.preventDefault();
      var error = document.querySelector(".filterError");
      var text = `<span>!</span> ${textError} <br /><br />`;
      error.style.visibility = "visible";
      error.style.opacity = 1;
      // setTimeout(() => {
      //   error.style.visibility = "hidden";
      // }, 3000);
      return text;
    }

    //* Check code
    if (code && code.value == "") {
      checkCode = checkError("Mã xác nhận không được bỏ trống.");
      error = true;
    }

    //* Check email
    if (email && email.value == "") {
      checkEmail = checkError("Email không được bỏ trống.");
      error = true;
    }

    //* Check password
    if (pass && pass.value == "") {
      checkPass = checkError("Mật khẩu không được bỏ trống.");
      error = true;
    }

    //* Check confirm password
    if (forgot_pass && forgot_pass.value == "") {
      checkForgotPass = checkError("Nhập lại mật khẩu không được bỏ trống.");
      error = true;
    }

    //* Hiển thị lỗi
    if (error == true) {
      document.querySelector(".textError").innerHTML =
        checkCode + checkEmail + checkPass + checkForgotPass;
    } else {
      var loading = document.querySelector(".loading");
      loading.style.visibility = "visible";
    }
  };
}

//* Check form payment
if (document.querySelector(".now-cart")) {
  document.querySelector(".now-cart").onclick = (e) => {
    var userName = document.getElementById("ord_cus_name");
    var email = document.getElementById("ord_email");
    var ord_phone = document.getElementById("ord_phone");
    var ord_address = document.getElementById("ord_address");
    var error = false;
    var checkUserName = "";
    var checkEmail = "";
    var check_ord_phone = "";
    var check_ord_address = "";

    //* hàm check lỗi
    function checkError(textError) {
      e.preventDefault();
      var error = document.querySelector(".filterError");
      var text = `<span>!</span> ${textError} <br /><br />`;
      error.style.visibility = "visible";
      error.style.opacity = 1;
      // setTimeout(() => {
      //   error.style.visibility = "hidden";
      // }, 3000);
      return text;
    }

    //* Check user name
    if (userName.value == "") {
      checkUserName = checkError("Tên không được bỏ trống.");
      error = true;
    }

    //* Check email
    if (email.value == "") {
      checkEmail = checkError("Email không được bỏ trống.");
      error = true;
    }

    //* Check password
    if (ord_phone.value == "") {
      check_ord_phone = checkError("Số điện thoại không được bỏ trống.");
      error = true;
    }

    //* Check confirm password
    if (ord_address.value == "") {
      check_ord_address = checkError("Địa chỉ không được bỏ trống.");
      error = true;
    }

    //* Hiển thị lỗi
    if (error == true) {
      document.querySelector(".textError").innerHTML =
        checkUserName + checkEmail + check_ord_phone + check_ord_address;
    } else {
      var loading = document.querySelector(".loading");
      loading.style.visibility = "visible";
    }
  };
}

//* Remove error
document.getElementById("backError").onclick = (e) => {
  e.preventDefault();
  var fillterError = document.querySelector(".filterError");
  fillterError.style.opacity = 0;
  fillterError.style.visibility = "hidden";
};
document.querySelector(".filterError").onclick = () => {
  var fillterError = document.querySelector(".filterError");
  fillterError.style.opacity = 0;
  fillterError.style.visibility = "hidden";
};
