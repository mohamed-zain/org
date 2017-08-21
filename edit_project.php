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
    $rt = mysql_affected_rows($qp);
    echo "fffff".$rt;
    if(isset($qp)>0)
    {
      $_SESSION['up_data']="تم تحديث البيانات بنجاح = ".$rt;
      header("Location:projects.php");
    }else
      $message = "لم يتم ادخال البيانات بنجاح";
}
?>
<!DOCTYPE html>
<html lang="en">
 <title>Bootstrap Theme Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    
</head>
<body>
                    
<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>
                </div>
            
                <div class="collapse navbar-collapse navbar-left">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home.php">الرئيسية</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">الادارة <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="mang_org.php">المنظمات</a></li>
                                <li><a href="mang_project.php">المشاريع</a></li>
                                <li><a href="mang_users.php">المستخدمين</a></li>
                                <li><a href="logout.php">خروج</a></li>
                            </ul>
                        </li>
                        <li><a href="#">الخدمات</a></li>
                        <li><a href="#">أعمالنا</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">الصفحات <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="new_action.php">اعلان</a></li>
                                <li><a href="#">الأسعار</a></li>
                                <li><a href="#">404</a></li>
                                <li><a href="logout.php">خروج</a></li>
                            </ul>
                        </li>
                        <li><a href="#">مدونة</a></li> 
                        <li><a href="#">اتصل بنا</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
<div class="jumbotron">

<div class="text-center">
  <h1>مؤسسة سودان الخير</h1> 
  <p>نحن متخصصون فى التعامل مع منظمات المجتمع المدني لدعمهم والفقراء</p> 
</div>

</div>
        <h3 class="text-right"> مرحباً : <?php echo $_SESSION['username'];?></h3>
<section>
<?php if(!empty($message)){
        echo '
         <div style="display:none" class="sec alert alert-success text-center">
         '.$message.'
         </div>
        ';
      }?>
    <h1 class="text-center"> شاشة تعديل بيانات المشروع</h1>
    <div class="container">
       <form class="form-horizontal" method="post" action="edit_project.php">
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
</section>

   <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    جميع الحقوق محفوظة لـ &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a> | و التعريب بواسطة <a href="http://www.arabskey.com" title="Arabskey For RTL Templates and Web Lesson" target="_blank">Arabskey</a>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">التعلميات</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->    
    


<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="css/backend.js"></script>

    <link rel="stylesheet" href="cssn/js/jquery-ui.css">
 <script src="cssn/js/jquery.js"></script>
 <script src="cssn/js/jquery-ui.js"></script>
</body>
</html>
<script type="text/javascript">
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();

$(function() { 
    $("#datepick").datepicker({
    changeMonth:true,
    changeYear:true,
    yearRange:"-100:+0",
    dateFormat:"yy-mm-dd"
   });
 });
$(function() { 
    $("#datepick2").datepicker({
    changeMonth:true,
    changeYear:true,
    yearRange:"-100:+0",
    dateFormat:"yy-mm-dd"
   });
 });

</script>