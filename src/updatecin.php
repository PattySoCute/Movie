<?php
require_once "config.php";
$cin_name = $cin_showtime= "";
$cin_name_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $mov_id = $_POST["id"];
    // echo $mov_id;
    $input_name = $_POST["Cinema_name"];

    if(empty($input_name)){
        $cin_name_err = "Please enter a name.";
    } else{
        $name = $input_name;
        // echo $name;
        // echo $mov_name_err;
    }

    $showtime = $_POST["Cinema_showtime"];
    // echo $detail;
    $location = $_POST["Cinema_location"];
    if(empty($cin_name_err)){
        $sql = "UPDATE cinema SET Cin_name=?, Cin_showtime=?, Cin_location=? WHERE Mov_id=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_cinname, $param_cinshow, $param_cinlocate, $param_id);
            $param_cinname = $name;
            $param_cinshow = $showtime;
            $param_cinlocate = $location;
            $param_id = $mov_id;

            if(mysqli_stmt_execute($stmt)){
                header("location: indexAd3.php");
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
        
        $sql = "SELECT * FROM cinema WHERE Mov_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["Cin_name"];
                    $showtime = $row["Cin_showtime"];
                    $location = $row["Cin_location"];

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
        <p><label>Cinema name</label></p>
        <input type="text" name="Cinema_name" class="form-control <?php echo (!empty($cin_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        <span><?php echo $cin_name_err;?></span>
        <p><label>Showtime</label></p>
        <input type="text" name="Cinema_showtime" class="form-control" value="<?php echo $showtime; ?>">
        <p><label>Location</label></p>
        <input type="text" name="Cinema_location" class="form-control" value="<?php echo $location; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="submit" value="Submit">
        <a href="indexAd.php">Cancel</a>
    </form>
</body>
</html>