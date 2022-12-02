document.getElementById("submit").onclick = () => {
  var userName = document.getElementById("userName");
  var email = document.getElementById("email");
  var tel = document.getElementById("tel");
  var pass = document.getElementById("password");
  var rePass = document.getElementById("rePass");
  var checkForm = document.querySelector(".checkForm");

  var error = false;
  var errorUserName = "";
  var errorEmail = "";
  var errorTel = "";
  var errorPass = "";
  var errorRePass = "";

  //* check user name
  if (userName.value === "") {
    errorUserName = checkVar(
      errorUserName,
      "Tên đăng nhập không được bỏ trống",
      userName
    );
    error = true;
  } else {
    if (userName.value.length > 10) {
      errorUserName = checkVar(
        errorUserName,
        "Tên đăng nhập không vượt quá 10 ký tự",
        userName
      );
      error = true;
    }
  }

  //* check email
  if (email.value === "") {
    errorEmail = checkVar(errorEmail, "Email không được bỏ trống", email);
    error = true;
  } else {
    const expression =
      /^((?:[A-Za-z0-9!#$%&'*+\-\/=?^_`{|}~]|(?<=^|\.)"|"(?=$|\.|@)|(?<=".*)[ .](?=.*")|(?<!\.)\.){1,64})(@)((?:[A-Za-z0-9.\-])*(?:[A-Za-z0-9])\.(?:[A-Za-z0-9]){2,})$/i;
    var checkMail = expression.test(String(email.value).toLowerCase());
    if (checkMail == false) {
      errorEmail = checkVar(errorEmail, "Email không hợp lệ", email);
      error = true;
    }
  }

  //* check phone
  if (tel.value === "") {
    errorTel = checkVar(errorTel, "Số điện thoại không được bỏ trống", tel);
    error = true;
  }

  //* check pass
  if (pass.value === "") {
    errorPass = checkVar(errorPass, "Mật khẩu không được bỏ trống", pass);
    error = true;
  }

  //* check enter the pass
  if (rePass.value === "") {
    errorRePass = checkVar(errorRePass, "Vui lòng nhập lại mật khẩu", rePass);
    error = true;
  }

  //* check error
  if (error == true) {
    checkForm.style.opacity = "1";
    checkForm.innerHTML =
      errorUserName + errorEmail + errorTel + errorPass + errorRePass;
  } else {
    checkForm.innerHTML = "<div>Tạo tài khoản thành công</div>";
    checkForm.style.opacity = "1";
  }
};

function checkVar(nameError, warning, errorInp) {
  nameError = `<div><span>!</span> ${warning}</div>`;
  errorInp.classList.add("error");
  setTimeout(() => {
    errorInp.classList.remove("error");
  }, 3000);
  return nameError;
}
