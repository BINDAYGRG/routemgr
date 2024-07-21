
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysql_connect($servername, $username, $password);
    if(!$conn)
    {
      die("Could not connect: " . mysql_error());   
    }
    //selecting a databade
    mysql_select_db('route',$conn);
    if($_POST){
        
        $query="update `passengerinfo` set `name`='".$_POST['name']."', `address`='".$_POST['address']."', `password`='".$_POST['password']."', `phno`='".$_POST['phno']."', `email`='".$_POST['email']."' where id=".$_GET['id'];
        //operation or executing a query
        $query_result=mysql_query($query,$conn);
        
      
        if($query_result)
        	header("Location: success.php");
           
           echo '<center>Your Profile has been successfully Edited</center>';
    }
    else if($_GET['id'])
    {
        $query="select name, address, password, phno, email from passengerinfo where id=".$_GET['id']; 
        //operation or executing a query
        $query_result=mysql_query($query,$conn);
        $myrow = mysql_fetch_assoc($query_result);
    }
     mysql_close($conn);    

?>
<html>
<head>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Edit Record</title>
</head>
<body>
<center><form action="edit.php?id=<?php echo $_GET['id']?>" method="post" style="width: 300px; border: 2px solid black; border-radius: 10px 10px 10px 10px; background-color: lightblue;">
<strong>Name</strong><br/><input class="form-control input-sm" type="text" name="name" value="<?php echo $_POST?$_POST['name']:$myrow['name']?>" /> <br/>
<strong>Address</strong><br/><input class="form-control input-sm" type="text" name="address" value="<?php echo $_POST?$_POST['address']:$myrow['address']?>" /> <br/>
<strong>Password</strong><br/><input class="form-control input-sm" type="password" name="password" value="<?php echo $_POST?$_POST['password']:$myrow['password']?>" /> <br/>
<b>Contact NO</b><br/><input class="form-control input-sm" type="tel" name="phno" value="<?php echo $_POST?$_POST['name']:$myrow['phno']?>" /> <br/>
<b>Email</b><br/><input class="form-control input-sm" type="email" name="email" value="<?php echo $_POST?$_POST['address']:$myrow['email']?>" /> <br/>
<input class="btn btn-default" type="submit" value="Update Record"/>
 </form>
 </center>
 </body>
 </html>
