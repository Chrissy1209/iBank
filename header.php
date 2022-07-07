<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .header {
            height: 100px;
            margin:0;
        }
        .btnn {
            color: black;
            text-decoration: none;
        }
        a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <div class="row header justify-content-center align-items-center ">
        <div class="col-4">
            <a href="index.php" ><img src="image/logo.png" style="width:80%"></a>
        </div>
        <div class="col-3" style="text-align: center;">
            <a class="btnn" href="about.php">關於我們</a>
        </div>
        <?php
            if (isset($_SESSION['_id']) && $_SESSION['_id'] != "") {
                // 使用者已登入，顯示使用者名稱
                echo '<div class="col-2" style="padding:0;text-align:center"><a class="btnn" href="account.php">'.$_SESSION["_username"].'</a></div>';
                echo '<div class="col-2">
                    <form action="./includes/logout.inc.php" novalidate>
                        <a class="btnn" href="./includes/logout.inc.php">
                            登出
                        </a>
                    </form>
                </div>';
            } else {
                // 使用者尚未登入 或是 已經登出狀態
                echo '<div class="col-3" style="text-align: center;">
                    <a class="btnn" href="login.php">
                        登入
                    </a>
                </div>';
            }
            
        ?>
    </div>
</body>
</html>