

<?php
    // echo '<pre>';
    // print_r($_REQUEST);
    // echo '<br>';
    // print_r($_FILES);

    // exit;

    $serverName="localhost";
    $userName="root";
    $pwd="";
    $database="rock";    
    $conn=mysqli_connect($serverName, $userName, $pwd, $database);
    if(!$conn){
        die('SREVER NOT RESPONDING, We regret for the inconvenience.');
    }
    else{
        // $fileName=$_FILES['userImg']['name'];
        // $tempFileLoc=$_FILES['userImg']['tmp_name'];
        // $folderLoc='uploded_images/';
        // $fileLoc= $folderLoc.$fileName;
        $fileName=$_FILES['fileToUpload']['name'];
        $tempFileLoc=$_FILES['fileToUpload']['tmp_name'];
        $folderLoc='uploaded_images/';
        $fileLoc= $folderLoc.$fileName;
        //move_uploaded_file($tempFileLoc,$fileLoc);
        
        move_uploaded_file($tempFileLoc,$fileLoc);
        
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $email=$_REQUEST['email'];
        $stuname=$_REQUEST['stuname'];
        $gender=$_REQUEST['gender'];
        $rel_id=$_REQUEST['rele'];
        //$category=$_REQUEST['Category'];
        // $email=$_REQUEST['email'];
        // $contact=$_REQUEST['contact'];
        // $add=$_REQUEST['address'];
        // $dob=$_REQUEST['dob'];

        // $sql="INSERT 
        //     INTO `student_info` (student_name, fathers_name, mothers_name, class, gender, religion, category,
        //     email, contact, address, dob, simg_path) 
        //     VALUES (
        //         '$name', '$fName', '$mName', '$std', '$Gender', '$religion', '$category', '$email', '$contact', '$add', '$dob', '$fileLoc'
        //     )";
             $sql="INSERT INTO `users` ( `username`, `password`, `email`, `stuname`, `gender`, `rel_id` ,`image`)
             VALUES('$username','$password','$email','$stuname','$gender',$rel_id,'$fileLoc')";
        $result=mysqli_query($conn,$sql);


              $last_studentId=mysqli_insert_id($conn);
              $facility_arr=$_REQUEST['facility'];
                
             foreach ($facility_arr as $value)
               {
                $sql_facility="INSERT INTO `facility_user` (id,fac_ic)
                VALUES ('$last_studentId','$value')";

                mysqli_query($conn,$sql_facility);
                }




        echo '<br><br>';

    }
?>




<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


if(isset($_POST['submit'])){
    // $name = $_POST['name'];
    $email = $_POST['email'];
   $ename=$_POST['username'];

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'salonysp11@gmail.com';//change security setting in the gmail accnt manage
$mail->Password = '340dinero';
$mail->SMTPAuth = true;

$mail->From = 'salonysp11@gmail.com';
$mail->FromName = 'salony';
$mail->AddAddress($email);


$mail->IsHTML(true);
$mail->Subject    = "Student details form";
// $mail->AltBody    = " you have been successfully registered the form.";
$mail->Body    = "You have been successfully registered the form. \n Thanks for registering. ps.ilove you";

if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "Your confirmation mail has been sent successfully.!";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    welcome
</body>
</html>