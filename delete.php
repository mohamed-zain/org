<?php

$order_table = "";

if(isset($_POST['id']))
{
	include'connect.php';
           
    $order_table .='<table class="main-table text-center table table-bordered">
    <tr>
	      <td>الرقم</td>
	      <td>اسم المنظمة</td>
	      <td>العنوان</td>
	      <td>البريد الالكتروني</td>
	      <td>كلمة السر</td>
	      <td>تاريخ التسجيل</td>
	      <td>التحكم</td>
	</tr>
     ';
	$q = mysql_query("delete from bussniss where id ='".$_POST['id']."'") or die(mysql_error());
	if(isset($q))
	{
	   $qe = mysql_query("select * from bussniss") or die(mysql_error());
       if(mysql_num_rows($qe)>0)
	   {
		  while($row=mysql_fetch_array($qe))
		  {
		    $order_table .='
			      <tr>
                     <td>'.$row['id'].'</td>
                     <td>'.$row['name'].'</td>
                     <td>'.$row['address'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['pass'].'</td>
                     <td>'.$row['register_date'].'</td>
                      <td>
                          <a href="edit_buss.php?do=Edit&id='.$row['id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                          <a class="btn btn-danger btn-sm delete" id="'.$row['id'].'"><i class="fa fa-close"></i> مسح</a>
                      </td>';
                            if($row['isActive'] == 0)
                              $act = "غير نشط";
                            if($row['isActive'] == 1)      
                              $act = "نشط";

                              echo '<td><a class="btn btn-info btn-sm"><i class="fa fa-close"></i>'.$act.'</a>
                                  </td>
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