<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bill Table </title>
	</head>	
	<body>
		<h4>Select invoice_no, patno,unpaid_treatments,late_cancellations,total from bill </h4>
		<table border="1">		
			<tr>
				<td><h2>Invoice Id</h2></td>
				<td><h2>Patient No</h2></td>
				<td><h2>Unpaid Treatments</h2></td>
				<td><h2>Late Cancellations</h2></td>
				<td><h2>Total Bill</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "project";				
				
				$query = "Select invoice_no, patno,unpaid_treatments,late_cancellations,total from bill";
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
					echo "<td><h2>" .$row['invoice_no'] . "</h2></td>";
					echo "<td><h2>" .$row['patno'] . "</h2></td>";
					echo "<td><h2>" .$row['unpaid_treatments'] . "</h2></td>";
					echo "<td><h2>" .$row['late_cancellations'] . "</h2></td>";
					echo "<td><h2>" .$row['total'] . "</h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>