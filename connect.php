<?php

$con = mysql_connect("localhost","house","house") or die(mysql_error());
mysql_select_db("bussniss")or die(mysql_error());
mysql_set_charset("UTF8",$con);
?>