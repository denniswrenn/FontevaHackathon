<?php

function datapiece($theobject)
{//a function to quickly produce the html to display a single item in the list of items.
	echo "
	<div class=\"row container\">
	<div class=\"col\">".
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
{//a function to quickly produce the html to display an item on the item page.
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
{//a function to quickly produce html to output a link to the item
	return "<div class=\"itemname\"><a href=\"item.php?id=$id\">$input</a></div>";	
}
function itemname($input)
{//a function to quickly produce html to output the item name
		return "<div class=\"itemname\" style=\"font-size: 18pt\">$input</div>";	
}
function desc($input)
{//a function to quickly produce html to output the first 200 characters of the description
	return "<span class=\"desc\">" . trim(substr($input, 0, 200)) . "...</span>";
}
function itemdesc($input)
{//a function to quickly produce html to output the item description
		return "<span class=\"desc\">$input</span>";

}
function price($input)
{//a function to quickly produce html to output the price an item is
	return "<span class=\"price\"><b>\$$input</b></span>";
}
function thecolor($input)
{//a function to quickly produce html to list the color an item is
	return "<span class=\"thecolor\"><b>color: ". strtolower($input). "</b></span>";
}
function material($input)
{//a function to quickly produce html to list the type of material an item is
	return "<span class=\"material\"><b>material: ".strtolower($input)."</b></span>";
}
function image($input)
{//a function to quickly produce html for an image
	return "<img src=\"$input\" class=\"pic\">";
}


?>