<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ibank_php";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("資料庫連線失敗: ".mysqli_connect_error());
}

?>