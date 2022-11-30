<?php
    require_once "config.php"; 
    $act_name = mysqli_real_escape_string($link, $_POST['Actor_name']);
    $act_detail = mysqli_real_escape_string($link, $_POST['Actor_detail']);
    $act_port = mysqli_real_escape_string($link, $_POST['Actor_portrait']);
    $act_rate = mysqli_real_escape_string($link, $_POST['Actor_rating']);

    $sql2 = "SELECT * FROM movies"; 
    if($result = mysqli_query($link, $sql2)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $id = $row['Mov_id'];
            }
            mysqli_free_result($result);
        }
    }
    else{
        echo "Something went wrong. Please try again.";
    }
        
    $sql = "INSERT INTO Actor(Mov_id, Act_name, Act_detail, Act_portrait, Act_rating) VALUES (?, ? ,?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "isssd", $param_id, $param_acname, $param_acdetail, $param_acport, $param_acrate);    
        
        $param_id = $id;
        $param_acname = $act_name;
        $param_acdetail = $act_detail;
        $param_acport = $act_port;
        $param_acrate = $act_rate;

        if(mysqli_stmt_execute($stmt)){
            if($result2 = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){
                        header('Location: addcinema.php?id='. $row2['Mov_id']);
                    }
                    mysqli_free_result($result2);
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
?>