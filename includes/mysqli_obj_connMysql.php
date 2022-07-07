<?php
    $db_host = 'localhost';
    $db_username = "root";
    $db_password = "";
    $db_Name = "ibank_php";
    $db_link = @new mysqli($db_host,$db_username,$db_password,$db_Name);
    if($db_link -> connect_error != ""){
        echo "資料庫連接失敗";
    }else{
        $db_link -> query("SET NAMES 'utf8'");
    }
?>