<?php
session_start();
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
                                <li><a href="index.php">خروج</a></li>
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
                                <li><a href="index.php">خروج</a></li>
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
<?php include("function.php");?>
</div>
        <h3 class="text-right"> مرحباً : <?php echo $_SESSION['username'];?></h3>
<section>
    <div class="container home_states text-center">
          <h1>احصائيات ذات علاقة بالمشاريع</h1>
          <div class="row">
                <div class="col-md-4">
                    <div class="stat st-member">عدد المشاريع
                    <span><a href="projects.php"><?php echo getCountOrg("projects");?></a></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat st-proj">عدد المشاريع النشطة
                    <span><?php echo getCountOrg("projects where isActive=1");?></a></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat st-pending">عدد المشاريع الغير نشطة
                    <span><?php echo getCountOrg("projects where isActive=0");?></span>
                    </div>
                </div>
          </div>
    </div>
    <div class="container latest">
    <div class="row">
      <div class="col-sm-6">
         <div class="panel panel-default">
             <div class="panel-heading">
             <?php $num =3;?>
                <i class="fa fa-users"></i>اخر <?php echo $num;?> مشاريع نشطة
             </div>
             <div class="panel-body">
             <?php 
                $q = getLatest('projects',$num,"id");
                while($r = mysql_fetch_array($q))
                {
                    echo $r['name']."<br>";
                }
             ?>  
             </div>
        </div>
      </div>
      <div class="col-sm-6">
         <div class="panel panel-default">
             <div class="panel-heading">
                <i class="fa fa-tag"></i>اخر المنظمات المضافة حديثاً
             </div>
             <div class="panel-body">
             test
             </div>
        </div>
      </div>
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
</body>
</html>