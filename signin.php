<?php
session_start();
if(isset($_SESSION['passengerdata']))
{header("Location: index.php");
}
else
{

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
        
        $query="select * from passengerinfo where email='".$_POST['email']."'"; //die($query);
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
                $_SESSION['passengerdata']=$_POST['email'];
                header("Location: index.php");
            }
            else
            {
                //invalid password
            include("alert/alertpass.php");
            }
        }
        else
        {
            //incorrect login
            include("alert/alert.php");
        }
       mysql_close($conn);     
    }
} }
?>
<html>
<head>
<title>Log In Form</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/alert.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="carousel.css">
    <title>Sign Up! - Pokhara Route Management System</title>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/routemgr"><img style="margin-left: -15px;" src="imagess/bus.png">  <a class="navbar-brand" href="/routemgr">Route Sewa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="margin-left: 5px;">
              <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php">Signup</a></li>
            <li class="active"><a href="./">Signin <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="height: 100%;">
     <div class="jumbotron">
     <h3>Sign In to Get More Access <small>It's FREE !</small></h3>
      </div>
                          <div class="row">
                        <div class="col-md-12">
                            <div>
    <div class="col-md-6" style="margin-top:25px;">
        <form action="signin.php" onsubmit="return checkpw()" method="post" class="form-horizontal">
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Email</label> 
        <div class="input-group"><input type="email" name="email" id="email" placeholder="Enter Your Email Address" required="true" value="<?php echo $_POST?$_POST['email']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Password</label> 
        <div class="input-group"><input type="password" name="password" id="pass" required="true" value="<?php echo $_POST?$_POST['password']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-lock"></span>
        </div>
        </div>
        <div class="form-group">
        <div class="col-md-offset-3 col-md-8">
        <input type="submit" value="signin" class="ui-commandlink ui-widget btn btn-success btn-lg" />
        </div>
        </div>
        </form>
</div>
</div>
   	</div>  
    </div>
</div></div>

        <div style="box-shadow:0px 10px 15px 0px rgba(50, 50, 50, 0.75); border-radius: 6px; border:1px solid powderblue ;background:#fff">
            <div class="container">
                <footer>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3">
                                <h5 style="margin-left: 40px;">Top Routes</h5>
                                <ul>
                                    <li>Kathmandu-Delhi</li>
                                    <li>Pokhara-Delhi</li>
                                    <li>Kathmandu-Dharan</li>
                                    <li>Kathmandu-Kakadvitta</li>
                                    <li>Kathmandu-Pokhara</li>
                                    <li>Kathmandu-Biratnagar</li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <h5 style="margin-left: 40px;">Top Operators</h5>
                                <ul >
                                    <li>Super Golden Ac</li>
                                    <li>Bangalamukhi Deluxe</li>
                                    <li>Palpasa Deluxe</li>
                                    <li>Apple Deluxe</li>
                                    <li>Namaste Deluxe</li>
                                    <li>Jeet Deluxe</li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <h5 style="margin-left: 40px;">Top Operators</h5>
                                <ul >
                                    <li>Super Golden Ac</li>
                                    <li>Bangalamukhi Deluxe</li>
                                    <li>Palpasa Deluxe</li>
                                    <li>Apple Deluxe</li>
                                    <li>Namaste Deluxe</li>
                                    <li>Jeet Deluxe</li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <h5 style="margin-left: 40px;">Top Operators</h5>
                                <ul >
                                    <li>Super Golden Ac</li>
                                    <li>Bangalamukhi Deluxe</li>
                                    <li>Palpasa Deluxe</li>
                                    <li>Apple Deluxe</li>
                                    <li>Namaste Deluxe</li>
                                    <li>Jeet Deluxe</li>
                                </ul>
                            </div>
                    </div></div></footer></div></div>
<div id="footertext">
    <?php 
  include("footer.php");
  ?>
</div>
    <script src="js/emulation.js"></script>
    <script src="js/sliderjs.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
    	function checkpw() {
    var pass1 = document.getElementById("pass").value;
    var pass2 = document.getElementById("re-pass").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass").style.borderColor = "#E34234";
        document.getElementById("re-pass").style.borderColor = "#E34234";
        document.getElementById("re-pass").placeholder = "Enter the Same password that you have entered above";
        document.getElementById("re-pass").type = "text";
        ok = false;
    }
    else {
        //alert("Passwords Match!!!");
    }
    return ok;
}
    </script>
</body></html>

