<?php
 session_start();
$con = mysql_connect("localhost","root","")or die("not connected");
$query = "select * from poor ORDER BY id desc";
mysql_select_db("bussniss",$con);

$message = "";

if(count($_POST)>0)
{ 
  
  $user=$_POST['email'];
  $pass=$_POST['pass'];
  $user=test_input($user);
  $pass=test_input($pass);
  
  //include("connect.php"); 
  
  $q=mysql_query("select * from users where email='".$user."' AND password='".$pass."'")or die("not query in table users");
  $n=mysql_num_rows($q);
  //echo $n; 
  if($n>=1)
  {
      $r = mysql_fetch_array($q);
      $_SESSION['username'] =$r['fullname'];
      header("Location:home.php");
  }
  else {
    $message = "اسم المستخدم او كلمة السر خطأ";
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysql_real_escape_string($data);
  return $data;
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
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">الخدمات</a></li>
                        <li><a href="#">أعمالنا</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">الصفحات <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="new_action.php">اعلان</a></li>
                                <li><a href="#">الأسعار</a></li>
                                <li><a href="#">404</a></li>
                                <li><a href="#">اختصارات</a></li>
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

<section id="form_registraion">
   <h2 class="text-center">واجهة تسجيل الدخول</h2>
    <form class="form_login" method="post" action="index.php" role="form" >
        <div class="form-group" >
          <label for="email">البريد الالكتروني : </label>
          <input type="email" class="form-control" id="email" name="email" placeholder="ادخل الايميل: ">
        </div>
        <div class="form-group">
          <label for="pwd">كلمة السر : </label>
          <input type="password" class="form-control" name="pass" id="pwd" placeholder="ادخل كلمة السر ">
        </div>
        <button type="submit" class="btn btn-success">دخول</button>
        <a href="registration.php" class="btn btn-link">تسجيل جديد</a>
    </form>
          <?php
            if(!empty($message))
            {
               echo'
               <div id="mess_sec" class="text-center alert alert-danger" style="display:none">
               <strong>'.$message.'</strong>
               </div>';
            }
          ?>
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
          $("#mess_sec").fadeIn(1000).delay(3000).fadeOut(1000);
      });
</script>
<style type="text/css">
  .form_login{
   width: 500px;
    margin:100px auto;

  }
</style>