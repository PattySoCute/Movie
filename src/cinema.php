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
<link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Movie name</th>
          <th>Cinema id</th>
          <th>Cinema name</th>
          <th>Showtime</th>
          <th>Location</th>
        </tr>
      </thead>
      <?php
        $sql = "SELECT * FROM cinema JOIN movies USING (Mov_id) WHERE Mov_id = $Mov_id"; 
        if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<th>" . $row['Mov_name'] . "</th>"; 
              echo "<th>" . $row['Cin_id'] . "</th>";
			  			echo "<th>" . $row['Cin_name'] . "</th>";
						  echo "<th>" . $row['Cin_showtime'] . "</th>";
              echo "<th>" . $row['Cin_location'] . "</th>";  
						  echo "</tr>";
            }
           	mysqli_free_result($result);
          }
        } 
        else{
          echo "Something went wrong. Please try again.";
        }
        mysqli_close($link); 
    	?>
    </table>
  </div>
</body>
</html>