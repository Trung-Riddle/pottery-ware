
var signupBtn = document.querySelector('.app.front .btn.signup');
var loginBtn = document.querySelector('.app.back .btn.login');
var loginForm = document.querySelector('.app.front');
var signupForm = document.querySelector('.app.back');
var container = document.querySelector('.container');

signupBtn.addEventListener('click', () => {
	container.classList.toggle('active');
});
loginBtn.addEventListener('click', () => {
	container.classList.toggle('active');
});

let coverPreview = document.querySelector('.avt-img');
        let cover = document.getElementById('up_file');
        let camIcon = document.querySelector('.camera-icon');


        coverPreview.addEventListener('click',_=>cover.click());

        cover.addEventListener("change",_=>{
            let file = cover.files[0];
            let reader = new FileReader();
            reader.onload = function (){
                coverPreview.src = reader.result;
                camIcon.style.display = 'none';
            }
            reader.readAsDataURL(file);
        });
