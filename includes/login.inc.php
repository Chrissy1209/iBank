<?php
    if (isset($_POST['submit_login'])) {
        require_once 'DBConn.inc.php';
        $namemail = $_POST['namemail'];
        $pw = $_POST['pw'];
        if (empty($namemail) || empty($pw)) {
            header("Location: ../index.php?error=empty");
            exit();
        } else {
            //處理資料庫帳號查詢密碼比對
            $sqlQuery = "SELECT * FROM users WHERE email=? ";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                header("Location: ../index.php?error=sqlQueryerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $namemail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $checkPW = password_verify($pw, $row['pw']);
                    if ($checkPW == false) {
                        header("Location: ../index.php?info=passwordIncorrect");
                        exit();
                    } else {
                        session_start();
                        $_SESSION['_id'] = $row['id'];
                        $_SESSION['_username'] = $row['username'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?info=usernameIncorrect");
                    exit();
                }
            }
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
?>