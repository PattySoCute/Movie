<?php
   require_once "config.php";
   $username = mysqli_real_escape_string($link, $_POST['username']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
   $password_2 = mysqli_real_escape_string($link, $_POST['password_2']);

   if(empty($username) || empty($email) || empty($password_1) || empty($password_2)){
    echo "<script>";
    echo "alert(\"Your username, email, password or confirm password is empty!\");";
    echo "window.history.back()";
    echo "</script>";
    mysqli_close($link);
    exit();
   }

   if ($password_1 != $password_2) {
    echo "<script>";
    echo "alert(\"Your password and confirm password not match\");";
    echo "window.history.back()";
    echo "</script>";
    mysqli_close($link);
    exit();
  }

   if($password_1 == $password_2){
    $sql = "INSERT INTO user(username, email, password, usertype) values (?, ?, ?, 'member')";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
        
        $param_username = $username;
        $param_email = $email;
        $param_password = $password_1;
        
    }
    if(mysqli_stmt_execute($stmt)){
        header("location: login.php");
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
   }
   mysqli_close($link);
?>