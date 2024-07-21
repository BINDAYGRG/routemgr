<?php
session_start();
if(isset($_SESSION['admindata']))
{
    header("Location: ../admin");
}
else
{
    //print_r($_SESSION);
if($_POST)
{
    if($_POST['email'] && $_POST['password']){
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
        
        $query="select * from admin where email='".$_POST['email']."'"; //die($query);
        //operation or executing a query
        $query_result=mysql_query($query,$conn);
        if($query_result)$myrow = mysql_fetch_assoc($query_result);
        
        
        if(!$query_result)
        {
            $message="User not registered";
        }
        else if(!empty($myrow))
        {
            if($_POST['password']==$myrow['password'])
            {
                //login success
                $message='Login Success';
                $_SESSION['admindata']=$_POST['email'];
                header("Location: ../admin");
            }
            else
            {
                //invalid password
                $message="Incorrect Password";
                 $_SESSION['flashmessage'][]=$message;
            }
        }
        else
        {
            //incorrect login
            $message= 'Incorrect Login';
            $_SESSION['flashmessage'][]=$message;
        }
       mysql_close($conn);     
    }
    else
    {
        $message='Input all field';
        $_SESSION['flashmessage'][]=$message;
    } 
} }
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Admin - Login - Route Sewa</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

       <form action="login.php" class="form-signin" method="post">
        <small>This Area Is Restricted</small>
       <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
        <div class="input-group"><input type="email" name="email" id="email" placeholder="Your Email Address" required="true" value="<?php echo $_POST?$_POST['email']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        </div>
        </div>
        <div class="form-group">
        <div class="input-group"><input type="password" name="password" placeholder="Your Password" required="true" value="<?php echo $_POST?$_POST['password']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
      
        </div>
        </div>
        <div class="form-group">
        <center><input type="submit" value="signin" class="ui-commandlink ui-widget btn btn-success btn-lg"/></center>
        </div>
        </div>
        </form>
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
