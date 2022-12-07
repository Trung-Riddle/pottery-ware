<form class="form_role" id="form_role" method="post" action="<?= $_SERVER['PHP_SELF'] ?>?act=change_role&ur_id=<?= $_GET['ur_id'] ?>">
    <input type="hidden" name="ur_id" value="<?= $_GET['ur_id'] ?>" disabled>
    <div class="box">
        <input type="radio" name="ur_role" value="0">Khách hàng <br>
        <input type="radio" name="ur_role" value="1">Nhân viên <br>
        <input type="radio" name="ur_role" value="2">Quản trị
    </div>
    <input type="submit" id="but" name="change_role" value="Cập nhật">
</form>

<style>
    .form_role {
        width: 40%;
        margin: auto;
        margin-top: 3rem;
        border-collapse: collapse;
        background-color: rgba(0, 0, 0, 0.2);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        color: rgba(255, 255, 255, 0.822);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(5px);
        text-align: center;
        padding: 2rem;
    }

    .box {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .form_role select {
        width: 80%;
        padding: 1rem;
        background: transparent;
        border: 0.01rem solid #fff;
        color: #fff;
    }

    .form_role select:focus {
        color: #000;
    }

    .form_role #but {
        margin-top: 2rem;
        padding: 0.4rem 2rem;
        border: 0.01rem solid #fff;
        color: #fff;
        background: transparent;
    }

    .form_role #but:hover {
        background: #fff;
        color: #000;
    }
</style>