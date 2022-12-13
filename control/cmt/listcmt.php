<body>



</body>

</div>
<div class="list-produt">
    <div class="clear">
        <h1>Trang List Comment</h1>
    </div>
    <div class="product">
        <!-- Chỗ để hiển thị list sản phẩm -->
        <div class="list_pd">
            <table border="1" style="width: 100%; text-align: center;">
                <thead>
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>ID Người CMT</th>
                    <th>ID Sản Phẩm</th>
                    <th>Ngày CMT</th>
                    <th>Action</th>
                </thead>
                <?php
                foreach ($listcmt as $cmt) {
                    extract($cmt);
                    $xoacmt = "./index.php?act=xoacmt&id_cm=" . $id_cm;

                    echo ' <tbody>
                <td>' . $id_cm . '</td>
                <td>' . $content_cm . '</td>
                <td>' . $id_us . '</td>
                <td>' . $id_pd . '</td>  
                <td>' . $date_cm . '</td>
                <td><a href="' . $xoacmt . '"><input type="button" value="Xóa"></a></td>
                </tbody>';
                }
                ?>
            </table>
        </div>

    </div>
</div>
</nav>
</div>