    <nav class="sidebar-admin active">
        <div class="logo_content">
            <div class="logo-admin">
                <img src="../asset/image/amphora_icons.png" height="32px" alt="" />
                <span class="logo_name"><span id="shadow">
                        <span id="glow">Pottery</span><span id="blink">ware</span>
                    </span></span>
            </div>
            <i class="fa-light fa-bars-sort" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a class="icons-link active" href="<?= $_SERVER["PHP_SELF"] ?>?act=dashboard"><i
                        class="fa-regular fa-gauge"></i>
                    <span class="link_name">Bảng Điều Khiển</span>
                </a>
                <span class="tooltip-hover">Bảng Điều Khiển</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=charts"><i
                        class="fa-light fa-chart-mixed"></i>
                    <span class="link_name">Analytics</span>
                </a>
                <span class="tooltip-hover">Analytics</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=order"><i
                        class="fa-light fa-basket-shopping-simple"></i>
                    <span class="link_name">Đơn Hàng</span>
                </a>
                <span class="tooltip-hover">Đơn Hàng</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=category"><i
                        class="fa-light fa-album-collection"></i>
                    <span class="link_name">Danh Mục</span>
                </a>
                <span class="tooltip-hover">Danh Mục</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=product"><i
                        class="fa-regular fa-bag-shopping"></i>
                    <span class="link_name">Sản Phẩm</span>
                </a>
                <span class="tooltip-hover">Sản Phẩm</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=banner"><i
                        class="fa-regular fa-rectangle-vertical-history"></i>
                    <span class="link_name">Banner</span>
                </a>
                <span class="tooltip-hover">Banner</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=posts"><i class="fa-light fa-newspaper"></i>
                    <span class="link_name"> Bài Viết</span>
                </a>
                <span class="tooltip-hover"> Bài Viết</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=comment"><i
                        class="fa-regular fa-comment-smile"></i>
                    <span class="link_name">Bình Luận</span>
                </a>
                <span class="tooltip-hover">Bình Luận</span>
            </li>
            <li>
                <a class="icons-link" href="<?= $_SERVER["PHP_SELF"] ?>?act=user"><i class="fa-light fa-users"></i>
                    <span class="link_name"> Người Dùng</span>
                </a>
                <span class="tooltip-hover"> Người Dùng</span>
            </li>
        </ul>
        <div class="profile_content_ad">
            <div class="profile_ad" onclick="logoutAdmin()" style="cursor: pointer;">
                <div class="profile_detail">
                    <img src="https://i.pinimg.com/564x/b0/4c/39/b04c39732cfefc24f9b633c9a0b8d6b3.jpg" alt="" />
                    <div class="name_job">
                        <div class="name_ad">Admin</div>
                        <div class="job_ad">Frond-end Web</div>
                    </div>
                </div>
                <i class="fa-light fa-arrow-right-from-bracket logout_ic"></i>
            </div>
        </div>
    </nav>
    <div class="tab-table-products active">
        <div class="container-right">
            <div class="tool-header-ad">
                <div class="box-search-header">
                    <i class="fa-light fa-magnifying-glass"></i>
                    <input type="search" placeholder="Tìm kiếm ở đây..." class="search-box" name="search-all" />
                </div>
                <div class="box-tool-admin">
                    <i class="fa-light fa-gear"></i>
                    <i class="fa-light fa-user"></i>
                    <i class="fa-light fa-bell" id="blink"></i>
                    <i class="fa-light fa-envelope" id="blink"></i>
                    <a href="/" onclick="logoutAdmin(event)"><i class="fa-light fa-arrow-right-from-bracket"></i></a>
                    <script>
                    function logoutAdmin() {
                        event.preventDefault()
                        // alert("ahihi");
                        document.cookie = "acc_allow=; expires=Thu; 01-Jan-70 00:00:01 GMT; path=/"
                        location.reload()
                    }
                    </script>
                </div>
            </div>

            <!-- MAIN -->
            <?php if(isset($_GET['act']) && ($_GET['act'] == "dashboard")) { ?>
            <div style="width:100% ;" class="statistical">
                <div class="statistical-system">
                    <div>
                        <div>
                            <p>Người dùng</p>
                            <p class="counter">189</p>
                        </div>
                        <i class="fa-light fa-users"></i>
                    </div>
                    <div>
                        <div>
                            <p>Đơn Hàng</p>
                            <p class="counter">33</p>
                        </div>
                        <i class="fa-light fa-truck"></i>
                    </div>
                    <div>
                        <div>
                            <p>Truy cập</p>
                            <p class="counter">189</p>
                        </div>
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <div>
                        <div>
                            <p>Sản Phẩm</p>
                            <p class="counter">99</p>
                        </div>
                        <i class="fa-regular fa-shop"></i>
                    </div>
                </div>
                <canvas id="myChart" style="width:100%;"></canvas>

            </div>
            <?php } else { include_once("../controller/controlAdmin.php"); }?>
        </div>
    </div>

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script>
var xValues = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9",
    "Tháng 10", "Tháng 11", "Tháng 12"
];
var yValues = [100, 49, 44, 24, 15, 12, 18, 33, 44, 10, 0, 34, 77];
var barColors = ["rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)",
    "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)",
    "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)", "rgba(187, 185, 185, 0.3)",
    "rgba(187, 185, 185, 0.3)"
];
Chart.defaults.color = 'red';
new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            borderColor: "pink",
            borderWidth: 1,
            borderRadius: 20,
            backgroundColor: barColors,
            data: yValues,
        }]
    },
    options: {

        scales: {
            yAxes: [{
                ticks: {
                    fontSize: 15,
                    fontFamily: "'Roboto', sans-serif",
                    fontColor: 'rgba(255, 255, 255, 0.729)',
                    fontStyle: '400'
                },
                gridLines: {
                    display: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Milion VND 0 - 100',
                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 15,
                    fontFamily: "'Roboto', sans-serif",
                    fontColor: 'rgba(255, 255, 255, 0.729)',
                    fontStyle: '400'
                },
                gridLines: {
                    display: true,
                    color: "rgba(255, 255, 255, 0.335)"
                }
            }],

        },
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "Doanh Thu 2022",
            fontSize: 29,
            fontColor: "rgba(255, 255, 255, 0.729)",
            padding: 50,
        }
    }
});
$(document).ready(function() {
    $('.counter').counterUp({
        delay: 5,
        time: 4000
    });
});
    </script>

    <script>
