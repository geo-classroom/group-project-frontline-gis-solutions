<?php

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "fgs";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die(mysql_error());
	$sql = "SELECT * FROM healthsites";
	$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Healthsite Database</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	table, tr, td{
		text-align: center;
	}
	table, tr, th, td{
		border: 1px solid #ccc;
	}
</style>
</head>    

<body>
<div class="body-container" style="padding: 20px;">
	<h1 style="text-align:center;">MAMELODI VACCINE CALCULATOR</h1>
	
	<form>
		<div class="form-group">
    <label class="control-label col-sm-2" for="vaccines"> Enter number of vaccines to be distributed:</label>
    <div class="col-sm-6">
      <input type="text" name="vaccines" class="form-control" id="vaccines" placeholder="Enter number here">
    </div>
  </div>
	<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" value="submit" class="btn btn-primary">Calculate</button>
    </div>
  </div>  
	</form>	

	<table style="width:100%">
		<tr>
			<th>ID</th>
			<th>Healthsite Name</th>
			<th>Population Served</th>
			<th>Vaccines to be allocated</th>
		</tr>

		<?php 

			while($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr>
				<td>".$row['id_']."</td>
				<td>".$row['h_name']."</td>
				<td>".$row['pop_served']."</td>
				<td>".$row['percentage_total']."</td>
				</tr>";
			
			if (isset($_GET['submit'])) {
				$result1 = $_GET['vaccines'];
				$result2 = 'pop_served';
				$result3 = '367013';
				$result4 = '$result2/$result3*$result1';
								
				$spli = mysqli_query($conn, 'UPDATE healthsites SET percentage_total = $result4'); 
				
				
			}
			}
		?>	
	</table>
</div>
<script>
</script>
</body>
</html>