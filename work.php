<?php
session_start();
//include("session.php");
include("connect.php");
//get all orginazation
$message = "";
if(!empty($_SESSION['up_data'])){
    $message = $_SESSION['up_data'];
}
$org = mysql_query("select * from serv_poor")or die(mysql_error());

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
                                <li><a href="work.php">الفرذ</a></li>
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
         <div style="" class="sec alert alert-success text-center">
         '.$message.'
         </div>
        ';
      }
        unset($_SESSION['up_data']);
        $message = "";
      ?>
      <div style="display:none;" id="secss" class="alert alert-success text-center">
        <h4>تمت تنقية البيانات</h4>   
      </div>
    <h1 class="text-center"> شاشة عملية الفرذ والتوزيع</h1>
    <div class="container">
       <div class="table-reponsive" id="order_table">
           <table class="main-table text-center table table-bordered">
              <tr>
                  <td>الرقم</td>
                  <td>الاسم</td>
                  <td>العنوان</td>
                  <td>النوع</td>
                  <td>التوقيع</td>
                  <td>العمر</td>
                  <td>الرقم الوطني</td>
              </tr>

                <?php 
                    while($row = mysql_fetch_array($org)){
                        echo'<tr>
                                 <td>'.$row['id'].'</td>
                                 <td>'.$row['name'].'</td>
                                 <td>'.$row['address'].'</td>
                                 <td>'.$row['gender'].'</td>
                                 <td>'.$row['sig'].'</td>
                                 <td>'.$row['age'].'</td>
                                 <td>'.$row['id_nat'].'</td>
                              </tr>';
                    }
                ?>
            </table>
                  
        </div>
            <div class="mybtn">
                       <a class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> إجراء التوزيع</a>
                       <a  class="btn btn-primary delete"><i class="glyphicon glyphicon-random"></i> تنقية البيانات</a>
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
<style type="text/css">
  .mybtn .btn{
    font-size: 20px;
  }
</style>
<script type="text/javascript">
$(document).on('click','.delete',function()
  {
    var id = 44;//$(this).attr("id");
    //alert(product_id);
    if(confirm("هل انت متأكد من العملية ؟ "))
    {
        $.ajax({
          url:"pur_data.php",
          method:"post",
          dataType:"json",
          data:{
                id:id
          },
          success:function(data){
              $("#order_table").html(data.order_table);
              $(function(){
                $('#secss').fadeIn(1000).delay(2000).fadeOut(1000);
              });
          }
        });
    }else{
      return false;
    } 
  });
</script>