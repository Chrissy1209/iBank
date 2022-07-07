<?php

session_start();
require 'Captcha.php';

$captcha = new Captcha();
$_SESSION['code'] = $captcha->getCode();
$captcha->render();