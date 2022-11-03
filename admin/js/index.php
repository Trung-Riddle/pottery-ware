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