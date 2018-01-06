<?php
$name=$_POST['Ca_Name'];
$email = $_POST['Ca_EmailAddress'];
$ph=$_POST['Ca_MobileNo'];
$city=$_POST['City'];
$job=$_POST['JobProfile'];

$message = "<html><head>
<title>New Resume Received</title>
</head>
<body>
<p>Hello,</p><br/>
<p>Resume details  :</p><br/>
<p>Name :  ".$name."</p>
<p>E-mail : ".$email."</p>
<p>Phone : ".$ph."</p>
<p>City : ".$city."</p>
<p>Job Profile : ".$job."</p><br>
<p>Stay tuned for more resumes!</p>
</body>
</html>";

$file_name = $_FILES['Resume']['name'];
$fileatt = $_FILES['Resume']['tmp_name'];
$file_type = $_FILES['Resume']['type'];

$subject = 'AppaddIndia Resume Received';

   $file = fopen($fileatt,'rb');
   $content = fread($file,filesize($fileatt));
   fclose($file);

    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));

    $header = "From:nonreply@appaddindia.com\r\n";
    $header .= "MIME-Version: 1.0\r\n";

    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";

    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset-iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";

    $header .= "--".$uid."\r\n";
   $header .= "Content-type: ".$file_type."; name=\"".$file_name."\"\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";

$mail = mail("aman76079@gmail.com",$subject,"",$header);

if($mail)
    echo 'Contact Form Submitted Successfully!<a href="http://appaddindia.com">Goto Home</a>';
else
    echo 'Failed! Contact Form not submitted.<a href="http://appaddindia.com">Goto Home</a>';
?>