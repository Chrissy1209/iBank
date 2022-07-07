<?php
require 'includes/mysqli_obj_connMysql.php';

if (isset($_POST['action']) && ($_POST['action'] == 'update')) {
    $sql_query="UPDATE users SET username=?,phone=?,pw=? WHERE id={$_POST['id']}";
    $hasdedPW = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("sss",$_POST['username'],$_POST['phone'],$hasdedPW);
    $stmt->execute();
    session_start();
    $_SESSION['_id'] =$_POST['id'];
    $_SESSION['_username']=$_POST['username'];
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<style>
    .btnchange{
        border:1px solid rgb(184,184,184);
        border-radius :20px;
        text-align:center;
        margin:10px 0;
        padding:0.375rem 0.75rem;
        margin:20px 14px;
    }
    .bg{
        height:590px;
        background:url('image/Background.png');
        background-size:360px 590px;
        background-repeat:no-repeat;
        background-position: center;
        padding: 50px 0;
    }
    .nav-tabs{
        border:none;
    }
    .now{
         background-color:#496695d4;;
         border:#496695d4;
    }
    a:hover{
        color:black;
    }
    .card-header{
        border: none;
        background-color: #ffffff00;
        font-size: 30px;
        margin: 20px 0 -30px 0;
    }
    .card-body{
        margin: 0 0 20px 0;
    }
    .card {
        border: none;
        background-color: #fff0;
    }
    ul>li>a{
        text-decoration:none;
        color:black;
        border:#2e466e;
    }
    #btn1,#btn2,#btn3{
        color: black;
        text-decoration:none;
    }
    .transactionbtn{
        margin: 0 0 10px 150px;
        text-decoration: none;
        color: #505050;
        border: 1px solid #b1b1b1;
        margin: 10px;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .container{
            padding: 0;
        }
    table {
        border-collapse: collapse;
        margin:0 auto;
        font-size:13px;
    }
    td{
        padding:5px 0px;
    }
</style>
<body style="height: 740px;width: 360px; margin:0 auto">
    <div class="container-fluid border justify-content-center align-items-center container">
        <?php
            include "header.php"; 
            if(!isset($_SESSION["_id"])){
                header("Location: login.php");
            }
        ?>
        <div class="row bg justify-content-center align-items-top " >
            <div class="col content justify-content-center align-items-top">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active btnchange btn1 now" ><a href="#Account" id="btn1">我的帳戶</a></li>
                    <li class="btnchange btn2" ><a href="#Member" id="btn2">會員資料</a></li>
                    <li  class="btnchange btn3" ><a href="#History" id="btn3">歷史紀錄</a></li>
                </ul>
                    <?php
                         require 'includes/mysqli_obj_connMysql.php';
                         $sql_select = "SELECT amount FROM users WHERE id=?";
                         $stmt = $db_link->prepare($sql_select);
                         $stmt -> bind_param("i",$_SESSION['_id']);
                         $stmt -> execute();
                         $stmt ->bind_result($amount);
                         $stmt ->fetch();
                                echo "
                                <div class='tab-content'>
                                <div class='tab-pane active' id='Account'>
                                    <div class='col-12'  style=''>
                                        <div class='card text-end' >
                                            <div class='card-header text-center'>
                                                {$amount}
                                            </div>
                                            <div class='card-body'>
                                                <p class='card-text text-start' style='border-bottom: 1px solid darkgray'>
                                                帳戶餘額
                                                </p>
                                                <a href='transaction.php' class='transactionbtn' >轉帳</a>
                                            </div>
                                        </div>
                                    </div>";
                        
                        require 'includes/mysqli_obj_connMysql.php';
                        $sql_select = "SELECT userId, COUNT(*) FROM transactions GROUP BY userId";
                        $result = $db_link->query($sql_select);
                        $Have=false;
                        while ($row_result = $result->fetch_assoc()) {
                                if($row_result['userId']== $_SESSION['_id']){
                                    $Have=true;
                                    echo "<div class='card text-end' >
                                            <div class='card-header text-center'>
                                                {$row_result['COUNT(*)']}次
                                            </div>
                                            <div class='card-body'>
                                                <p class='card-text text-start' style='border-bottom: 1px solid darkgray'>
                                                    轉出次數
                                                </p>
                                            </div>
                                        </div>
                                    </div>";
                                }
                        }
                        if($Have==false){
                            echo "<div class='card text-end' >
                                    <div class='card-header text-center'>
                                        0次
                                    </div>
                                    <div class='card-body'>
                                        <p class='card-text text-start' style='border-bottom: 1px solid darkgray'>
                                            轉出次數
                                        </p>
                                    </div>
                                </div>
                            </div>";
                        }
                    ?>
                    <?php
                        require 'includes/mysqli_obj_connMysql.php';
                        $sql_select = "SELECT * FROM users WHERE id=?";
                        $stmt = $db_link->prepare($sql_select);
                        $stmt -> bind_param("i",$_SESSION['_id']);
                        $stmt -> execute();
                        $stmt ->bind_result($id,$username,$email,$pw,$phone,$amount,$acount,$ID_number);
                        $stmt ->fetch();
                                echo "
                                <div class='tab-pane' id='Member'>
                                    <div class='col-10 justify-content-center align-items-center' style='padding:15px;margin:0 auto'>
                                        <form method='POST' action=''>
                                            <p>{$username}</p>
                                            <div class='mb-4 form-group' controlId='formBasicName'>
                                                <label >姓名 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                <input type='text' name='username' placeholder='username' value={$username}>
                                            </div>
                                            <div class='mb-4 form-group' controlId='1'>
                                                <label >密碼 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                <input type='password' name='pw' placeholder='Password' value={$pw}>
                                            </div>
                                            <div class='mb-4 form-group' controlId='3'>
                                                <label>電話號碼</label>
                                                <input type='number' name='phone'  placeholder='Phone Number' value={$phone}>
                                            </div>  
                                            <div class='mb-4 form-group' controlId='formBasicID' >
                                                <label >身分證&nbsp&nbsp&nbsp</label>
                                                <input type='text'  name='cid' placeholder='Email' value={$ID_number} disabled>
                                            </div>
                                            <div class='mb-4 form-group' controlId='formBasicEmail' >
                                                <label >銀行帳號</label>
                                                <input type='number'  name='cid' placeholder='Email' value={$acount} disabled>
                                            </div>
                                            <div class='mb-4 form-group' controlId='formBasicEmail' >
                                                <label >信箱 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                <input type='email'  name='email' placeholder='Email' value={$email} disabled>
                                            </div>
                                            <input type='hidden' name='money' value= {$amount}>
                                            <input type='hidden' name='id' value= {$id}>
                                            <input type='hidden' name='action' value='update'>
                                            <input type='submit' name='btnSMT' value='更新'>
                                        </form>
                                    </div>
                                </div>";
                
                    ?>
                    <div class='tab-pane' id='History'>
                        <div class='col-12' style='height:380px; <?php echo "overflow: auto;"?>'>
                            <table style="width:90%">
                                <tr style="border-bottom:1px solid #adadad;">
                                    <th>日期</th>
                                    <th colspan="2" >內容</th>
                                </tr>
                                    <?php
                                        $myaccount = $acount;
                                        // echo "a".$myaccount;
                                        require 'includes/mysqli_obj_connMysql.php';
                                        $sql = "SELECT * FROM transactions ORDER BY transaction_date DESC ";
                                        $result = $db_link->query($sql);
                                        while ($row_result = $result->fetch_assoc()) {
                                            if($row_result['userId']== $_SESSION['_id'] ){
                                                echo "       
                                                    <tr>
                                                        <td rowspan='2'>{$row_result['transaction_date']}</td>
                                                        <td >{$row_result['payee']}</td>
                                                        <td rowspan='2'>-{$row_result['amount']}</td>
                                                    </tr>
                                                    <tr style='border-bottom:0.5px solid #adadad;'>
                                                        <td>備注:{$row_result['transaction_text']}</td>
                                                    </tr>
                                                ";
                                            }
                                            else if($row_result['payee']==$myaccount){
                                                echo "       
                                                    <tr>
                                                        <td rowspan='2'>{$row_result['transaction_date']}</td>
                                                        <td >{$row_result['payer']}</td>
                                                        <td rowspan='2'>+{$row_result['amount']}</td>
                                                    </tr>
                                                    <tr style='border-bottom:0.5px solid #adadad;'>
                                                        <td>備注:{$row_result['transaction_text']}</td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>
</body>
</html>
<script>
    $(function () {
        $('#myTab ').tab('show');
    })
     $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('show');
         $(this).tab('show');
    })
    $('#btn1').click(function(){
        $('.btn1').addClass('now');
        $('.btn2').removeClass('now');
        $('.btn3').removeClass('now')
    })
    $('#btn2').click(function(){
        $('.btn2').addClass('now');
        $('.btn1').removeClass('now');
        $('.btn3').removeClass('now')
    })
    $('#btn3').click(function(){
        $('.btn3').addClass('now');
        $('.btn2').removeClass('now');
        $('.btn1').removeClass('now')
    })
</script>
<script>
    function changeColor(page){
    console.log(page);
    var account = document.getElementById("Account");
    var member = document.getElementById("Member");
    var history = document.getElementById("History");

    if(page == 'Account'){
        account.classList.add("click");
        // account.className = ;
        account.style.backgroundColor="grey";
        member.style.backgroundColor="white";
        history.style.backgroundColor="white";

    }
    else if(page == 'Member'){
        account.style.backgroundColor="white";
        member.style.backgroundColor="grey";
        history.style.backgroundColor="white";
    }
    else if(page == 'History'){
        account.style.backgroundColor="white";
        member.style.backgroundColor="white";
        history.style.backgroundColor="grey";
    }
}
</script>