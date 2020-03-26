<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Payment Table </title>
	</head>	
	<body>
		<h4>Select payment_id, patno,paidby,dateofpayment,amount from payment </h4>
		<table border="1">		
			<tr>
				<td><h2>Payment Id</h2></td>
				<td><h2>Patient No</h2></td>
				<td><h2>Paid By</h2></td>
				<td><h2>Date Of Payment</h2></td>
				<td><h2>Amount</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "";
				$database = "project";				
				
				$query = "Select payment_id, patno,paidby,dateofpayment,amount from payment";
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
					echo "<td><h2>" .$row['payment_id'] . "</h2></td>";
					echo "<td><h2>" .$row['patno'] . "</h2></td>";
					echo "<td><h2>" .$row['paidby'] . "</h2></td>";
					echo "<td><h2>" .$row['dateofpayment'] . "</h2></td>";
					echo "<td><h2>" .$row['amount'] . "</h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>