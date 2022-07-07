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
        body {
            height: 740px;
            width: 360px;
            margin: 0 auto;
            
        }
        .carousel {
            margin: 0;
        }
        .row {
            margin: 0;
        }
        .col {
            margin: 0;
            padding: 0;
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
        <div class="row">
            <div class="col justify-content-center align-items-center">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/iBankImage1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/iBankImage2.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <?php
            include "rate.php";
            include "footer.php";
        ?>
    </div>
    <?php
        // $sqlQuery = "SELECT * FROM users WHERE email=?";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        //     header("Location: ../register.php?error=sqlQueryError");
        //     exit();
        // }else{
        //     mysqli_stmt_bind_param($stmt, "s", $email);
        //     mysqli_stmt_execute($stmt); //執行查詢SQL
        //     $result = mysqli_stmt_get_result($stmt);
        //     if ($row = mysqli_fetch_assoc($result)) {
        //         $acount_id=$row['id'];
        //         $acount = rand(1000,9999);
        //         if(((int)$acount_id)<100){
        //            $acount_id='00'.$acount_id;
        //         }
        //         echo ((int)$acount.$acount_id);
        //     }
        // }
    ?>
</body>
</html>

