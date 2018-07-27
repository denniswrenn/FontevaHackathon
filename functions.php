<?php

function datapiece($theobject)
{
	echo "
	<div class=\"row container\">
	<div class=\"col\">".
	//image($theobject->image) . 
	name($theobject->name, $theobject->id) .
	"<div class=\"row\">
	<div class=\"col-sm-4\">" . 
	price($theobject->price) . 
	"</div><div class=\"col-sm-4\">" . 
	thecolor($theobject->attributes->color) .
	"</div><div class=\"col-sm-4\">" .
	material($theobject->attributes->material) . "</div></div>
	
	<div class=\"row\">" . 
	"<div class=\"col-sm-12\">" . desc($theobject->description)
	."</div></div></div></div><hr>";
}

function item($theobject)
{
	echo "
	<div class=\"row container\">
	<div class=\"col\">".
	"<img src=\"$theobject->image\"><br>" . 
	itemname($theobject->name, $theobject->id) .
	"<div class=\"row\">
	<div class=\"col-sm-4\">" . 
	price($theobject->price) . 
	"</div><div class=\"col-sm-4\">" . 
	thecolor($theobject->attributes->color) .
	"</div><div class=\"col-sm-4\">" .
	material($theobject->attributes->material) . "</div></div>
	
	<div class=\"row\">" . 
	"<div class=\"col-sm-12\">" . itemdesc($theobject->description)
	."</div></div></div></div><hr>";
}

function name($input, $id)
{
	return "<div class=\"itemname\"><a href=\"item.php?id=$id\">$input</a></div>";	
}
function itemname($input)
{
		return "<div class=\"itemname\" style=\"font-size: 18pt\">$input</div>";	
}
function desc($input)
{
	return "<span class=\"desc\">" . trim(substr($input, 0, 200)) . "...</span>";
}
function itemdesc($input)
{
		return "<span class=\"desc\">$input</span>";

}
function price($input)
{
	return "<span class=\"price\"><b>\$$input</b></span>";
}
function thecolor($input)
{
	return "<span class=\"thecolor\"><b>color: ". strtolower($input). "</b></span>";
}
function material($input)
{
	return "<span class=\"material\"><b>material: ".strtolower($input)."</b></span>";
}
function image($input)
{
	return "<img src=\"$input\" class=\"pic\">";
}


?>