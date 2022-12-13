<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</div>
<div class="list-produt">

    <div class="clear">
        <h1>Thống kê sản phẩm theo category</h1>
    </div>
    <div class="product">
        <div id="myChart" style="width:100%; max-width:600px; height:500px;">
        </div>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Loại hàng', 'số lượng sản phẩm'],
                    <?php
                    $tongdm = count($list_thongke);
                    $i = 1;
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        if ($i == $tongdm)
                            $dauphay = "";
                        else $dauphay = ",";
                        echo "['" . $thongke['ten_hang'] . "', " . $thongke['sl_sanpham'] . "]" . $dauphay;
                        $i += 1;
                    }
                    ?>



                ]);

                var options = {
                    title: 'World Wide Wine Production'
                };

                var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>
</nav>
</div>