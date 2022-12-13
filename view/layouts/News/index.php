<input class="Container_News-Title-Day_Night-Check" type="checkbox" id="but_date" style="display: none;">
<div class="Container_News">
    <div class="Container_News-View" id="Tab_view">
        <div class="Container_News-View-Tab">
            <h4>Lượt xem</h4>
            <ion-icon name="close-outline" id="close"></ion-icon>
        </div>
        <?php $post = selectAllDataDB("SELECT * FROM posts ORDER BY pts_view DESC LIMIT 0, 5"); ?>
        <div class="Container_News-View-Post">
            <?php foreach ($post as $Post) { ?>
            <a href="<?= $_SERVER['PHP_SELF'] . "?page=detailpost&pts_id=" . $Post['pts_id'] . "&pts_view=" . $Post['pts_view'] ?>"
                class="left-contents">
                <div class="title-content"><?= $Post['pts_title'] ?></div>
                <div class="about-content"><?= $Post['pts_view'] ?></div>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="Container_News-Title">
        <a id="Texts_menu" class="Container_News-Title-Text" href="#">
            <ion-icon name="eye-outline"></ion-icon>
        </a>
        <div class="Container_News-Title-Day_Night">
            <label id="wissten" for="but_date" class="Container_News-Title-Day_Night-But" id="but_day">
                <ion-icon name="sunny-outline" id="sun"></ion-icon>
                <ion-icon name="moon-outline" id="moon"></ion-icon>
            </label>
        </div>
        <a id="Texts" class="Container_News-Title-Notice" href="#">
            <ion-icon name="notifications-outline" id="Notice"></ion-icon>
        </a>

    </div>
    <script>
    var Texts_menu = document.getElementById('Texts_menu');
    var Tab_view = document.getElementById('Tab_view');
    var close = document.getElementById('close');
    Texts_menu.onclick = () => {
        Tab_view.style = `
            transition: 0.5s;
            position: absolute;
            height: 90vh;
            position: fixed;
            top: 90px;
            bottom : -6rem;
            left: 0rem;
            background-color: rgb(32, 32, 32);
            z-index: 9999;
            border-top-right-radius: 0.3rem ;
            border-bottom-right-radius: 0.3rem ;
            box-shadow: rgba(236, 228, 228, 0.07) 0px 1px 2px, rgba(243, 237, 237, 0.07) 0px 2px 4px, rgba(255, 255, 255, 0.07) 0px 4px 8px, rgba(255, 255, 255, 0.07) 0px 8px 16px, rgba(255, 255, 255, 0.07) 0px 16px 32px, rgba(240, 240, 240, 0.07) 0px 32px 64px;
            `;
    }
    close.onclick = () => {
        Tab_view.style = `
            transition: 0.5s;
            position: absolute;
            height: 90vh;
            position: fixed;
            top: 90px;
            left: -100rem;
            background-color: rgb(32, 32, 32);
            z-index: 9999;
            border-top-right-radius: 0.3rem ;
            border-bottom-right-radius: 0.3rem ;
            box-shadow: rgba(236, 228, 228, 0.07) 0px 1px 2px, rgba(243, 237, 237, 0.07) 0px 2px 4px, rgba(255, 255, 255, 0.07) 0px 4px 8px, rgba(255, 255, 255, 0.07) 0px 8px 16px, rgba(255, 255, 255, 0.07) 0px 16px 32px, rgba(240, 240, 240, 0.07) 0px 32px 64px;
            `;
    }

    var Notice = document.getElementById('Notice');
    var Tab_Notice = document.getElementById('Tab_Notice');
    var indexs = 1;
    Notice.onclick = () => {
        if (indexs == 1) {
            Tab_Notice.style = `
                display: block;
                position: absolute;
                width: 20rem;
                height: 3rem;
                background-color: rgb(32, 32, 32);
                z-index: 9999;
                border-radius: 0.3rem ;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1rem;
                box-shadow: rgba(236, 228, 228, 0.07) 0px 1px 2px, rgba(243, 237, 237, 0.07) 0px 2px 4px, rgba(255, 255, 255, 0.07) 0px 4px 8px, rgba(255, 255, 255, 0.07) 0px 8px 16px, rgba(255, 255, 255, 0.07) 0px 16px 32px, rgba(240, 240, 240, 0.07) 0px 32px 64px;
            `;
            indexs++;
        } else {
            Tab_Notice.style = `
                display: none;
            `;
            indexs--;
        }

    }
    </script>
    <?php $post = selectAllDataDB("SELECT * FROM posts"); ?>
    <?php foreach ($post as $Post) { ?>
    <div class="Container_News-Posts">
        <div class="Container_News-Posts-Left">
            <span class="Container_News-Posts-Left-Date"><?= $Post['pts_created_at'] ?></span> <br> <br>
            <div class="Container_News-Posts_Box">
                <i class="Container_News-Posts-Left-Content"><?= $Post['pts_contents'] ?></i>
            </div> <br> <br> <br>
            <a class="Container_News-Posts-Left-Button"
                href="<?= $_SERVER['PHP_SELF'] . "?page=detailpost&pts_id=" . $Post['pts_id'] . "&pts_view=" . $Post['pts_view'] ?>">Đọc</a>
        </div>
        <div class="Container_News-Posts-Right" style="
            background: url(upload/imgPosts/<?= $Post['pts_img'] ?>) no-repeat center;
            background-size: cover;
            background-attachment: fixed
      ">
            <p class="Container_News-Posts-Title"><?= $Post['pts_title'] ?></p>
        </div>
        <div class="Container_News-Posts-Icon">
            <ion-icon name="caret-forward-outline"></ion-icon>
            <ion-icon name="caret-back-outline"></ion-icon>
        </div>
    </div>
    <?php } ?>
</div>