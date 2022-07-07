<?php

session_start();
require_once 'vendor\php-quickorm\captcha\Captcha.php';

$captcha = new Captcha();
$_SESSION['code'] = $captcha->getCode();
$captcha->render();