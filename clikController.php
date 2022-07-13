<?php
require_once __DIR__ . "/database/pdo.php";

$dbh = DB::getConnection();
//var_dump($_POST);
$countСlick = 0;
$countClik = $_POST['countClik'];
$countClik++;
$idClik = $_POST['idClik'];


$query = "UPDATE `link` SET countСlick = ? WHERE id_link = ?";
$params = [$countClik, $idClik];
$stmt = $dbh->prepare($query);
$stmt->execute($params);

$data = $dbh
    ->query("SELECT * FROM `link` WHERE id_link = $idClik")
    ->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data[0]['linkURL']);
echo json_encode(["errors" => $data[0]['linkURL']]);