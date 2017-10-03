<html scrolling = 'yes'> 


<head> <title> Send Message </title> 


</head> 
<link href = "styl.css" rel="stylesheet" >  
<body> 
	
	
		
	
			
	   
				<form action='' method='post' id="sending">
				
			<label> Massage : </label> <br /> <br />
				<textarea name="msg" form="sending">Enter your Message here...</textarea> 
				
				<br />
			<label> Recirver Email : </label> <br /> <br />
				<input type = "email"  id= "remail"  name="remail"  /> 
				
				<br />
			
			<button type="submit" name = "send" > Send </button>
	<a href="index.html">
		<button  name = "logout" type="button" > Log Out </button>
	</a>
	 <br /> <br />
<a href=" inbox.php"> <button type="button"> Veiw your inbox  </button></a>
    
				</form>
	
	
	
	

	
	
	
	
	
	
	
	
	
	<?php
	
	
	
	

include("connect.php");
$semail = $_SESSION['$semail'];
	


  if (isset ($_POST['send']) and !empty($_POST['msg']) and !empty($_POST['remail'])) {
$remail = $_POST['remail'];
$q = " SELECT userName FROM members WHERE Email = '$remail' " ;
$valid=$conn->query($q) ;
$test= $valid->fetchColumn();
if($test == ""){
echo "<script> alert('Sorry but Recieved Email Not Found') ;</script>";	
}
else{

$message = openssl_encrypt ($_POST['msg'], "AES-128-ECB", "maillock", 0 ,""); 
	
$sql = "INSERT INTO chat (message, semail , remail ) VALUES ( '$message' , '$semail' , '$remail') " ; 
			$conn->query($sql) ;

echo "<script> alert('Successfully Sent') ;</script>";
}
}
elseif (isset($_POST['send']) and (empty($_POST['msg']) or empty($_POST['remail']))){
	
echo " <br> <p> Please Write Email and Message Correct  "; 	
	
}
	
	
	?>
		

	</div>
	
</body>




</html> 