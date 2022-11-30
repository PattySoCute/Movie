<?php
  require_once "config.php";
  $user = "SELECT * FROM user";
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $password = mysqli_real_escape_string($link, $_POST['password']);

  if (empty($username) || empty($password)) {
  	echo "<script>";
    echo "alert(\"Your username or password is empty!\");";
    echo "window.history.back()";
    echo "</script>";
    mysqli_close($link);
    exit();
  }

  if($result = mysqli_query($link, $user)){
    while ($row = mysqli_fetch_array($result)){
      if($row['username'] == ($_POST['username']) && $row['password'] == ($_POST['password'])){
        $us = "SELECT * FROM user where id = '".$row['id']."'";
        $us_result = mysqli_query($link, $us);
        $us_row = mysqli_fetch_array($us_result);

        if($row['usertype'] =='admin'){
          Header("Location: indexAd.php");
        }elseif ($row['usertype'] =='member'){
          Header("Location: index.php");
        }
      }
    }
  }

  if($row['username'] != ($_POST['username']) && $row['password'] != ($_POST['password'])){
    echo "<script>";
    echo "alert(\"Your username or password is incorrect\");";
    echo "window.history.back()";
    echo "</script>";
    mysqli_close($link);
    exit();
  }
?>

