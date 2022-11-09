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
    // ******************* POST ADD ****************** 
    var moreContent = document.getElementById('moreContent');
    var btnMoreContent = document.getElementById('btnMoreContent');
    var i = 0;

    btnMoreContent.onclick = () => {
        if (i == 0) {
            moreContent.style = `
                display: block;
                margin-top: 2rem;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 100%;
                gap: 1rem;
            `;
            i++;
        } else {
            moreContent.style = `
                display: none;
            `;
            i--;
        }
    }

    var formPosts = document.getElementById('formPosts');
    var CreatePost = document.getElementById('CreatePost');
    var numCreate_post = 0;

    CreatePost.onclick = () => {
        if (numCreate_post == 0) {
            formPosts.style = `
                display: block;
                background: #30334c;
                margin-top: 2rem;
                border-radius: 0.3rem;
                box-shadow: 0 10px 30px black;
                margin-bottom: 2rem;
            `;
            numCreate_post++;
        } else {
            formPosts.style = `
                display: none;
            `;
            numCreate_post--;
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