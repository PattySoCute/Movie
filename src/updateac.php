<?php
require_once "config.php";
$act_name = $act_rate = $act_detail = $act_portrait = "";
$act_name_err = $act_rate_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $mov_id = $_POST["id"];
    // echo $mov_id;
    $input_name = $_POST["Actor_name"];

    if(empty($input_name)){
        $act_name_err = "Please enter a name.";
    } else{
        $name = $input_name;
        // echo $name;
        // echo $mov_name_err;
    }
    
    $input_rate = $_POST["Actor_rate"];
    if(empty($input_rate)){
        $act_rate_err = "Please enter the price.";     
    } elseif(!is_numeric($input_rate)){
        $act_rate_err = "Please enter a positive integer value.";
    } else{
        $rate = $input_rate;
        // echo $cost;
        // echo $mov_cost_err;
    }

    $detail = $_POST["Actor_detail"];
    // echo $detail;
    $portrait = $_POST["Actor_portrait"];

    if(empty($act_name_err) && empty($act_rate_err)){
        $sql = "UPDATE actor SET Act_name=?, Act_rating=?, Act_detail=?, Act_portrait=? WHERE Mov_id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sdssi", $param_acname, $param_acrate, $param_acdetail, $param_acport, $param_id);
            $param_acname = $name;
            $param_acrate = $rate;
            $param_acdetail = $detail;
            $param_acport = $portrait;
            $param_id = $mov_id;

            if(mysqli_stmt_execute($stmt)){
                header("location: indexAd2.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
    
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  $_GET["id"];
        
        $sql = "SELECT * FROM actor WHERE Mov_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["Act_name"];
                    $rate = $row["Act_rating"];
                    $detail = $row["Act_detail"];
                    $portrait = $row["Act_portrait"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 </head>
<body>
    <h2>Update Record</h2>
    <p>Please edit the input values and submit to update the record.</p>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        <p><label>Actor name</label></p>
        <input type="text" name="Actor_name" class="form-control <?php echo (!empty($act_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        <span><?php echo $act_name_err;?></span>
        <p><label>Rating</label></p>
        <input type="text" name="Actor_rate" class="form-control <?php echo (!empty($act_rate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rate; ?>">
        <span><?php echo $act_rate_err;?></span>
        <p><label>Actor detail</label></p>
        <input type="text" name="Actor_detail" class="form-control" value="<?php echo $detail; ?>">
        <p><label>Actor portrait</label></p>
        <input type="text" name="Actor_portrait" class="form-control" value="<?php echo $portrait; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="submit" value="Submit">
        <a href="indexAd.php">Cancel</a>
    </form>
</body>
</html>