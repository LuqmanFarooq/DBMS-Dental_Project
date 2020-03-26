<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Patient Table </title>
	</head>	
	<body>
		<h4>Select patno, title, patientname, doctor,picture,picture_path from patient </h4>
		<table border="1">		
			<tr>
				<td><h2>Patientno</h2></td>
				<td><h2>Title</h2></td>
				<td><h2>Patientname</h2></td>
				<td><h2>Doctor</h2></td>
				<td><h2>Patient Images</h2></td>
				<td><h2>Patient pic path</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "project";				
				
				$query = "Select patno, title, patientname, doctor,picture,picture_path from patient";
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
					echo "<td><h2>" .$row['patno'] . "</h2></td>";
					echo "<td><h2>" .$row['title'] . "</h2></td>";
					echo "<td><h2>" .$row['patientname'] . "</h2></td>";
					echo "<td><h2>" .$row['doctor'] . "</h2></td>";
					echo "<td><h2><img src=image_patient.php?patno=".$row['patno']." width=80 height=80/></h2></td>";
					echo "<td><h2><img src=HTTP://".$host.$row['picture_path'] . " width=60 height=60/></h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>