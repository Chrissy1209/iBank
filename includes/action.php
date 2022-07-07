<?php
require 'mysqli_obj_connMysql.php';
session_start();
// echo "aaa";
if(!isset($_POST["transaction"]))
{
    header("Location:transaction.php");
}else{
    $payer = $_POST['payer'];
    $payee = $_POST['payee'];
    $pw = $_POST["pw"];
    $code = $_POST["code"];
    $amount =$_POST["amount"];
    $sql_select = "SELECT * FROM users WHERE email=?";
    $stmt = $db_link->prepare($sql_select);
    $stmt -> bind_param("i",$_SESSION['_id']);
    $stmt -> execute();
    $stmt ->bind_result($id,$username,$email,$pw,$phone,$money);
    if($email==""){
        header("Location:../transaction.php?payee=error");
    }
    $stmt ->fetch();
}
// if ($_SESSION['code'] == strtolower($_POST['code'])){
//     echo "true";
// } else {
//     echo "false";
// }
// echo "pw:".$_POST["pw"];密碼
// echo "payer:".$_POST["payer"];轉出
// echo "payee:".$_POST["payee"];轉入
// echo "amount:".$_POST["amount"];錢
// echo "amounttext:".$_POST["amounttext"];備註
// echo "code:".$_POST["code"];驗證碼
?>