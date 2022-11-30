<?php
  require_once "config.php";
  $M_id = $_GET["id"];
  $sql2 = "SELECT * FROM movies WHERE Mov_id = $M_id"; 
    if($result = mysqli_query($link, $sql2)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $Mov_id = $row['Mov_id'];
        }
        mysqli_free_result($result);
      }
    } 
    else{
      echo "Something went wrong. Please try again.";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title> Movies review </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="s.css">
  </head>

  <div class="text-right">
    <a href = "index.php"><button class="btn"><i class="fa fa-home"></i> Home</button></a>
  </div>

  <body>
    <div class="container">
      <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
          <?php
            $sql = "SELECT * FROM Movies WHERE Mov_id = $M_id";
            $result = mysqli_query($link, $sql) or die ("Error in query: $sql ".mysqli_error());
            $row = mysqli_fetch_array($result);
          ?>
          <h3>Movie<h3>
        </div>
        <div class="row m-0">
          <div class="col-lg-4 left-side-product-box pb-3">
            <img src="<?php echo $row['Mov_poster']?>" class="border p-3">
          </div>
          <div class="col-lg-8">
            <div class="right-side-pro-detail border p-3 m-0">
              <div class="row">

                <div class="col-lg-12">
                  <p class="m-0 p-0"><p style="color: #5758BB"><?php echo $row['Mov_name']?></p></p>
                </div></br></br>

                <div class="col-lg-12 pt-S2">
                  <h5>Date: <a style="color: #ff9f43"><?php echo $row['Mov_date']?></a></h5><hr class="m-0 pt-2 mt-2">
                </div></br>

                <div class="col-lg-12">
                  <h5>Cost: <a style="color: #ee5253"><?php echo $row['Mov_cost']?>฿</a></h5>
                  <hr class="p-0 m-0">
                </div></br></br>

                <div class="col-lg-12 pt-S2">
                  <h5>Review</h5>
                  <span><?php echo $row['Mov_detail']?></span><hr class="m-0 pt-2 mt-2">
                </div>
                
                <div class="col-lg-12 mt-2">
                  <div class="row">
                    <div class="col-lg-6">
                    </div>
                  </div>
                </div>
                <a><button class="btn btn-light m-3 pl-2 btn-sm"><div>
                <?php
                  $result_cin = mysqli_query($link, $sql2);
                  $check_cin = mysqli_num_rows($result_cin) > 0;
                  if($check_cin){
                    echo '<a href="cinema.php?id='. $row['Mov_id'] .'"<button>โรงภาพยนตร์ที่เปิดฉาย</button></a>';
                  }else{
                    echo "No cinema found";
                  }
                ?>
                </button></div></a>
              </div>
            </div>
          </div>
          </br></br>
          <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
              <div style="color: #5381a7"><h4>Highest rating actor</h4></div>
            </div>
            <?php $sql = "SELECT * FROM actor WHERE Mov_id = $Mov_id";
              $query = mysqli_query($link,$sql);
                while ($result = mysqli_fetch_assoc($query)) { ?>
          </div>
          <div class="row hedding m-0 pl-0 pt-0 pb-3">
            <div class="col-lg-3 pb-2">
              <div class="left-side-product-box pb-3">
                <img src="<?php echo $result['Act_portrait']?>"class="border p-3">
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="right-side-pro-detail border p-3 m-0">
              <div class="row">

                <div class="col-lg-12">
                  <p class="m-0 p-0"><p style="color: #5758BB"><?php echo $result['Act_name']?></p></p>
                </div></br></br>

                <div class="col-lg-12 pt-S2">
                  <h5>Rating: <a style="color: #ee5253"><?php echo $result['Act_rating']?></a></h5><hr class="m-0 pt-2 mt-2">
                </div></br>

                <div class="col-lg-12 pt-S2">
                  <h5>Detail</h5>
                  <span><?php echo $result['Act_detail']?></span><hr class="m-0 pt-2 mt-2">
                </div>

              </div>
            </div>
          </div><?php } ?>
        </div>
      </div>
    </div>
</body>
</html>