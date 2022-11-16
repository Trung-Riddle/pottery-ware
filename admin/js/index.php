<script>
    var index = true;

    function hideShow() {
        if (index) {
            document.getElementById('pass').type = "text";
            index = false;
        } else {
            document.getElementById('pass').type = "password";
            index = true;
        }
    }
</script>


<script>
    var editPost = document.getElementById('editPost');
    var detailPosts = document.getElementById('detailPosts');
    var btnEditPost = document.getElementById('btnEditPost');
    var numEdit_post = 0;

    btnEditPost.onclick = () => {
        if (numEdit_post == 0) {
            editPost.style = `
                display: block;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background: #30334c;
                margin-top: 2rem;
                border-radius: 0.3rem;
                box-shadow: 0 10px 30px black;
                margin-bottom: 2rem;
                width: 80%;
                margin: auto;
                gap: 1rem;
            `;
            detailPosts.style = `display:none;`;
            numEdit_post++;
        } else {
            editPost.style = `
                display: none;
            `;
            detailPosts.style = `display:block;`;
            numEdit_post--;
        }
    }
</script>