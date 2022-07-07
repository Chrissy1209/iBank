<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    <title>Document</title>
</head>
<style>
    body {
        height: 740px;
        width: 360px;
        margin: 0 auto;
    }
    .title {
        padding-top: 30px;
        text-align: center;
    }
    p {
        padding-bottom: 10px;
        padding-top: 10px;
    }
    .row {
        margin: 0;
    }
    .card {
        margin: 20px;
    }
    .container{
            padding: 0;
        }
</style>
<?php
    $Member=array(
        "name"=>array("許靜玟", "黃郁淇", "陳子晴", "羅尹晴"),
        "content"=>array(
            "負責內容：
            主頁和關於我們頁面製作、會員資料和轉帳紀錄抓取更新、匯率API、驗證碼",
            "負責內容：
            網頁切板、轉帳系統、匯率API、驗證碼、註冊填寫限制、歷史紀錄抓取",
            "負責內容：
            網頁美術設計、登入和轉帳頁面製作、動態切換登入登出、圖片製作",
            "負責內容：
            註冊頁面製作、會員資料頁面製作、註冊更新、登入驗證"),
        "gitHub"=>array( 
            "https://github.com/Chrissy1209",
            "https://github.com/Huang-joyce",
            "https://github.com/Phoebe722",
            "https://github.com/irislo1119"),
        "email"=>array(            
            "chrissyhsu.i@gmail.com",
            "joyce890926@gmail.com",
            "phoebe41829@gmail.com",
            "senya77524@gmail.com"),
    );
?>
<body>
    <div class="container-fluid border justify-content-center align-items-center container">
        <?php
            include "header.php"; 
        ?>
        <div class="row border justify-content-center align-items-center w-100">
            <div class="col-12">
                <h5 class="title align-items-center">設計動機</h5>
            </div>
            <div class="col-10">
                <p>成年後，有不少人開始會學習投資、管理自己的銀行帳號等。因此我們想要從生活出發，做一個簡易的銀行系統。</p>
            </div>
        </div>
        <div class="row border justify-content-center align-items-center w-100">
            <div class="col-12">
                <h5 class="title align-items-center">關於我們</h5>
            </div>
            <?php
                for($i = 0;$i<count($Member);$i++){
            ?>
            <div class="col-12 cardpadding justify-content-center align-items-center">
                <div class="card border-light">
                    <div class="card-body">
                        <div class="card-title">
                            <?php
                                echo $Member["name"][$i] 
                            ?>
                        </div>
                        <div class="card-text text">
                            系級：元智大學資訊傳播學系
                        </div>
                        <div class="card-text">
                            <?php
                                echo $Member["content"][$i] 
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small className="text-muted">
                            <span>GitHub: </span>
                            <br>
                                <a href="" style="">
                                    <?php
                                        echo $Member["gitHub"][$i] 
                                    ?>
                                </a>
                        </small>
                        <br>
                        <small>
                            <span>Email: </span>
                            <br>
                                <a href="" >
                                    <?php
                                        echo $Member["email"][$i] 
                                    ?>
                                </a>
                        </small>
                    </div>
                </div>
            </div>
            <?php
                }
            ?> 
        </div>
        <?php
            include "footer.php"; 
        ?>
    </div>
</body>
</html>
