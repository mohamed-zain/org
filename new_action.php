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
<section style="padding: 20px;">
<div class="row">
<h2 class="text-center">شاشة الاعلانات</h2>
  <div class="col-md-4" style="width:220px">
    <ul class="list-group">
          <li class="list-group-item"><span class="badge"></span><a href="new_action.php" btn btn-link>جديد</a></li>
          <li class="list-group-item"><span class="badge">5</span><a href="recive_sms.php">وارد</a></li> 
          <li class="list-group-item"><span class="badge">3</span>صادرة</li> 
    </ul>
   </div>
   <div class="col-md-8">
   <div class="container" style="border-radius:5px;background-color:#ccc;width:660px;padding:30px">
                                <div style="margin-top:20px">
                                <form role="form" >
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="name2">الاسم</label>
                                        <input type="text" class="form-control" id="name2" placeholder="اكتب عنوان الرسالة" name="name2" required>
                                    
                                    </div>
                                    
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="message2">الرسالة</label>
                                        <textarea class="form-control" rows="8" placeholder="الرسالة" name="message2" required></textarea>
                                        <i class="fa fa-pencil form-control-feedback"></i>
                                    </div>
                                    <input type="submit" value="أرسل" class="btn btn-primary">
                                </form>
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