<div class="banner_conteiner">
    <?php $index = 1 ?>
    <?php foreach ($listBanner as $Banner) { ?>
        <form class="Banner1">
            <h2>Banner <?php echo "$index" ?></h2>
            <input type="file" id="image_banner1" style="display: none;" name="bn_img">
            <input type="text" placeholder="Tiêu đề" name="bn_title" require value="<?= $Banner['bn_title'] ?>">
            <input type="text" placeholder="Nội dung" name="bn_content" value="<?= $Banner['bn_content'] ?>" require>
            <label for="image_banner1">
                <img src="../upload/banner/<?= $Banner['bn_img'] ?>" alt="Banner">
                <ion-icon name="images-outline"></ion-icon>
            </label>
            <a class="btnbanner" href="<?= $_SERVER['PHP_SELF'] . "?act=editBanner&bn_id=" . $Banner['bn_id'] ?>">Thay đổi</a>
        </form>
    <?php $index++;
    } ?>
</div>
<style>
    .banner_conteiner {
        width: 80%;
        padding: 1rem;
        display: grid;
        grid-template-columns: auto auto auto;
        column-gap: 1rem;
        margin: auto;
    }

    .Banner1 {
        backdrop-filter: blur(10rem);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        border-radius: 0.3rem;
        gap: 1rem;
        border: 0.01rem solid #fff;
    }

    .Banner1 h2 {
        color: #fff;
        text-transform: uppercase;
    }

    .Banner1 input {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 0.01rem solid #fff;
        background: transparent;
        color: #fff;
    }

    .Banner1 input::placeholder {
        color: #fff;
    }

    .Banner1 label {
        position: relative;
        cursor: pointer;
        height: 10rem;
        width: 100%;
        border: 0.01rem solid #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .Banner1 label img {
        width: 100%;
    }

    .Banner1 label ion-icon {
        position: absolute;
        color: #fff;
        font-size: 1.8rem;
    }

    .btnbanner {
        padding: 0.3rem 1rem;
        border: 0.01rem solid #fff;
        background: transparent;
        color: #fff;
        transition: 0.5s;
        text-decoration: none;
    }

    .btnbanner:hover {
        background: #fff;
        color: #000;
    }
</style>