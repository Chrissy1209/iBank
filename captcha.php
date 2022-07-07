<?php
require 'vendor\php-quickorm\captcha\Captcha.php';
// 新建範例
$captcha = new Captcha(); 
session_start();
// 把生成好的程式碼放在 session 中
$_SESSION['code'] = $captcha->getCode();
// 作為圖片響應
$captcha->render();