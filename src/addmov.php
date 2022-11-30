<?php
    require_once "config.php";  
    $mov_name = mysqli_real_escape_string($link, $_POST['Movie_name']);  
    $mov_cost = mysqli_real_escape_string($link, $_POST['Movie_cost']); 
    $mov_date = mysqli_real_escape_string($link, $_POST['Movie_date']);
    $mov_detail = mysqli_real_escape_string($link, $_POST['Movie_detail']);  
    $mov_poster = mysqli_real_escape_string($link, $_POST['Movie_poster']);

    $sql = "INSERT INTO Movies(Mov_name, Mov_cost, Mov_date, Mov_detail, Mov_poster) VALUES (?, ?, ?, ?, ?)";
  
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sisss", $param_mvname, $param_mvcost, $param_mvdate, $param_mvdetail, $param_mvposter);
            
        $param_mvname = $mov_name;
        $param_mvcost = $mov_cost;
        $param_mvdate = $mov_date;
        $param_mvdetail = $mov_detail;
        $param_mvposter = $mov_poster;
            
        if(mysqli_stmt_execute($stmt)){
            $sql2 = "SELECT * FROM movies"; 
            if($result = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        header('Location: addactor.php?id='. $row['Mov_id']);
                    }
                    mysqli_free_result($result);
                } 
            } 
            else{
                echo "Something went wrong. Please try again.";
            }
            mysqli_close($link); 
        } 
        else{
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
?>