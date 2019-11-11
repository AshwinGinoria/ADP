<!DOCTYPE html>	
<html>
<head>
	<title>Mini Project</title>
	<link rel="stylesheet" href="miniProject.css">
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- documentation at http://getbootstrap.com/docs/4.1/, alternative themes at https://bootswatch.com/ -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light border">
		<a class="navbar-brand" href="/MiniProject/"><span class="red">Applied Data-Base Practicum</span></a>
	</nav>
	<div id="Initial">
	<div class="row d-flex justify-content-center p-5">
		<div class="col-md-4 px-3" id="form">
			<form>
				<div class="form-group row">
					<div class="col-sm-12 card-header text-center" id="Form-header">
						<strong id="Form-header-text">Query Form</strong>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label text-left" for="from">Date From : </label>
					<div class="col-sm-8">
						<input class="form-control" type="date" name="datefrom" id="from" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label text-left" for="to">Date To : </label>
					<div class="col-sm-8">
						<input class="form-control" type="date" name="dateto" id="to" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label text-left" for="to">Column : </label>
					<select name="attribute" class="custom-select col-sm-7 ml-3">
						<option value='' disabled selected id="Option">Select</option>
						<!-- PRE-POPULATING -->
						<?php include("prepopulate.php"); ?>
					</select>
				</div>
				<fieldset class="form-group">
					<div class="row">
					<legend class="col-form-label col-sm-4 pt-0 text-left">Property : </legend>
					<div class="col-sm-8 text-left">
						<div class="form-check p-1">
							<input class="form-check-label" type="checkbox" name="minimum" id="min">
							<label class="form-check-label" for="Minimum">Minimun</label>
						</div>
						<div class="form-check p-1">
							<input class="form-check-label" type="checkbox" name="maximum" id="max">
							<label class="form-check-label" for="Maximum">Maximun</label>
						</div>
						<div class="form-check p-1">
							<input class="form-check-label" type="checkbox" name="average" id="avg">
							<label class="form-check-label" for="Average">Average</label>
						</div>
					</div>
					</div>
				</fieldset>
				<div class="form-group row d-flex justify-content-center">
					<button onclick="SubmitForm()" class="btn btn-primary" type="button" id="Submit">Submit Query</button>
				</div>
			</form>
		</div>
	</div>
	</div>
    <footer class="small text-center text-muted">
        Design By <a target="_blank" href="https://github.com/AshwinGinoria">Ashwin Ginoria</a>, <a target="_blank" href="https://github.com/Saransh0905">Saransh Jain</a>.
    </footer>
	<script>
		function SubmitForm() {
			console.log("FORM SUBMITTED");
			var toChange = document.getElementById("Initial");
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					toChange.innetHTML = "";
				}
			};
			xhttp.open("GET", "result_ajax.txt", true);
			xhttp.send();
		}
	</script>
</body>
</html>