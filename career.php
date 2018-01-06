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
    $headers = "Form:".$email;
$subject = 'AppaddIndia Resume Received';


$mail = mail("aman76079@gmail.com",$subject,"",$header);

if($mail)
    echo 'Contact Form Submitted Successfully!<a href="http://appaddindia.com">Goto Home</a>';
else
    echo 'Failed! Contact Form not submitted.<a href="http://appaddindia.com">Goto Home</a>';
?>