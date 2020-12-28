<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css" />
</head>
<body>
    

<?php
//SQL STORAGE
$servername='localhost';
$username='root';
$password='';
$dbname = "easytravels";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('Could not Connect My Sql:' .mysql_error());
 }

$name = $_POST['name'];
$pid = $_POST['pid'];
$date = $_POST['date'];
$message = $_POST['message'];
$em1 = $_POST['email1'];
$em2 = $_POST['email2'];

$sql = "INSERT INTO tripdetails (name,pid,date,email1,email2,message)
VALUES ('$name','$pid','$date','$em1','$em2','$message')";

$sql1="SELECT pname from places where pid=$pid";

mysqli_query($conn, $sql);
$result=mysqli_query($conn, $sql1);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $pname=$row["pname"] ;
    }
  } else {
    echo "place doesnt exists";
  }
  mysqli_close($conn);

//EMAIL TRIGGER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "etravelsrs@gmail.com";                     // SMTP username
    $mail->Password   = "rishisahana";                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom("etravelsrs@gmail.com","Easy Travels");
    $mail->addAddress($em1);
    $mail->addAddress($em2);  
    $mail->addReplyTo("etravelsrs@gmail.com");
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'TRIP DETAILS';
    $mail->Body    = '<b>Place:</b> ' .$pname. '<br><b>Date:</b> ' .$date. '<br><b>Things to carry:</b> ' .$message;
    $mail->AltBody = 'This is an email from EasyMyVoyage';

    if($mail->send())
    {
        ?>
    
       <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Your mail has been sent successfully!!</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="index.html" class="btn btn-info btn-md">Go back</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div> 
    </div>
<?php    
    }
    else
    {
?>
        <div class="alert alert-dark" role="alert">
        The message could'nt be sent!! 
        </div>
<?php
    }
?>
</body>
</html>
