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
</div>

<section id="form_registraion">
    <h2 class="text-center"> بيانات تسجيل المؤسسة </h2>
    <div class="container" style="width:700px;border-radius:5px;background-color: #ccc;height:440px">
    <form id="myform" role="form" style="margin-top: 50px">
    <div class="form-group">
        <label for="email">اسم المؤسسة :</label>
        <input type="text" id="name" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">عنوان المؤسسة :</label>
        <input type="text" id="address" class="form-control" >
    </div>
    <div class="form-group">
        <label for="pwd">البريد الالكتروني:</label>
        <input type="email" id="email" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">كلمة السر :</label>
        <input type="password" id="pass" class="form-control" >
    </div>
        <button type="submit" id="submit" class="btn btn-info">حفظ</button>
        <a href="index.php" class="btn btn-link">تسجيل الدخول</a>
  </form>
  <div id="secc" style="display: none;">
        <div class="alert alert-success" style="width:600px;
                margin-right:100px;position: absolute;box-shadow: 2px 3px 2px 3px;">
            <center><strong>تمت العملية بنجاح..</strong></center>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#myform").on('submit',function(e){
            e.preventDefault();
           var name = document.getElementById('name').value;
           var add = document.getElementById('address').value;
           var email = document.getElementById('email').value;
           var pass = document.getElementById('pass').value;
           $.ajax({
            url:"newRegisteration.php",
            method:"post",
            data:{name:name,add:add,email:email,password:pass},
            success:function(data){
                if(data == "correct"){
                    document.getElementById('name').value = "";
                    document.getElementById('address').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('pass').value = "";
                    $(function(){
                                $("#secc").fadeIn(1000).delay(3000).fadeOut(1000);
                            });
                }else if(data == "error2"){
                    alert("not registered");
                }

            }
           });
        });
    });
</script>