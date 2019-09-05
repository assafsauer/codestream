<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<body>
		<?php

		$hostname = "sql.osauer.local";
		$username = "root";
		$password = "password";
		$db = "mydb1";

		$dbconnect=mysqli_connect($hostname,$username,$password,$db);

		if ($dbconnect->connect_error) {
		  die("Database connection failed: " . $dbconnect->connect_error);
		  }

		  ?>

		  <table border="1" align="center">
			  <tr>
				    <td>first_name</td>
				      <td>last_name</td>
				        <td>city</td>
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
				        </tr>\n";

		      }

		      ?>
		  </table>
	</body>
</html>
EOL
