<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
		.wrapper{
			padding: 1%;
			margin: 0 auto;
		}
		.menu{
			text-align: center;
			border-bottom: 1px solid grey;
		}
		.menu ul{
			list-style-type: none;
		}
		.menu ul li{
			display: inline;
			padding: 1%;
		}
		.menu ul li a{
			text-decoration: none;
			font-weight: bold;
			color: #ff4757;
		}
		.menu ul li a:hover{
			color: #ff6b81;
		}

		button{
			float: right;
		}

		table {
  			border-collapse: collapse;
  			width: 100%;
		}

		th, td {
  			text-align: center;
  			padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
  			background-color: #ffeaa7;
  			color: black;
		}
	</style>
</head>
<body>

	<div class = "wrapper">
		<div class = "menu">
			<ul>
				<li><a href = "indexAd.php">Movie</a></li>
				<li><a href = "indexAd2.php">Actor</a></li>
				<li><a href = "indexAd3.php">Cinema</a></li>
			</ul>
		</div>
	</div>

	<p>
		<a href="login.php">
			<button type="button" class="btn btn-default btn-sm">
			<div style="color: #ee5253"><span class="glyphicon glyphicon-log-out"></span> Log out </div> 
        	</button>
		</a>
    </p>
	</br>
	<div>
		<h2>Manage Cinema</h2>
        </br></br>
		<table>
			<tr>
				<th>CINEMA ID</th>
                <th>MOVIE ID</th>
				<th>CINEMA NAME</th>
				<th>SHOWTIME</th>
				<th>LOCATION</th>
			</tr>
			<?php
			require_once "config.php";
            $sql = "SELECT * FROM cinema"; 
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['Cin_id'] . "</td>";
                        echo "<td>" . $row['Mov_id'] . "</td>"; 
                        echo "<td>" . $row['Cin_name'] . "</td>";
                        echo "<td>" . $row['Cin_showtime'] . "</td>";
						echo "<td>" . $row['Cin_location'] . "</td>";
                        echo '<td><a href="updatecin.php?id='. $row['Mov_id'] .'"class="btn btn-info btn-sm" <span>Update</span></a></td>';
                        echo '<td><a href="deletecin.php?id='. $row['Mov_id'] .'"class="btn btn-danger btn-sm" <span>Delete</span></a></td>';
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
    </br></br>
	<ul class="pager">
  		<li class="previous"><a href="indexAd2.php">&laquo; Previous</a></li>
	</ul>
</body>
</html>