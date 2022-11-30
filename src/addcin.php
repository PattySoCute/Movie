<?php
    require_once "config.php"; 
    $Cin_name = mysqli_real_escape_string($link, $_POST['Cinema_name']);
    $Cin_show = mysqli_real_escape_string($link, $_POST['Cinema_showtime']);
    $Cin_location = mysqli_real_escape_string($link, $_POST['Cinema_location']);

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
        
    $sql = "INSERT INTO cinema(Mov_id, Cin_name, Cin_showtime, Cin_location) VALUES (?, ? ,?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "isss", $param_id, $param_cinname, $param_cinshow, $param_location);
            
        $param_id = $id;
        $param_cinname = $Cin_name;
        $param_cinshow = $Cin_show;
        $param_location = $Cin_location;

        if(mysqli_stmt_execute($stmt)){
            header("location: indexAd3.php");
            exit();
        } 
        else{
            echo "Something went wrong. Please try again later.";
        }
    }
?>