<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <style>
        body {
            height: 740px;
            width: 360px;
            margin: 0 auto;
        }
        .bg {
            height: 605px;
            background-color: #354763;
            background-size: 100%;
            background-position: center top;
            background-repeat: no-repeat;
            margin: 0 auto;
        }
        .form-group {
            margin: 10px 0;
        }
        h1 {
            color: white;
            text-align: center;
            margin: 40px 0 20px 0;
            font-size: 42px;
        }
        button {
            margin: 10px 10px 10px 0;
            color: white;
            border-color: white;
        }
        form {
            padding: 0 30px;
        }
        .register {
            border:1px solid gray;
            color: gray;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            padding: 0.5rem 0.75rem;
            position: relative;
            top: 3px;
        }
        #logoName {
            width: 100%;
            margin-top: -93px;
            margin-bottom: -90px;
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
            <div class="col-8">
                <img src="image/logoRound.png" style="width:100%">
                <img id="logoName" src="image/logoName.png">
            </div>
            <div class="col-10" style="padding: 0 0 100px 0;">
                <form method="POST" action="./includes/login.inc.php">
                    <div class="mb-3 form-group" controlId="loginAccountName">
                        <label style="color: white" for="exampleInputEmail1" class="form-label">帳號</label>
                        <input type="text" class="form-control" placeholder="Email" name="namemail">
                    </div>
                    <div class="mb-3 form-group" controlId="loginPassword">
                        <label style="color: white" for="exampleInputPassword1" class="form-label">密碼</label>
                        <input type="password" class="form-control" placeholder="password" name="pw">
                    </div>
                    <div class="mb-3 form-group" controlId="loginAccount">
                        <button style="color: white" type="submit" class="btn btn-outline-secondary" name="submit_login">登入</button>
                        <a style="color: white" href="register.php" class="register">線上開戶</a>
                     </div>
                </form>
            </div>
        </div>
        <?php
            include "footer.php"; 
        ?>
    </div>
</body>
</html>