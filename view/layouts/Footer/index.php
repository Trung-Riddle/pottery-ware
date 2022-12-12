<footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center p-4 border-bottom">


        <!-- Right -->
        <div>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/Trung-Riddle/pottery-ware" class="me-4 link-secondary">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 col-1-ft">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4 d-flex align-items-center logo-h6-ft">
                        <img src="./asset/image/amphora_icons.png" style="width: 34px !important; height: 34px; !important" alt="">&nbsp; &nbsp; <span>Pottery Ware</span>
                    </h6>
                    <p class="">
                    Từ tâm huyết của những nhà làm gốm, chúng tôi cam kết mang lại những sản phẩm chất lượng và tuyệt đẹp. </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Sản Phẩm
                    </h6>
                    <?php 
                        foreach(
                            selectAllDataDB(
                                "SELECT * FROM category LIMIT 0, 4"
                                )
                            as $value
                        ){
                    ?>
                    <p>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=searchProByCate&nameCate=<?= $value['cate_id'] ?>"
                            class="text-reset"><?= $value['cate_name'] ?></a>
                    </p>
                    <?php } ?>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Chính sách
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Thanh toán</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Đổi trả</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Giao hàng</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vận chuyển</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Liên Hệ</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i> hcm city, hcm 700000, VN</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-secondary"></i>
                        nguyendinhtrung@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 89</p>
                    <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="">potteryware.com</a>
    </div>
    <!-- Copyright -->
</footer>