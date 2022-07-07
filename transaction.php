<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <title>Document</title>
    <style>
        .bg{
            height:605px;
            background:url('image/Background.png');
            background-size:360px 605px;
            background-repeat:no-repeat;
            background-position: center;
        }
        .form-group{
            margin: 10px 0;
        }
        .formstyle{
            display: flex;
            border: 1px solid #a7a5a5;
            border-radius: 5px;
        }
        .form-label{
            margin: 6px 10px;
        }
        .input{
            width: 70%;
            border:none;
        }
        .container{
            padding: 0;
        }
    </style>
</head>

<body style="height: 740px;width: 360px; margin:0 auto">
    <div class="container-fluid border justify-content-center align-items-center container">
        <?php
            include "header.php";
            if(!isset($_SESSION["_id"])){
                header("Location: login.php");
            }
            require 'includes/mysqli_obj_connMysql.php';
            $sql_select = "SELECT * FROM users WHERE id=?";
            $stmt = $db_link->prepare($sql_select);
            $stmt -> bind_param("i",$_SESSION['_id']);
            $stmt -> execute();
            $stmt ->bind_result($id,$username,$email,$pw,$phone,$amount,$acount,$ID_number);
            $stmt ->fetch();
        ?>
        <div class="row bg justify-content-center align-items-center">
            <div class="col-10">
                <form method="POST" action="transaction.php">
                    <div class="mb-3 form-group formstyle" controlId="transactionEmail">
                        <label for="exampleInputEmail1" class="form-label">轉出帳號</label>
                        <small style="padding: 8px 12px;" class="text-muted"><?php echo $acount; ?></small>
                    </div>
                    <div class="mb-3 form-group" controlId="transactionText" style="text-align:end">
                        <p class="text-muted ">可用餘額 <?php echo $amount ?></p>
                    </div>
                    <div class="mb-3 form-group" controlId="transactionText" style="text-align:end">
                        <p class="text-muted">------------------  轉給  -----------------</p>
                    </div>
                    <div class="mb-3 form-group formstyle" controlId="transactionEmail">
                        <label for="exampleInputEmail1" class="form-label">轉入帳號</label>
                        <input type="text" class="form-control input" placeholder="帳號" name="payee" >
                    </div>
                    <div class="mb-3 form-group formstyle" controlId="transactionAmount">
                        <p class="form-label">轉入金額</p>
                        <input type="text" class="form-control input" name="amount" placeholder="金額">
                    </div>
                    <div class="mb-3 form-group formstyle" controlId="transactionAmount">
                        <p style="margin:6px 42px 6px 10px">註記</p>
                        <input type="text" class="form-control input" placeholder="顯示於交易明細限7字" name="amounttext" maxlength="7">
                    </div>
                    <div class="mb-3 form-group" controlId="transactionText" style="text-align:end">
                        <p class="text-muted">------------------  驗證  -----------------</p>
                    </div>
                    <div class="mb-3 form-group formstyle" controlId="transactionAmount">
                        <p style="margin:6px 42px 6px 10px">密碼</p>
                        <input type="text" class="form-control input" placeholder="密碼" name="pw" >
                    </div>
                    <div class="mb-3 form-group formstyle">
                    <img src="captcha.php" style="width: 50%;margin: 1px;">
                        <input type="text" class="form-control input" name="code" placeholder="輸入驗證碼" maxlength="4">
                    </div>
                    <input type="hidden" class="form-control input text-muted" placeholder="帳號" name="payer" value=" <?php echo $acount; ?>">
                    <button type="submit" class="btn btn-outline-secondary" style="margin: 10px 10px 10px 0" name="transaction" >立即轉帳</button>
                    <!-- <input class="btn btn-primary" type="submit" name="transaction" id="button" value="送出留言"> -->
                    
                </form>
            </div>
        </div>  
        <?php
            include "footer.php";
        ?> 
    </div>
</body>
<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
require 'includes/mysqli_obj_connMysql.php';
if(isset($_POST["transaction"]))
{
    $payee = $_POST['payee'];
    if($amount<$_POST["amount"]){
        alert("餘額不足");
    }else{
        $amount_payer=((int)$amount-(int)$_POST["amount"]);//餘額充足暫時保存付款人的金額
        $checkPW = password_verify($_POST["pw"],$pw);
        if($checkPW == false){
            alert("密碼錯誤");
        }else{
            if ($_SESSION['code'] != strtolower($_POST['code'])){
                alert("驗證碼錯誤");
            } else {
                $sql_select = "SELECT id,acount,amount FROM users WHERE acount=?";
                $stmt = $db_link->prepare($sql_select);
                $stmt -> bind_param("s",$payee);
                $stmt -> execute();
                $stmt ->bind_result($id,$acount,$amount);
                $stmt ->fetch();
                if($id==$_SESSION['_id']){
                    alert("轉出帳號錯誤");
                }else{
                    $amount=((int)$amount+(int)$_POST["amount"]);//帳號存在暫時保存收款人的金額

                    $payee_id=$id;
                    $stmt->close();

                    $sql_query="UPDATE users SET amount=? WHERE id={$payee_id}";//更新收款人的錢
                    $stmt = $db_link->prepare($sql_query);
                    $stmt->bind_param("i", $amount);
                    $stmt->execute();
                    $stmt->close();

                    $sql_query="UPDATE users SET amount=? WHERE id={$_SESSION['_id']}";//更新付款人的錢
                    $stmt = $db_link->prepare($sql_query);
                    $stmt->bind_param("i", $amount_payer);
                    $stmt->execute();
                    $stmt->close();

                    $sql_query="INSERT INTO transactions (userId, payer, payee, amount, transaction_date, transaction_text) VALUES(?, ?, ?, ?,NOW(),?)";//更新歷史紀錄
                    $stmt = $db_link->prepare($sql_query);
                    $stmt->bind_param("issis",$_SESSION['_id'],$_POST['payer'],$_POST['payee'],$_POST['amount'],$_POST['amounttext']);
                    if($stmt->execute()){
                        $stmt->close();
                        $db_link->close();
                        alert("轉帳成功");
                    }else{
                        alert("轉帳失敗");
                    }


                }
            }
        }
    }

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