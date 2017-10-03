<html>
    
    <head> <title>Restore Password </title> </head>
    <body>
        <link href="styl.css" rel="stylesheet" >
        <form method="POST" action =' ' >
            
            <label> Enter Your Email : </label> <br> <br>
            <input type="email" name="email" placeholder="Enter Your Email" />
            <br> <br>
             <button type="submit" name="submit"> Submit</button>
             <br> <br>
             <a href="index.html"> <button type="button"> Home </button></a>
          
            <?php 
            include("connect.php") ; 
            
if(isset($_POST['submit']) and !empty($_POST['email'])){
            
 $email = $_POST['email'];
    
$_SESSION['$email'] = $email;

$sql = "select username from members where email = '$email' ";
$result=$conn->query($sql) ;
$test= $result->fetchColumn();
    
    if ($test != ""){
   	header ("Location:restore.php") ;
    }
    
else {
          echo "<p>  There is no member for this Email , Please Check your Email " ;
        }}
elseif ( isset($_POST['submit']) and empty($_POST['email'])) {
    
    echo " <p> Please Enter your Email " ;  
}



            
            ?>
            
        </form>
    </body>
</html>