<?php 
$con = mysql_connect("localhost","house","house")or die("not connected");
$query = "select * from poor ORDER BY id desc";
mysql_select_db("bussniss",$con);
$q = mysql_query($query)or die("not query".mysql_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
</head>
<body>

<div class="container" style="width: 900px">
  <h2 align="center">تحميل ملف اكسل</h2>
  <h3 align="center">بيانات المنظمة</h3>
  <div style="margin-left: 100px;">
	  <form  id="upload_cv" method="post" role="form" enctype="multipart/form-data">
	      <br/> 
	    <div class="col-md-4">
	    	<input type="file" name="file"/>
	    </div>
	    <div class="col-md-8">
	    	<input type="submit" name="upload" id="upload" class="btn btn-success" value="Upload" />
	    </div>
	    <div style="clear: both;"></div>
	  </form>		
  <div id="secc" style="display: none;">
  		<div class="alert alert-success" style="width:600px;
  				margin-right:100px;position: absolute;">
  			<center><strong>تم تحميل الملف بنجاح..</strong></center>
		</div>
  </div>
  <div id="error1" style="display: none;">
		<div class="alert alert-danger" style="width:600px;
	  				margin-right:100px;position: absolute;">
  			<center><strong>لقد قمت باختيار ملف خاطئ</strong></center>
  		</div>
  </div> 
  <div id="error2" style="display: none;">
		<div class="alert alert-warning" style="width:600px;
	  			margin-right:100px;position: absolute;">
	  		<center><strong>قم باختيار الملف اولاً</strong></center>
		</div>
  </div>
  <br/><br/><br/>
  <div class="table-reponsive" id="emp_table">
  	<table class="table table-bordered" >
  		<tr>
  			<td>الرقم</td>
  			<td>الاسم</td>
  			<td>العنوان</td>
  			<td>الجنس</td>
  			<td>التوقيع</td>
  			<td>العمر</td>
  		</tr>

  		<?php
  		  if(mysql_num_rows($q)>0)
  		  {
  		  	while($row=mysql_fetch_array($q))
  		  	{
  		      ?>
  		  	  <tr>
  		  	  	<td><?php echo $row['id'];?></td>
  		  	  	<td><?php echo $row['name'];?></td>
  		  	  	<td><?php echo $row['address'];?></td>
  		  	  	<td><?php echo $row['gender'];?></td>
  		  	  	<td><?php echo $row['sig'];?></td>
  		  	  	<td><?php echo $row['age'];?></td>
  		  	  </tr>
  		  	  <?php
               }   
  		 }
  		?>
  	</table>
  </div>
</div>

</body>
</html>
<script>
	
	$(document).ready(function(){
		$("#upload_cv").on('submit',function(e){
			e.preventDefault();
			$.ajax({
				url:"uploadExcel.php",
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data){
					if(data == "Error1")
						{
							$(function(){
								$("#error1").fadeIn(1000).delay(3000).fadeOut(1000);
							});
							//alert("please select correct file");
						}else if(data == "Error2"){
							$(function(){
								$("#error2").fadeIn(1000).delay(3000).fadeOut(1000);
							});

						}else{
							$(function(){
								$("#secc").fadeIn(1000).delay(3000).fadeOut(1000);
							});
							$("#emp_table").html(data);
						}
					
				}

			});
		})
	});
</script>