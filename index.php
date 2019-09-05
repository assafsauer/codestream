<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title>our 2twa frontend</title>
<body>

<a href="info.php">info.php</a>

<?php

	$hostname = $_ENV["sql.osauer.local"];
	$username = "root";
	$password = $_ENV["MY_DB_PASSWORD"];
	$db = "mydb1";
		
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

	if ($dbconnect->connect_error) {
	  die("Database connection failed: " . $dbconnect->connect_error);
	  }

	  ?>

<h3> some data from the table_name table</h3>
	  <table border="1" align="left">
		  <tr>
				<td>First</td>
				  <td>Last</td>
					<td>City</td>
		  </tr>

		  <?php

		  $query = mysqli_query($dbconnect, "SELECT * FROM table_name")
			 or die (mysqli_error($dbconnect));

		  while ($row = mysqli_fetch_array($query)) {
			echo
			 "<tr>
			 <td>{$row['first_name']}</td>
				 <td>{$row['last_name']}</td>
				 <td>{$row['city']}</td>
					</tr>\n";    		  }
		?>
	  </table>		  
		 
</br>
<br>


<h3> meta info </h3>
<?php 
echo date('d.m.Y h:i:s a', time());
echo "</br>";
echo "connected to myslq://root:$password@$hostname/$db";
?>


	</body>
<meta http-equiv="refresh" content="3; URL=/">
</html>
