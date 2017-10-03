
<html> <header> <title> Home </title></header>

<link href = "styl.css" rel="stylesheet" > 
<body>
	
	
<form method = "POST" action = ' ' > 
<label> Enter Email </label> 
<br><br> 
<input type ="email"  name = "semail" placeholder="Your Email"> </input> 
<br><br> 
<label > Password </label> 
<br><br> 
<input type ="password" name = "password" placeholder="Your Password"> </input>


<br> <br>

 <button type="submit" name = "login" > Login </button>
 <a href = "Reg.php" > 
<button type="button"> Registeration </button>

<a href="prestore.php" > <p>Forget your password ? </p>	</a>
</a>
 <a href = "index.html" > 
<button type="button"> Back to Home </button>
<p>   </p>
 
</form>
<?php 

include ("connect.php") ; 	


if (isset ($_POST['login']) ) {
	

$rslt = "";
$pass = openssl_encrypt ($_POST['password'], "AES-128-ECB", "maillock", 0 ,"");
$semail = $_POST['semail'];

$_SESSION['$semail'] = $semail;
$sql = "SELECT UserName FROM members WHERE Email = '$semail' and  password =  '$pass' " ;
$rslt = $conn->query($sql) ;

$mem= $rslt->fetchColumn();




if ($mem == "" ) {
	
	echo "<script> alert('Your Email or Password is Wrong  Please Try Agian')</script>" ; 
}
	else {
		
		echo "<script> alert('You Have Logged in we will redirct you in 5 sec '); </script>"	;
         

		
		header ("Location:Prepare.php") ;
		
		exit ; 
	}
}



elseif (isset ($_POST['login']) and strlen($pass)> 8) {
	
	echo "<p><strong> login success</strong></p>";
	
}


?>

</form> 




</body>

	</frame>
</html>