<?php 
 
$servername = "localhost";
$username = "house";
$password = "house";
$dbname   = "bussniss";
 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
 
$co = mysql_connect("localhost","house","house")or die("not connected");
mysql_select_db($dbname,$co) or die("not selected database");
 
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
 
// Include Spout library 
require_once 'spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
// check file name is not empty
if (!empty($_FILES['file']['name'])) {
      
    // Get File extension eg. 'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES["file"]["name"]);
     
    // check file has extension xlsx, xls and also check 
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
           && $_FILES['file']['size'] > 0 ) 
   {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name']; 
    
        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);
 
        // Open file
        $reader->open($inputFileName);
        $count = 1;

        $output = "";
 

        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {
             
            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as $row) {
 
                // It reads data after header. In the my excel sheet, 
                // header is in the first row. 
                if ($count > 1) { 
 
                    // Data of excel sheet
                    $name  = $row[0];
                    $email = $row[1];
                    $phone = $row[2];
                    $city  = $row[3];
                    $age   = $row[4];
                    //Here, You can insert data into database. 
                    $query = mysql_query("insert into poor 
                    values('','$name','$email','$phone','$city','$age')")or die("data not inserted to table".mysql_error());
                }
                $count++;
            }
        }

        $quer = mysql_query("select * from poor ORDER BY id DESC") or die("query3 dos't execute");
        $output =$output.'
             <table class="table table-bordered">
             <tr>
                <td>الرقم</td>
                <td>الاسم</td>
                <td>العنوان</td>
                <td>النوع</td>
                <td>التوقيع</td>
                <td>العمر</td>
             </tr> 
        '; 
        while($row=mysql_fetch_array($quer)){
            $output .= '
            <tr>
               <td>'.$row['id'].'</td>
               <td>'.$row['name'].'</td>
               <td>'.$row['address'].'</td>
               <td>'.$row['gender'].'</td>
               <td>'.$row['sig'].'</td>
               <td>'.$row['age'].'</td>
            </tr>';
        }

        $output.="</table>";
        echo $output;
 

        // Close excel file
        $reader->close();
 
    } else {
 
        echo"Error1";
        //echo "الرجاء اختيار الملف الصحيح";
    }
 
} else {
 
    echo"Error2";
    //echo "الرجاء قم بختيار ملف اولاً";
     
}
?>