<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="list_cmt">
    <table border="1" style="width: 50%; text-align: center;">
            <thead>
                <th>ID</th>
                <th>Người CMT</th>
                <th>Nội Dung</th>
                <th>Ngày CMT</th>
            </thead>
            <?php
            foreach ($listdm as $cmt) {
                extract($cmt);
                echo ' <tbody>
                <td>' . $id_cm . '</td>
                <td>' . $id_pd . '</td>
                <td>' . $content_cm . '</td>
                <td>' . $date_cm . '</td>
                <td><a href=""><input type="button" value="Sua"></a> <a href=""><input type="button" value="Xoa"></a></td>
                </tbody>';
            }
            ?>
    </table>
    </div>
</body>
</html>