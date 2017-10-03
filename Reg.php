<?php
include("connect.php") ;
?> 

<html> 
<header> <title> Registeration </title> </header> 
<body >
<link href = "styl.css" rel = "stylesheet" >  

<form method="POST"  action= ' ' >
<label> User Name </label> 
<br><br>
<input type="text" name = "uname" placeholder="Username" > 
<br> 

<label> Enter Email </label>
<br><br> 
<input type="email" name = "email" placeholder="Email" > 
<br> 
<label> Enter Password</label>
<br> <br>
<input type="password" name = "password"  placeholder="Password">
<br>
<label> Confirm Password </label>
<br><br> 
<input type="password" name = "pass2" >
<br>

<p> This Questions will help you to restore your password , so please chose Questions no one other you have its Answer </p>
<br>
<label> Enter First Security question </label> 
<br><br>
<input type="text" name = "sq1" placeholder="Security Question 1"> 
<br>
<label> Answer </label> 
<br><br>
<input type="text" name = "ans1" placeholder="Answer" > 
<br>
<label> Second Security question </label> 
<br><br>
<input type="text" name = "sq2" placeholder="Security Question 2 "> 
<br>
<label> Answer </label> 
<br><br>
<input type="text" name = "ans2" placeholder="Answer"> 
<br> 
<a href = "Sign.php" >
 <button type="button"  name ="home">Back to Sign in</button> </a> 
 <button type="submit" name = "submit" > Submit </button> 
<?php 


if (isset ($_POST['submit']) and !empty($_POST['uname']) and !empty($_POST['pass2']) and !empty($_POST['email'])
				and !empty($_POST['password']) and !empty($_POST['sq1']) and !empty($_POST['ans1']) and !empty($_POST['sq2'])
				and !empty($_POST['ans2'])) {

$pass =  openssl_encrypt ($_POST['password'], "AES-128-ECB", "maillock", 0 ,"");
$email = $_POST['email'];
$uname = $_POST['uname'];
$pass2 =  openssl_encrypt ($_POST['pass2'], "AES-128-ECB", "maillock", 0 ,"");
$ques1= $_POST['sq1'] ;
$ques2 = $_POST['sq2'] ;
$ans1= openssl_encrypt ($_POST['ans1'], "AES-128-ECB", "maillock", 0 ,"");
$ans2=  openssl_encrypt ($_POST['ans2'], "AES-128-ECB", "maillock", 0 ,"");

$q = " SELECT userName FROM members WHERE Email = '$email'" ;
$valid=	$conn->query($q) ;
$test= $valid->fetchColumn();
	
	
	if (strlen($pass) <=  8) {
	echo " <script> alert('Your password is so small and weak please choose other one '); </script>"	;
}
 elseif(($test =="" )and ($pass == $pass2 )){

$sql = "INSERT INTO members (userName,Email,Password,Q1,Ans1,Q2,Ans2) VALUES ('$uname','$email','$pass','$ques1','$ans1',

'$ques2' , '$ans2')";

	$conn->query($sql) ;

header("Location:Transfer.php") ;
}
elseif($pass !=$pass2){
	echo " <script> alert('two passwords must be matched' ) ; </script>" ;
}

else {echo "<p> This email is aleardy member if you forget your password please <a href = 'restore.php'> Click here </a> </p> " ;   
}
}
elseif (isset ($_POST['submit']) and (empty($_POST['uname']) or empty($_POST['pass2']) or empty($_POST['email']) or empty($_POST['password'])) ) { 
 echo" <script> alert('all field must be completed Filled') </script> " ;
 
}



?>  
 
 

</form> 




</body> 



</html> 