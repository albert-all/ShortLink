<?php
require_once __DIR__ . "/database/pdo.php";

$dbh = DB::getConnection();

$data = $dbh
    ->query("SELECT * FROM link")
    ->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ShortLink</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row mt-5">
        <h3>Создать короткую ссылку</h3>
    </div>
    <form action="" method="post" id="formPostUrl">
        <div class="row mt-1">
            <div class="col">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Link URL</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm" id="linkURL">
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Link description</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                           aria-describedby="inputGroup-sizing-sm" id="linkDescription">
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success" id="writeDB">Создать</button>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <h3>Ссылки</h3>
    </div>
    <div id="example-3">
        <?php
        foreach ($data as $k => $v) {
            $id = $v['id_link'];

            ?>
            <?php echo '
        <div class="row mt-1">
            <div class="col">
                <h5>Короткий URL  (<a onclick="clik('.$id.','.$v['countСlick'].')"  href="javascript:void(0);">' . $v['linkDescription'] . '</a>) => ' . $v['countСlick'] . ' </h5>
            </div>
         </div>';
        }
        ?>
    </div>

</body>
</div>
<script src="/js/main.js"></script>
</html>