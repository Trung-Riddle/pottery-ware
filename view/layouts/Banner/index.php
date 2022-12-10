<section class="section-banner">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($banner as $Banner) { ?>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="upload/banner/<?= $Banner['bn_img'] ?>" class="d-block w-100" alt="Banner Pottery-Ware">
                    <div class="carousel-caption d-md-block gl-content">
                        <h5 style="font-size: 24px;" class="caption-bn"><?= $Banner['bn_title']  ?></h5>
                        <p class="desc-bn"><?= $Banner['bn_content'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <script>
                var listBanner = document.querySelectorAll(".carousel-item")
                listBanner[0].classList.add("active")
            </script>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>