<style>
.wrapperChart {
    height: 70vh;
    width: 100%;
    /* From https://css.glass */
    border-radius: inherit;
    padding: 10px;
    background-color: white;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<div class="titleChart" style="width: 100%; text-align: center; padding-bottom: 1rem;">
    <h1>Thống kê sản phẩm theo danh mục</h1>
</div>
<div class="wrapperChart">
    <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
</div>

<?php 
    //* Get count table name_cate(database) follow name category
    function getCount(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT prd_id_cate, cate_id, cate_name, COUNT(prd_id_cate) as 'countNameCate' FROM product INNER JOIN category ON product.prd_id_cate = category.cate_id GROUP BY prd_id_cate;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $pro = $stmt -> fetchAll();
        return $pro;
    }
    $pro = getCount();
    //* fetch data product
    foreach($pro as $value){
        $value['prd_id_cate'] = $value['cate_id'] ? $cate[] = $value['cate_name'] : "";
        // $cate[] = $value['prd_id_cate'];
        $data[] = $value['countNameCate'];
    }
?>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(str_replace('-', ' ', $cate)) ?>,
        datasets: [{
            label: 'Sản phẩm',
            data: <?php echo json_encode($data) ?>,
            backgroundColor: [
                'pink',
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 16
                    },
                }
            }
        }
    }
});
</script>