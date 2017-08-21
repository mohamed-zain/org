<?php
//import.php

if(!empty($_FILES['emp_file']['name']))
{
    $con = mysql_connect("localhost","house","house")or die("not connected");
    $output = "";
    $allow_ext = array("xlsx");
    $exten = end(explode(".",$_FILES["emp_file"]["name"]));
    if(in_array($exten, $allow_ext))
    {
       $fil_data = fopen($_FILES['emp_file']['tmp_name'],"r");
       fgetcsv($fil_data);
       while ($row = fgetcsv($fil_data)) {
       	print_r($row);
       }
    }else{

    }
}else
{
	echo "Error2";
}

?>