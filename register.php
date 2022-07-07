<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            height: 850px;
            width: 360px;
            margin: 0 auto;
        }
        .bg {
            height: 800px;
            margin:0 auto;
            background-color: #354763;
        }
        .form-group {
            margin: 10px 0;
        }
        form {
            padding: 10px 30px;
            background-color: white;
        }
        h1 {
            text-align:center;
            color:white;
            margin:20px;
        }
        .btn {
            margin: 5px 0 10px 0;
        }
        .container{
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid border justify-content-center align-items-center container">
        <?php
            include "header.php";
        ?>
        <div class="row bg justify-content-center align-items-top">
            <div class="col-10">
                <h1>Singup</h1>
                <form style="border-radius: 13px;" action="./includes/signup.inc.php" method="POST" id="cid_form">
                    <div class="mb-3 form-group" controlId="registerAccountName">
                        <label for="exampleInputEmail1" class="form-label">姓名</label>
                        <input type="text" class="form-control" name="username"  placeholder="請填寫真實姓名" onchange="value=value.replace(/[^\一-\龥]/g,'')">
                    </div>
                    <div class="mb-3 form-group" controlId="registerPassword">
                        <label for="exampleInputPassword1" class="form-label">密碼</label> <label id="errPW" style="color:red"></label>
                        <input type="password" class="form-control" name="pw" placeholder="" oninput="chePassword(this.value)">
                    </div>
                    <div class="mb-3 form-group" controlId="registerCheckPassword">
                        <label for="exampleInputPassword1" class="form-label">確認密碼</label> <label id="errPW2" style="color:red"></label>
                        <input type="password" class="form-control" name="pw_repeat" oninput="chePassword2(this.value)">
                    </div>
                    <div class="mb-3 form-group" controlId="registerAccountID">
                        <label for="exampleInputEmail1" class="form-label" >身分證字號</label><label id="errID" style="color:red;font-size:12px"></label>
                        <input class="form-control" id="cid" type="text" maxlength="10" name="cid" onchange="return ChkBtn_onclick()">
                            <!-- <input id="ChkBtn" type="button" value="檢查身分證" name="ChkBtn" onclick="return ChkBtn_onclick()"> -->
                    </div>
                    <div class="mb-3 form-group" controlId="registerPhoneNumber">
                        <label for="exampleInputPassword1" class="form-label">開戶金額</label>
                        <input type="text" class="form-control" name="account_money" placeholder="" maxlength="6" oninput="value=value.replace(/[^\d]/g,'')">
                    </div>
                    <div class="mb-3 form-group" controlId="registerEmail">
                        <label for="exampleInputPassword1" class="form-label">信箱</label>
                        <input type="email" class="form-control" name="email" oninput=''  pattern='^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|NET|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT)$'>
                    </div>
                    <div class="mb-3 form-group" controlId="registerPhoneNumber">
                        <label for="exampleInputPassword1" class="form-label">電話號碼</label>
                        <input type="text" class="form-control" name="phone" placeholder="" maxlength="10" oninput="value=value.replace(/[^\d]/g,'')">
                    </div>
                    <button type="submit" name="submit_register" class="btn btn-outline-secondary">註冊</button> 
                </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?> 
    </div>
</body>

<script>
    var check = false;
    var password = "";
    var checkPassword = "";
    function chePassword(e) {
        if (e.length <= 6) $("#errPW").text("請設定長度大於6的密碼");
        else $("#errPW").text("");
        password = e;
        if (check) {
            if (checkPassword != password) $("#errPW2").text("請數入相同的密碼");
            else {
                $("#errPW2").text("");
                check = !check;
            }
        }
    }

    function chePassword2(e) {
        checkPassword = e;
        if (checkPassword != password) $("#errPW2").text("請數入相同的密碼");
        else {
            $("#errPW2").text("");
            check = true;
        }
    }
    function checkspace(checkstr) {
        var str = '';
        for(i = 0; i < checkstr.length; i++) {
            str = str + ' ';
        }
        return (str == checkstr);
    }
    function ChkBtn_onclick() {
        if(checkspace(document.getElementById("cid").value)) {
            $("#errID").text("對不起，請填寫您的身份證號碼！");
            return false;
        }
        Idx=new Array(10);
        var cid="";
        cid=document.getElementById("cid").value;
        if(cid.length != 10)
        {
            $("#errID").text("對不起，您的身份證號長度錯誤！");
            //    alert("對不起，您的身份證號長度錯誤！");
            return false;
        }
        switch(cid.charAt(0).toUpperCase()){
            case "A":
                Idx[0]=1;Idx[1]=0;break;
            case "B":
                Idx[0]=1;Idx[1]=1;break;
            case "C":
                Idx[0]=1;Idx[1]=2;break;
            case "D":
                Idx[0]=1;Idx[1]=3;break;
            case "E":
                Idx[0]=1;Idx[1]=4;break;
            case "F":
                Idx[0]=1;Idx[1]=5;break;
            case "G":
                Idx[0]=1;Idx[1]=6;break;
            case "H":
                Idx[0]=1;Idx[1]=7;break;
            case "I":
                $("#errID").text("對不起，您的身份證號碼第一碼錯誤！");
                return false;
            case "J":
                Idx[0]=1;Idx[1]=8;break;
            case "K":
                Idx[0]=1;Idx[1]=9;break;
            case "L":
                Idx[0]=2;Idx[1]=0;break;
            case "M":
                Idx[0]=2;Idx[1]=1;break;
            case "N":
                Idx[0]=2;Idx[1]=2;break;
            case "O":
                $("#errID").text("對不起，您的身份證號碼第一碼錯誤！");
                return false;
            case "P":
                Idx[0]=2;Idx[1]=3;break;
            case "Q":
                Idx[0]=2;Idx[1]=4;break;
            case "R":
                Idx[0]=2;Idx[1]=5;break;
            case "S":
                Idx[0]=2;Idx[1]=6;break;
            case "T":
                Idx[0]=2;Idx[1]=7;break;
            case "U":
                Idx[0]=2;Idx[1]=8;break;
            case "V":
                Idx[0]=2;Idx[1]=9;break;
            case "W":
                Idx[0]=3;Idx[1]=0;break;
            case "X":
                Idx[0]=3;Idx[1]=1;break;
            case "Y":
                Idx[0]=3;Idx[1]=2;break;
            case "Z":
                Idx[0]=3;Idx[1]=3;break;
            default:
                $("#errID").text("對不起，您的身份證號碼第一碼必須為英文字母！");
                return false;
        }
        if(cid.charAt(1) != "1" && cid.charAt(1) != "2") {
            $("#errID").text("對不起，您的身份證號碼第二碼錯誤！");    
            return false;
        }
        for(Idxnum=2;Idxnum<10;Idxnum++){
            if(cid.charAt(Idxnum) < "0" || cid.charAt(Idxnum) > "9")
            {
                $("#errID").text("對不起，您的身份證號碼第"+(Idxnum+1).toString()+"碼不是數字！");    
                return false;
            }
            Idx[Idxnum]=cid.charAt(Idxnum-1);
        }
        Idsum=Idx[0]+Idx[1]*9;
        for(Idxnum=2;Idxnum<10;Idxnum++) 
            Idsum+=parseInt(Idx[Idxnum])*(10-Idxnum);
        Idsum%=10; //取餘數
        Idlast=10-Idsum;
        if(Idlast.toString() != cid.charAt(9)){
            $("#errID").text("對不起，您的身份證號碼不正確！");    
            return false;
        }else{
            $("#errID").text("");   
            return true;
        }   
    }
</script>