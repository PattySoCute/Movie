<?php
require_once "config.php";
$mov_name = $move_cost = $mov_date = $mov_detail = $mov_poster = "";
$mov_name_err = $mov_cost_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $mov_id = $_POST["id"];
    // echo $mov_id;
    $input_name = $_POST["Movie_name"];

    if(empty($input_name)){
        $mov_name_err = "Please enter a name.";
    } else{
        $name = $input_name;
        // echo $name;
        // echo $mov_name_err;
    }
    
    $input_cost = $_POST["Movie_cost"];
    if(empty($input_cost)){
        $mov_cost_err = "Please enter the price.";     
    } elseif(!is_numeric($input_cost)){
        $mov_cost_err = "Please enter a positive integer value.";
    } else{
        $cost = $input_cost;
        // echo $cost;
        // echo $mov_cost_err;
    }

    $date = $_POST["Movie_date"];
    // echo $date;
    $detail = $_POST["Movie_detail"];
    // echo $detail;
    $poster = $_POST["Movie_poster"];
    echo $poster;

    if(empty($mov_name_err) && empty($mov_cost_err)){
        $sql = "UPDATE movies SET Mov_name=?, Mov_cost=?, Mov_date=?, Mov_detail=?, Mov_poster=? WHERE Mov_id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sisssi", $param_mvname, $param_mvcost, $param_mvdate, $param_mvdetail, $param_mvposter, $param_id);
            $param_mvname = $name;
            $param_mvcost = $cost;
            $param_mvdate = $date;
            $param_mvdetail = $detail;
            $param_mvposter = $poster;
            $param_id = $mov_id;

            if(mysqli_stmt_execute($stmt)){
                header("location: indexAd.php");
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
        
        $sql = "SELECT * FROM movies WHERE Mov_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["Mov_name"];
                    $cost = $row["Mov_cost"];
                    $date = $row["Mov_date"];
                    $detail = $row["Mov_detail"];
                    $poster = $row["Mov_poster"];
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
        <p><label>Movie name</label></p>
        <input type="text" name="Movie_name" class="form-control <?php echo (!empty($mov_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        <span><?php echo $mov_name_err;?></span>
        <p><label>Movie cost</label></p>
        <input type="text" name="Movie_cost" class="form-control <?php echo (!empty($mov_cost_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cost; ?>">
        <span><?php echo $mov_cost_err;?></span>
        <p><label>Movie date</label></p>
        <input type="text" name="Movie_date" class="form-control" value="<?php echo $date; ?>">
        <p><label>Movie detail</label></p>
        <input type="text" name="Movie_detail" class="form-control" value="<?php echo $detail; ?>">
        <p><label>Movie poster</label></p>
        <input type="text" name="Movie_poster" class="form-control" value="<?php echo $poster; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="submit" value="Submit">
        <a href="indexAd.php">Cancel</a>
    </form>
</body>
</html>