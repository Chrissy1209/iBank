<?php
    echo "進入";
    session_start();
    // echo $_SESSION['id'];
    require './mysqli_obj_connMysql.php';

    $sql_query="UPDATE users SET acount=? WHERE id={$_SESSION['id']}";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("i",$_SESSION['acount']);
    $stmt->execute();
    // echo "帳號成功";

    session_unset();
    session_destroy();
    header("location: ../login.php");
?>