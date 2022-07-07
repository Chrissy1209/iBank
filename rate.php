<?php
    $content=file_get_contents('https://tw.rter.info/capi.php');
    $currency=json_decode($content,true);
?>

<style>
    h2 {
        text-align:center;
        align-items:center;
        margin:30px 0 0 0;
    }
    .card {
        margin: 20px 5px;
    }
    .row {
        margin: 0;   
    }
    .bg {
        /* height:370px; */
        background:url('image/wave.png');
        background-size:110%;
        background-position: bottom;
        background-repeat: no-repeat;
        justify-content: center;
    }
</style>

<div class="row bg">
    <div class="col-12 justify-content-center align-items-center">
        <h2>即時匯率</h2>
    </div>
    <div class="col-11 justify-content-center align-items-center">
        <div class="card">
            <div class="card-body">
                <img src="image/USD.jpeg" style="width:20%;margin:0 10px">
                <span class="text-bottom">1 USD = <?php echo number_format($currency["USDTWD"]["Exrate"], 3)?> TWD</span>
            </div>
        </div>
        <?php 
            $list = ["JPY", "CNY", "EUR", "HKD", "KRW"];
            for($i=0; $i<sizeof($list); $i++){
                $usdTwd = number_format($currency["USDTWD"]["Exrate"], 3);
                $x = number_format($currency["USD".$list[$i]]["Exrate"], 3);

                $xx = number_format((float)$usdTwd/(float)$x, 3);
                echo '
                    <div class="card">
                        <div class="card-body">
                            <img src="image/'.$list[$i].'.png" style="width:20%;margin:0 10px">
                            <span class="text-bottom">1 '.$list[$i].' = '.$xx.' TWD</span>
                        </div>
                    </div>
                ';
            }
        ?>
        <!-- 
        <div class="card">
            <div class="card-body">
                <img src="image/ERU.jpeg" style="width:20%;margin:0 10px">
                <span class="text-bottom">1 EUR =<?php echo $currency["USDEUR"]["Exrate"];?>TWD</span>
            </div>
        </div> -->
    </div>
</div>