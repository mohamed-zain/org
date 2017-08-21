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
        $m = mysql_query("select * from bussniss where id='".$_GET['id']."'")or die(mysql_error());
        $row = mysql_fetch_array($m);

        if($row['isActive'] == 0)
          $act = "غير نشط";
        if($row['isActive'] == 1)      
          $act = "نشط";
    }
}

if(count($_POST)>0){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $active = 0;
    if($_POST['active'] =="نشط")
      $active =1;
    if(empty($_POST['newpass']))
      $pass = $_POST['oldpass'];
    else   
      $pass = $_POST['newpass'];
    //$star_date = $_POST['star_date'];
    $q = mysql_query("update bussniss set name='$username',address='$address',email='$email',pass='$pass',isActive='$active' where id='$id'")or die(mysql_error());
    if(isset($q))
    {
      header("Location:bussniss.php");
      $_SESSION['up_data']="تم تحديث البيانات بنجاح";
    }else
      $message = "لم يتم ادخال البيانات بنجاح";
}
$_POST['submit']="";
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
    <h1 class="text-center"> ادارة المنظمات</h1>
    <div class="container">
       <form class="form-horizontal" method="post" action="edit_buss.php">
              <div class="form-group">
                   <label class="col-md-2 control-lable">اسم المنظمة </label>
                   <div class="col-sm-10">
                      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                       <input type="text" value="<?php echo $row['name'];?>" placeholder="ادخل اسم المنظمة" name="username" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-lable">العنوان</label>
                 <div class="col-sm-10">
                     <input type="text" value="<?php echo $row['address'];?>" placeholder="ادخل العنوان" name="address" class="form-control">
                </div>
              </div>    
              <div class="form-group">
                   <label class="col-sm-2 control-lable">البريد الالكتروني </label>
                   <div class="col-sm-10">
                       <input type="text" value="<?php echo $row['email'];?>" placeholder="ادخل البريد الالكتروني" name="email" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                   <label class="col-sm-2 control-lable">كلمة السر </label>
                   <div class="col-sm-10">
                       <input type="hidden" value="<?php echo $row['pass'];?>" placeholder="ادخل كلمة السر" name="oldpass" class="form-control">
                       <input type="password" placeholder="ادخل كلمة السر الجديدة هنا" name="newpass" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                   <label class="col-sm-2 control-lable"> التفعيل</label>
                   <div class="col-sm-10">
                       <select name="active">
                         <option>نشط</option>
                         <option>غير نشط</option>
                       </select>
                  </div>
              </div>
              <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                       <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-update"></i> تحديث</button> 
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
</body>
</html>
<script type="text/javascript">
 $(function(){
    $('.sec').fadeIn(1000).delay(2000).fadeOut(1000);
  });
</script>