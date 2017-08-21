<?php
include("connect.php");
/*functions count org in db*/
function getCountOrg($table)
{
	$query = "select * from ".$table;
    $q = mysql_query($query)or die(mysql_error());
    $count = mysql_num_rows($q);
	return $count;
}

//function to get latest
function getLatest($table,$num,$col)
{
	$c = "select * from ".$table." ORDER BY ".$col." desc limit ".$num;
	$q = mysql_query($c) or die(mysql_error());
    return $q;
}
?>