jQuery(function() {
    jQuery(".trash").click(function() {
        swal({
            title: "Bạn Muốn Xoá Nó ư [!]",
            text: "Bạn có chắc chắn là muốn xóa sản phẩm này? ",
            buttons: ["Hủy bỏ", "Đồng ý"],
        }).then((willDelete) => {
            if (willDelete) {
                swal("Đã xóa thành công.!", {});
            }
        });
    });
});
oTable = $("#sampleTable").dataTable();
$("#all").click(function(e) {
    $("#sampleTable tbody :checkbox").prop(
        "checked",
        $(this).is(":checked")
    );
    e.stopImmediatePropagation();
});
    </script>
    <script>
let btnMenuAd = document.querySelector("#btn");
let sidebarAd = document.querySelector(".sidebar-admin");
let containerAd = document.querySelector(".tab-table-products");
btnMenuAd.onclick = function() {
    sidebarAd.classList.toggle("active");
    btnMenuAd.classList.toggle("fa-bars-filter");
    btnMenuAd.classList.toggle("fa-bars-sort");
    containerAd.classList.toggle("active");
};
let iconsLink = document.querySelectorAll(".icons-link");
iconsLink.forEach((link) => {
    link.addEventListener("click", () => {
        removeActiveClasses();
        link.classList.add("active");
    });
});

function removeActiveClasses() {
    iconsLink.forEach((link) => {
        link.classList.remove("active");
    });
}
    </script>