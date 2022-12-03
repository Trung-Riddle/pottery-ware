    <!-- main content -->
    <div class="container-contents">
        <h3 class="box-title" id="New_posts">Tin Tức Mới Nhất</h3>
        <div class="top-contents">
            <div class="box-contents">
                <a href="#" class="left-contents">
                    <?php $post = selectAllDataDB("SELECT * FROM posts ORDER BY pts_id DESC LIMIT 0, 1"); ?>
                    <?php foreach ($post as $Post) { ?>
                        <img src="upload/imgPosts/<?= $Post['pts_img'] ?>" alt="Ảnh tin tức" class="left-pic">
                        <div class="flexbox444">
                            <div class="title-content"><?= $Post['pts_title'] ?></div>
                            <div class="date-content"><?= $Post['pts_created_at'] ?></div>
                            <div class="about-content"><?= $Post['pts_contents'] ?></div>
                        </div>
                    <?php } ?>
                </a>
                <div class="right-contents">
                    <?php $post = selectAllDataDB("SELECT * FROM posts ORDER BY pts_id DESC LIMIT 1, 3"); ?>
                    <?php foreach ($post as $Post) { ?>
                        <a href="#" class="box538">
                            <img src="upload/imgPosts/<?= $Post['pts_img'] ?>" alt="" class="img-box538">
                            <div class="flexbox-538">
                                <div class="title-box538"><?= $Post['pts_title'] ?></div>
                                <div class="date-box538"><?= $Post['pts_created_at'] ?></div>
                                <div class="about-cnt-box538"><?= $Post['pts_contents'] ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="paging" style="display: none;">
                <button class="more-contents">Xem Thêm</button>
            </div>
        </div>
        <h3 class="box-title" id="nb_posts">Hot Nhất Trong Tháng</h3>
        <div class="bottom-contents">
            <div class="box-contents">
                <div class="box683-left">
                    <?php $post = selectAllDataDB("SELECT * FROM posts ORDER BY pts_id DESC LIMIT 0, 4"); ?>
                    <?php foreach ($post as $Post) { ?>
                        <a href="#" class="box320">
                            <div class="wrap-box320">
                                <img src="upload/imgPosts/<?= $Post['pts_img'] ?>" alt="" class="img-box320">
                                <div class="title-content"><?= $Post['pts_title'] ?></div>
                                <div class="date-content"><?= $Post['pts_created_at'] ?></div>
                                <div class="about-content"><?= $Post['pts_contents'] ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="right-contents-bottom">
                    <h3 class="box444-title">Tìm Kiếm Nhiều Trong Tháng</h3>
                    <?php $post = selectAllDataDB("SELECT * FROM posts ORDER BY pts_view DESC LIMIT 0, 3"); ?>
                    <?php foreach ($post as $Post) { ?>
                        <a href="#" class="hot-search">
                            <img src="upload/imgPosts/<?= $Post['pts_img'] ?>" alt="" class="hotsearch-img">
                            <div class="flexbox-270px">
                                <div class="hotsearch-title"><?= $Post['pts_title'] ?></div>
                                <div class="hotsearch-date"><?= $Post['pts_created_at'] ?></div>
                            </div>
                        </a>
                    <?php } ?>
                    <div class="buynow-img"><a href="#"><img src="upload/imgPosts/pic9.jpg" alt=""></a></div>
                    <div class="event-contents">
                        <h3 class="title-event">Sự Kiện Tháng 12</h3>
                        <h3 class="title-events">Từ thiện mái ấm trường</h3>
                        <h3 class="title-events">Khóa dạy làm gốm cơ bản</h3>
                        <h3 class="title-events">Workshop về làm gốm cho sinh viên</h3>
                        <h3 class="title-events">Ra mắt sản phẩm mới của công ty</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="paging">
            <button class="more-contents">Xem Thêm</button>
        </div>
    </div>
    <!-- main content -->