<?php
session_start();
include("connect.php");
//get all orginazation
$message = "";
$act = "";

if(count($_GET)>0)
{
    if($_GET['do'] =='Edit')
    {
        $m = mysql_query("select * from projects where ProjectID ='".$_GET['id']."'")or die(mysql_error());
        $row = mysql_fetch_array($m);

        if($row['isActive'] == 0)
          $act = "غير نشط";
        if($row['isActive'] == 1)      
          $act = "نشط";
    }
}
if(count($_POST)>0)
{
    $id = $_POST['ProjectID'];
    $ProjectName = $_POST['ProjectName'];
    $Description = $_POST['Description'];
    $t1 = $_POST['txtDate'];
    $t2 = $_POST['txtDate2'];
    $active = 0;
  
    if($_POST['active'] =="نشط")
      $active =1;

    $qp = mysql_query("update projects set ProjectName='".$ProjectName."',Description='".$Description."',StartAt='".$t1."',EndAt='',isActive='".$active."' where ProjectID='".$id."'") or die(mysql_error());
    if(isset($qp))
    {
      $_SESSION['up_data']="تم تحديث البيانات بنجاح = ".$qp;
      header("Location:test2.php");
    }else
      $message = "لم يتم ادخال البيانات بنجاح";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <div class="container">
       <form class="form-horizontal" method="post" action="test2.php">
              <div class="form-group">
                   <label class="col-md-2 control-lable">اسم المشروع </label>
                   <div class="col-sm-10">
                      <input type="hidden" name="ProjectID" value="<?php echo $_GET['ProjectID'];?>">
                       <input type="text" value="<?php echo $row['ProjectName'];?>" placeholder="ادخل اسم المشروع" name="ProjectName" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-lable">الوصف</label>
                 <div class="col-sm-10">
                     <textarea name="Description" id="message" required="required" class="form-control" rows="4"><?php echo $row['Description'];?></textarea>
                </div>
              </div>    
              <div class="form-group">
                   <label class="col-sm-2 control-lable">تاريخ البداية </label>
                   <div class="col-sm-10">
                      <input type="text" value="<?php echo $row['StartAt'];?>" name="txtDate" id="datepick" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                   <label class="col-sm-2 control-lable">تاريخ الانتهاء </label>
                   <div class="col-sm-10">
                      <input type="text" value="<?php echo $row['EndAt'];?>" name="txtDate2" id="datepick2" class="form-control">  
                  </div>
              </div>
              <div class="form-group">
                   <label class="col-sm-2 control-lable"> التفعيل</label>
                   <div class="col-sm-10">
                       <select name="active" class="form-control">
                         <option>نشط</option>
                         <option>غير نشط</option>
                       </select>
                  </div>
              </div>
              <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                       <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> تحديث</button> 
                  </div>
              </div>
              </div>
          </form>
    </div>
</body>
</html>