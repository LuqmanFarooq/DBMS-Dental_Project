<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Appointment Table </title>
	</head>	
	<body>
		<h4>Select apointno, patno,patname,apt_madeby,appointmentdate from appointment </h4>
		<table border="1">		
			<tr>
				<td><h2>Appointment No</h2></td>
				<td><h2>Patient No</h2></td>
				<td><h2>Patient Name</h2></td>
				<td><h2>Appointment Made By</h2></td>
				<td><h2>Appointment Date</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "project";				
				
				$query = "Select apointno, patno,patname,apt_madeby,appointmentdate from appointment";
				//Connect to the database
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				//Set connection to UTF-8
				mysqli_query($connect,"SET NAMES utf8");
				//Select data
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['apointno'] . "</h2></td>";
					echo "<td><h2>" .$row['patno'] . "</h2></td>";
					echo "<td><h2>" .$row['patname'] . "</h2></td>";
					echo "<td><h2>" .$row['apt_madeby'] . "</h2></td>";
					echo "<td><h2>" .$row['appointmentdate'] . "</h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>