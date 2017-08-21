<?php

$order_table = "";
$output="";
if(isset($_POST['id']))
{
	include'connect.php';
           
    $order_table .='<table class="main-table text-center table table-bordered">
       <tr>
	      <td>الرقم</td>
	      <td>الاسم</td>
	      <td>العنوان</td>
	      <td>النوع</td>
	      <td>التوقيع</td>
	      <td>العمر</td>
	      <td>الرقم الوطني</td>
	   </tr>
      ';
	   $qe = mysql_query("select * from serv_poor") or die(mysql_error());
       if(mysql_num_rows($qe)>0)
	   {
		  while($row=mysql_fetch_array($qe))
		  {
		  	    $id_nat = $row['id_nat'];
		  	    //echo "id = ".$id_nat."<br>";
				$q1 = mysql_query("select count(id) as id from serv_poor where id_nat='".$id_nat."'") or die(mysql_error());
				$r = mysql_fetch_array($q1);
				$count =$r['id'];
				//echo "hgjg = ".$count;
		        if($count>=2)
		        {
		        	//stor row
	                 $name= $row['name'];
	                 $add = $row['address'];
	                 $gen = $row['gender'];
	                 $sig = $row['sig'];
	                 $age = $row['age'];
	                 $id_nat=$id_nat;
                     //delete all recored that dublicate from table serv_poor
				   $qe = mysql_query("delete from serv_poor where id_nat='".$id_nat."'") or die(mysql_error());
				   //insert new row that is uniqe
				   $qe = mysql_query("insert into serv_poor values('','$name','$add','$gen','$sig','$age','$id_nat')") or die(mysql_error());
		        }		
		   }
		  
			   $qe = mysql_query("select * from serv_poor") or die(mysql_error());
		       if(mysql_num_rows($qe)>0)
			   {
				  while($row=mysql_fetch_array($qe))
				  {
				    $order_table .='
					      <tr>
                                 <td>'.$row['id'].'</td>
                                 <td>'.$row['name'].'</td>
                                 <td>'.$row['address'].'</td>
                                 <td>'.$row['gender'].'</td>
                                 <td>'.$row['sig'].'</td>
                                 <td>'.$row['age'].'</td>
                                 <td>'.$row['id_nat'].'</td>
                              </tr>';
				  }
			   }
		   
		}	

		$order_table .='
					  </table>';
		$output = array(
					'order_table' => $order_table,
				);

	       // alert($total);
			echo json_encode($output); 
}
?>