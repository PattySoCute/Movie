<div class="container py-5">
  <div class="row mt-4">

    <?php
      require_once "config.php";

      $query_mov = "SELECT * FROM Movies";
      $result_mov = mysqli_query($link, $query_mov);
      $check_mov = mysqli_num_rows($result_mov) > 0;

      if($check_mov){
        while($row = mysqli_fetch_assoc($result_mov)){
    ?>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body"></br>
          <img class="card-img-top" src="<?php echo $row['Mov_poster']?>" alt="Card image cap" width="280" height="380">
            <h5 class="card-title" style = "color: #ffcccc;"> <?php echo $row['Mov_name']; ?> </h5>
              <p class="card-text" style = "color: #D6A2E8;"><?php echo $row['Mov_date']?></p>
              <a href="showmov_review.php?id=<?php echo $row['Mov_id']?>" class="btn btn-primary">Review</a>
        </div>
      </div>
    </div>
    <?php
        }
      }else{
        echo "No movie found";
      }
    ?>
  </div>
</div>