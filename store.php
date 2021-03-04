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
body
{
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
	height: 100px;
	width: 100px;
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
include "functions.php";

//The following is for pagination
if(isset($_GET["start"]) && isset($_GET["end"]))
{
	$pagstart = $_GET["start"];
	$pagend = $_GET["end"];
} else
{
	$pagstart=1;
	$pagend=20;
}


//load the data file into a variable
$thedata = file_get_contents("data.json");

//load all the json in an array of objects with each object representing a json entry
$storedata = json_decode($thedata);

//The following just makes pagination a little nicer.

$thecount = count($storedata);

$prevstart = $pagstart - 20;

if($prevstart<1) $prevstart=1;
$prevend = $prevstart + 19;

$nextend = $pagend + 20;
if($nextend > $thecount) $nextend = $thecount;
$nextstart = $nextend - 19;

for($i = 0; $i < $thecount; $i++)
{
	//Go through the entire data set to get the different materials and colors to populate the search select boxes.
	$mat[] = strtolower($storedata[$i]->attributes->material);
	$col[] = $storedata[$i]->attributes->color;
}

//There will be duplicate values because several items can be the same color or material 
//We don't need duplicates so we'll get rid of them then clean up the array.
$mat = array_unique($mat);
$mat = array_values($mat);
 
$col = array_unique($col);
$col= array_values($col);

/* *** This part of the search is not finished and has not been thoroughly thought out. ***
echo "<div class=\"container\"> Filter by color: ";
echo "<select 	name=\"color\">";
 
for($i = 0; $i < count($col); $i++)
{//list colors for the search
	echo "<option value=\"" . $col[$i] . "\">". $col[$i] . "</option>";
}
echo "</select>";
echo " or material: <select 	name=\"material\">";

for($i = 0; $i < count($mat); $i++)
{//list materials for the search
	 echo "<option value=\"" . $mat[$i] . "\">". $mat[$i] . "</option>";	 
}
echo "</select>";
echo "</div>";
*/
echo "<div class=\"col-sm\" style=\"text-align:center\">$pagstart - $pagend of $thecount  <a href=\"store.php?start=$prevstart&end=$prevend\">Prev</a>...
<a href=\"store.php?start=$nextstart&end=$nextend\">Next</a></div>";



for($i = $pagstart-1; $i < $pagend; $i++)
{	
	datapiece($storedata[$i]);
}
 
 echo "<div class=\"col-sm\" style=\"text-align:center\">$pagstart - $pagend of $thecount  <a href=\"store.php?start=$prevstart&end=$prevend\">Prev</a>...
<a href=\"store.php?start=$nextstart&end=$nextend\">Next</a></div>";
?>
</div>
</body>
</html>
