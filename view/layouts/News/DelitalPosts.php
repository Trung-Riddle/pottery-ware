<?php foreach ($detailpost as $Post) { ?>
    <div class="Container_Post">
        <div class="Container_Post--Advertisement_Week">
            <marquee behavior="" direction="">
                <h3>POTTERY-WARE | Chúc bạn xem tin tức vui vẻ !!!</h3>
            </marquee>
        </div>
        <div class="Container_Post--Detail">
            <div class="Container_Post--Detail--Content">
                <a href="#" class="Container_Post--Detail--Content--Url">News > <?= $Post['pts_title'] ?></a>
                <p class="Container_Post--Detail--Content--Title"><?= $Post['pts_title'] ?></p>
                <p class="Container_Post--Detail--Content--Info">
                    <span>Pottery-Ware</span> - <?= $Post['pts_created_at'] ?> <br>
                    <span>View: <?= $Post['pts_view'] ?></span>
                </p>
                <div class="Container_Post--Detail--Content--Advertisement">
                    <img src="asset/image/banner/quang-cao.jpeg" width="100%" alt="Quảng cáo">
                </div>
                <div class="Container_Post--Detail--Content--image">
                    <img src="upload/imgPosts/<?= $Post['pts_img'] ?>" alt="Hình tin tức">
                </div>
                <p class="Container_Post--Detail--Content--Lead">
                    <?= $Post['pts_contents'] ?>
                </p>
                <div class="Container_Post--Detail--Content--Advertisement">
                    <img src="asset/image/banner/quang-cao.jpeg" width="100%" alt="Quảng cáo">
                </div>
                <div class="Container_Post--Detail--Content--Hagtag">
                    <a href="#" class="Container_Post--Detail--Content--Hagtag--but">New</a>
                    <a href="#" class="Container_Post--Detail--Content--Hagtag--but">Top</a>
                    <a href="#" class="Container_Post--Detail--Content--Hagtag--but">Week</a>
                </div>
                <div class="Container_Post--Detail--Content--Posted">
                    <div class="Container_Post--Detail--Content--Posted--Avatar">
                        <img src="upload/avatar/ngoa.jpg" alt="avatar" width="100%">
                    </div>
                    <div class="Container_Post--Detail--Content--Posted--Infomation">
                        <p class="Container_Post--Detail--Content--Posted--Infomation--name">
                            Đăng bởi Min Kiên</p>
                        Website bán đồ sứ xịn bà cố, chất lượng khỏi chê và độ uy tín khỏi bàn <br> Nếu chăm chỉ đọc tin tức sẽ nhận được phiếu giảm giá 0%
                    </div>
                </div>
                <div class="Container_Post--Detail--Content--Posted--RelatedTo">
                    <p class="Container_Post--Detail--Content--Posted--RelatedTo--title">
                        Bài viết nổi bật
                    </p>
                    <?php $allPosst = selectAllDataDB("SELECT * FROM posts ORDER BY pts_id DESC LIMIT 0, 3"); ?>
                    <div class="Container_Post--Detail--Content--Posted--RelatedTo--Posts_Post">
                        <?php foreach ($allPosst as $AllPOST) { ?>
                            <a href="#" class="Container_Post--Detail--Content--Posted--RelatedTo--Posts_Post--Post">
                                <div class="Container_Post--Detail--Content--Posted--RelatedTo--Posts_Post--Post--image child">
                                    <img src="upload/imgPosts/<?= $AllPOST['pts_img'] ?>" alt="Tin tức" width="120%">
                                </div>
                                <p class="Container_Post--Detail--Content--Posted--RelatedTo--Posts_Post--Post--title child"><?= $Post['pts_title'] ?></p>
                                <p class="Container_Post--Detail--Content--Posted--RelatedTo--Posts_Post--Post--Day child"><?= $Post['pts_created_at'] ?></p>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="Container_Post--Detail--Advertisement">
                <p class="Container_Post--Detail--Advertisement--title">
                    Theo dõi chúng tôi
                </p>
                <div class="Container_Post--Detail--Advertisement--Internet">
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-tiktok"></ion-icon>
                    </a>
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="#" class="Container_Post--Detail--Advertisement--Internet--Icon">
                        <ion-icon name="logo-twitch"></ion-icon>
                    </a>
                </div>
                <div class="Container_Post--Detail--Advertisemen--Popular">
                    <p class="Container_Post--Detail--Advertisemen--Popular--Title">
                        Tin nổi tiếng
                    </p>
                    <?php $allPosst = selectAllDataDB("SELECT * FROM posts ORDER BY pts_view DESC LIMIT 0, 3"); ?>
                    <?php foreach ($allPosst as $AllPOST) { ?>
                        <a href="#" class="Container_Post--Detail--Advertisemen--Popular--Post">
                            <div class="Container_Post--Detail--Advertisemen--Popular--Post--Image">
                                <img src="upload/imgPosts/<?= $AllPOST['pts_img'] ?>" alt="Tin tức" width="120%">
                            </div>
                            <div class="Container_Post--Detail--Advertisemen--Popular--Post--Content">
                                <p class="Container_Post--Detail--Advertisemen--Popular--Post--Content--Title">
                                    <?= $Post['pts_title'] ?>
                                </p>
                                <p class="Container_Post--Detail--Advertisemen--Popular--Post--Content--Date">
                                    <?= $Post['pts_created_at'] ?>
                                </p>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="Container_Post--Detail--Advertisemen--Catergories">
                    <p class="Container_Post--Detail--Advertisemen--Catergories--Title">Thể loại</p>
                    <a href="#" class="Container_Post--Detail--Advertisemen--Catergories--Text">Lịch sử</a>
                    <a href="#" class="Container_Post--Detail--Advertisemen--Catergories--Text">Thiết kế</a>
                    <a href="#" class="Container_Post--Detail--Advertisemen--Catergories--Text">Thị trường</a>
                </div>
                <div class="Container_Post--Detail--Advertisemen--Poster" style="
                        background: url(upload/imgPosts/pic9.jpg) no-repeat center;
                        background-size: cover;
                ">
                </div>
            </div>
        </div>
    </div>
<?php } ?>