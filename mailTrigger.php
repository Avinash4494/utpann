<?php
session_start();
include('includes/config.php'); 
include ('headerLinks/header_Links.php');
include('smtp/PHPMailerAutoload.php');

 if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];


$n=10;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

$password=$_POST['password'];
$genPass = getName($n);
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$genPass')");
if($query)
{
	$_SESSION['msg']="You are successfully register !!";
// 		echo '<script>
				
// 				setTimeout(function(){ window.location.href="mailTrigger.php"; }, 100);

// </script>';
}
else{
$_SESSION['msgerror']="Not register something went worng !!";
}
}
$html='<div class="bodyContent" style="font-family: sans-serif;">
	<div class="container-fluid" style="padding: 40px;">
		<div class="row" style="display: flex;">
			<div class="centerPos" style="width: 700px;">
				<div class="coyLogo">
					<img src="cid:logo_2u" alt="" height="40px;" style="margin-bottom: 20px;">
				</div>
<div class="wrapperBody" style="border:1px solid #00bcd2;border-radius: 5px;">
		<div class="WrapperContainer" style="border-radius: 5px;background-image: linear-gradient(to bottom right, #00bcd2, #6FE7F5);padding: 0px 20px;color: white;display: flex;">
		<div class="contLeft">
			<h2 style="font-family: Helvetica;text-align:center;">
			Thank You for Registering on Utpann!
		</h2>
		<h5 style="line-height: 30px;padding-top: 30px;font-size: 1.1em;">
			Variety of seeds <br>Starting from 3129.00 / Packet Only.
		</h5>
		</div>
	</div>
	<div class="wrapperContent" style="padding: 20px;">
	<div class="wrapperComp2" style="border-radius: 5px;background-color: white;padding: 20px 70px;border:1px solid #D8D8D8;margin-top: 00px;text-align: justify;line-height: 25px;color: black;font-size: 1.1em;">
		<h5 style="margin: 0px;padding-bottom: 10px;">Dear '.$name.',</h5>
		<h5 style="margin: 0px;line-height: 20px;">Thank you for registering on Utpann Seeds and Beyonds! You can now ship across your orders ultrafast and buy more than 100+ products across all over India starting at 3129.00 / Packet Only. </h5>
	</div>
	<div class="wrapperComp2" style="border-radius: 5px;background-color: white;padding: 20px 70px;
		border:1px solid #D8D8D8;margin-top: 10px;text-align: justify;line-height: 25px;color: black;font-size: 1.1em;">
		<h5 style="margin: 0px;line-height: 20px;text-align: center;">You have been successfully registered to Utpann! <br> Please find your login details below.</h5>
		<h5 style="text-align: center;margin: 0px;padding: 10px;">Registered Email : '.$email.'</h5>
		<h5 style="text-align: center;margin: 0px;padding: 10px;">Password : '.$genPass.'</h5>
		<div class="buttonLogin" style="background-color: #00bcd2;color: white;padding: 5px;width: 150px;text-align: center;border-radius: 20px;margin-left: 170px;">
			<a href="http://localhost/Utapaan-ecom/login.php" style="text-decoration: none;color: white;">Login Now</a>
		</div>
	</div>
	<div class="wrapperComp2" style="border-radius: 5px; 
	background-image: linear-gradient(to bottom right, #00bcd2, #6FE7F5);
	padding: 00px 70px;margin-top: 10px;text-align: justify;line-height: 25px;color: white;font-size: 1.1em;">
		<h4 style="margin: 0px;padding-bottom: 10px;padding-top: 15px;text-align: center;">Have More Questions?</h4>
		<h5 style="margin: 0px;line-height: 25px;text-align: center;">Write to us at support@utpannseeds.com or check out out <br> "Frequently Asked Questions". <br> We will be happy to answer all your account-related queries.</h5>
		<h6 style="padding-bottom: 10px;padding-top: 0px;margin-top: 20px;font-size: 0.8em;">Happy Shopping ! <br>Team Utpann Seeds and Beyonds</h6>
	</div>
		<div class="wrapperComp2" style="border-radius: 5px;background-color: white;padding: 5px 70px;border:1px solid #D8D8D8;margin-top: 10px;text-align: justify;line-height: 25px;color: black;">
		<h5 style="margin: 0px;line-height: 20px;text-align: center;">Copyright 2022 Utpann. All rights reserved.</h5>
	</div>
</div>
</div>
			</div>
		</div>
	</div>
</div>';
$subject = $name.", Welcome to Utpann Seeds And Beyonds";
smtp_mailer($email,$subject,$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "testingconfig94@gmail.com";
	$mail->Password = "skmmjlcptpuehuiy";
	$mail->FromName = "Utpann";
	$mail->AddEmbeddedImage('img/logo.png','logo_2u');
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		$mail->ErrorInfo;
	}else{
		return 
		?>
		
		<?php 

}}
?>
<script>
				
 	setTimeout(function(){ window.location.href="mailConfirm.php"; }, 100);

</script>;