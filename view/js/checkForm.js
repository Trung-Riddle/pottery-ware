//* Check form đăng nhập
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
    setTimeout(() => {
      error.style.visibility = "hidden";
    }, 3000);
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
    document.querySelector(".textError").innerHTML = checkUserName + checkPass;
  }
};
