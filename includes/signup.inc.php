<?php
    if(isset($_POST['submit_register'])){
        require './DBConn.inc.php';
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        $pwRepeat = $_POST['pw_repeat'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $account= $_POST['account_money'];
        $ID_number = $_POST['cid'];
        if(empty($username) || empty($pw) || empty($pwRepeat) || empty($email) || empty($phone) || empty($account) || empty($ID_number)) {
            header("Location: ../register.php?error=empty&username=" . $username . "&email=" . $email);
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.php?error=invalidemail=" . $email);
            exit();
        } elseif ($pw !== $pwRepeat) {
            header("Location: ../register.php?error=checkpw&username=" . $username . "email=" . $email);
            exit();
        } else {
            //確認使用者帳號是否以被使用過
            $sqlQuery = "SELECT ID_number FROM users WHERE ID_number=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                header("Location: ../register.php?error=sqlQueryError");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $ID_number);
                mysqli_stmt_execute($stmt); //執行查詢SQL
                mysqli_stmt_store_result($stmt); //儲存查詢後的結果
                $result = mysqli_stmt_num_rows($stmt);
                if ($result > 0) {
                    //使用者帳號已註冊過
                    header("Location: ../register.php?error=IDistaken&ID=" . $ID_number);
                    exit();
                } else {
                    $sqlInsert = "INSERT INTO users (username, pw, email, phone, ID_number, amount) VALUES(?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sqlInsert)) {
                        header("Location: ../register.php?error=sqlQueryError");
                        exit();
                    } else {
                        $hasdedPW = password_hash($pw, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssssi", $username, $hasdedPW, $email, $phone, $ID_number, $account);
                        mysqli_stmt_execute($stmt); //執行查詢SQL！！！
                        mysqli_stmt_store_result($stmt); //儲存查詢後的結果

                        $sqlQuery = "SELECT * FROM users WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                            header("Location: ../register.php?error=sqlQueryError");
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt); //執行查詢SQL
                            $result = mysqli_stmt_get_result($stmt);
                            if ($row = mysqli_fetch_assoc($result)) {
                                $acount_id=$row['id'];
                                $acount = rand(1000,9999);
                                if(((int)$acount_id)<10){
                                    $acount_id='000'.$acount_id;
                                }
                                else if(((int)$acount_id)<100){
                                   $acount_id='00'.$acount_id;
                                }
                                $acount=((int)$acount.$acount_id);
                                session_start();
                                $_SESSION['acount']=$acount;
                                $_SESSION['email']=$email;
                                $_SESSION['id']=$acount_id;
                                header("Location: acount.php");
                            }
                        // header("Location: ../login.php");;
                        exit();
                        }
                    }
                }
            //Closing the statement
            mysqli_stmt_close($stmt);
            //Closing the connection
            mysqli_close($conn);
            }
        }
    }else {
        header("Location: ../register.php?non");
        exit();
    }
?>