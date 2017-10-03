

<html> 
<header> <title> Restore </title> </header> 
<body >
<link href = "styl.css" rel = "stylesheet" >  
<?php
include ("connect.php") ; 
 $email = $_SESSION['$email'];
?>


<form method="POST"  action= ' ' >
 
<br /><br />
<p> please Answer The Following Question : </p> <br> <br>
<?php

 $sql = "SELECT Q1 FROM members where email='$email'";
 $result=$conn->query($sql) ;
 $row=$result->fetch($conn::FETCH_ASSOC) ;
 echo "<p>" .$row['q1']."<br><br>" ;

?>
<input type="text" name="ans1" /><br>  
<?php

 $sql = "SELECT Q2 FROM members where email='$email'";
 $result=$conn->query($sql) ;
 $row=$result->fetch($conn::FETCH_ASSOC) ;
 echo "<p>" .$row['q2']."<br><br>" ;
?>
<input type="text" name="ans2" /><br>

<?php

if (isset ($_POST['submit']) ) {
	

$rslt = "";
$ans1 = openssl_encrypt ($_POST['ans1'], "AES-128-ECB", "maillock", 0 ,"");
$ans2 = openssl_encrypt ($_POST['ans2'], "AES-128-ECB", "maillock", 0 ,"");


$sql = "SELECT Ans1 , Ans2 FROM members WHERE Email = '$email' " ;
$result=$conn->query($sql) ;


$row=$result->fetch($conn::FETCH_ASSOC) ; 
if ($row['ans1']==$ans1 and $row['ans2']==$ans2){

 $sql1 = "SELECT Password FROM members WHERE Email = '$email' " ;

 $result=$conn->query($sql1) ;

$row=$result->fetch($conn::FETCH_ASSOC) ; 
 
 echo " <p>Your Password is : ".openssl_decrypt($row['password'], "AES-128-ECB", "maillock", 0, ""); 
}}

?> 



 <button type="submit" name = "submit" > Show me My Password </button>
 <br> <br>

<a href = "Sign.php" >
 <button type="button"  name ="Sign">Log out</button> </a> <br><br>

 <a href="index.html" >
 <button type="button" name = "home" > Back To Home </button>
 </a>
 

 

</form> 




</body> 



</html> 