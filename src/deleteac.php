<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "config.php";
    $sql = "DELETE FROM actor WHERE Mov_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: indexAd2.php");
            exit();
        }else{
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}else{
    if(empty(trim($_GET["id"]))){
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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Delete Page</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
        <p>Are you sure you want to delete this record?</p>
        <p>
        <button type = "submit" class="btn btn-primary">Yes</button>
            <a href="indexAd2.php">No</a>
        </p>
    </form>
</body>
</html>