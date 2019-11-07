<!DOCTYPE html>
<html>
<head>
	<title>Mini Project</title>
	<link rel="stylesheet" href="miniProject.css">

</head>
<body>
	<form action="result.php" method="POST">
		From :
		<input type="date" name="datefrom" id="from">
		To:
		<input type="date" name="dateto" id="to">
		<select name="attribute">
			<!-- PRE-POPULATING -->
			<?php include("prepopulate.php"); ?>
		</select>
		<button type="submit" id="Submit">Submit Query</button>
		<br><br>
		 Minimun :   
		<input type="checkbox" name="minimum" id="min">
		 Maximun :     
		<input type="checkbox" name="maximum" id="max">
		 Average :    
		<input type="checkbox" name="average" id="avg">
	</form>
</body>
<script src = "miniProject.js"></script>

</html>