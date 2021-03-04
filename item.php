<!DOCTYPE html>
<html lang="en"> 	
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
.title
{
	text-align: center;
}
body{
	font-family: Arial, Helvetica, sans-serif;
}
.itemname
{
	color:darkblue;
	font-weight: bold;
}
.thecolor, .material
{
	font-size: 75%;
}
img
{
	float:left;
	height: 300px;
	width: 300px;
	margin: 5px;
}
.center
{
	text-align: center;
}
#searchbutton
{
	margin-top: 5px;
}
</style>
</head>
<body>
<div>

<h1 class="title"><a href="store.php">The Store Full of Oddly Named Objects</a></h1>
<br><br>
<form action="search.php" method="get">
<div class="row container center">
<div class="col-sm-3"></div>
<div class="col-sm-3" id="searchbox">
<input type="text" name="searchstring" class="form-control" placeholder="search">
</div>
<div class="col-sm-3" id="searchbutton"><input class="btn btn-primary" type="submit" value="search"></div>
<div class="col-sm-3"></div>
</div>
</form>
<hr>
<?php
//this page displays an individual item

include "functions.php";
$thedata = file_get_contents("data.json");
$storedata = json_decode($thedata);
item($storedata[(int)$_GET["id"]]);

 ?>
</div>
</body>
</html>
