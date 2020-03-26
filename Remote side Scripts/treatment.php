<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Treatment Table </title>
	</head>	
	<body>
		<h4>Select treat_id, patno, treatment_name,fees, followup_Treat, xray,xray_path from treatment </h4>
		<table border="1">		
			<tr>
				<td><h2>Treatment Id</h2></td>
				<td><h2>Patient No</h2></td>
				<td><h2>Treatment Name</h2></td>
				<td><h2>Fees</h2></td>
				<td><h2>Follow up Treatment</h2></td>
				<td><h2>Xray</h2></td>
				<td><h2>Xray_path</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "project";				
				
				$query = "Select treat_id, patno,treatment_name, fees, followup_Treat, xray,xray_path from treatment";
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
					echo "<td><h2>" .$row['treat_id'] . "</h2></td>";
					echo "<td><h2>" .$row['patno'] . "</h2></td>";
					echo "<td><h2>" .$row['treatment_name'] . "</h2></td>";
					echo "<td><h2>" .$row['fees'] . "</h2></td>";
					echo "<td><h2>" .$row['followup_Treat'] . "</h2></td>";
					echo "<td><h2><img src=image_treatment.php?patno=".$row['patno']." width=80 height=80/></h2></td>";
					echo "<td><h2><img src=HTTP://".$host.$row['xray_path'] . " width=60 height=60/></h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>