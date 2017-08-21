<?php

$con = mysql_connect("localhost","house","house")or die("mysql dos't connected");
mysql_select_db("bussniss",$con);


if(count($_POST)>0)
{
	$name = $_POST['name'];
	$add = $_POST['add'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$query = mysql_query("insert into bussniss values('',n'$name',n'$add',n'$email',n'$pass')")or die("dos't query about your bussniss");
	if(isset($query))
	{
		echo "correct";
	}else{
		echo "error2";
	}
}
?>