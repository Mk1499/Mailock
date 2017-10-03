<html>
     <link href="styl.css" rel="stylesheet" type="text/css">
    <head> <title> Outbox </title></head>
    <body>
      <p> 
     <div class>
         
            <?php
            
            include("connect.php");
            $semail = $_SESSION['$semail'];
           
            echo " <table>
            <tr>
            <th> Massage </th>
            <th> To </th>
            </tr>
            ";
            
           $sql="SELECT message , remail FROM chat where semail='$semail'";
$result=$conn->query($sql) ;


while($row=$result->fetch($conn::FETCH_ASSOC)){
 echo "<tr>";
    echo "<td>" .openssl_decrypt($row['message'], "AES-128-ECB", "maillock", 0, "") . "</td>";
    echo "<td>" . $row['remail'] . "</td>";
echo "</tr>" ;

}



?>
        <br /> <br />  
    <a href=" chating.php"> <button type="button" style="background:#fff; color:#1ab188"> Send Massage  </button></a>
     <a href=" inbox.php"> <button type="button" style="background:#fff; color:#1ab188"> Inbox  </button></a>
 <a href=" index.html"> <button type="button" style="background:#fff; color:#1ab188"> Home  </button></a>
     <br /> <br />
    <a href=" index.html"> <button type="button" style="background:#fff; color:#1ab188"> Log Out  </button></a>
    <br /> <br />
    
    <div class= "welcome" style="margin: 0px 800px 0px 0px "> Welcome <?php  echo $semail  ?> </div>
   </div>
      </p>
      </p>
    </body>
    
    
    
    
    
</html>