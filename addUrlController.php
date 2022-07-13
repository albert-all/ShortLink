<?php
require_once __DIR__ . "/database/pdo.php";

if (empty($_POST['linkURL'])) {
    echo json_encode(["errors" => "err"]);
} else {
    $dbh = DB::getConnection();
    var_dump($_POST);
    $countСlick = 0;
    $linkURL = $_POST['linkURL'];
    $linkDescription = $_POST['linkDescription'];

    $query = "INSERT INTO `link` 
    ( `linkURL`, `linkDescription`, `countСlick`) 
     VALUES (:link_url, :link_description, :count_click)";
    $params = [
        ':link_url' => $linkURL,
        ':link_description' => $linkDescription,
        ':count_click' => $countСlick
    ];
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
}