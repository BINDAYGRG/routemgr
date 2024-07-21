<?php
if($_POST){
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

    $slquery = "SELECT * FROM passengerinfo WHERE email = '".$_POST['email']."'";
    $selectresult = mysql_query($slquery, $conn);
    if(mysql_num_rows($selectresult)>0)
    {
      include("alert/alertemail.php");
      echo '<script>
        document.getElementById("email").style.borderColor = "#E34234";
            </script>';
    }
    else
    {
    $query="INSERT INTO `passengerinfo`(`name`, `email`, `password`, `address`, `phno`) values('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['address']."','".$_POST['phno']."')";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    mysql_close($conn);
    if($query_result)
        header("Location: success.php");

}
}   

?>
<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="sliderjs.js"></script>
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
            <li class="active"><a href="signup.php">Signup</a></li>
            <li><a href="signin.php">Signin <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
     <div class="jumbotron">
     <h3>Sign Up! in less than 1 minute. <small>It's FREE !</small></h3>
      </div>
                          <div class="row">
                        <div class="col-md-12">
                            <div>
    <div class="col-md-6" style="margin-top:25px;">
        <form action="signup.php" onsubmit="return checkpw()" method="post" class="form-horizontal">
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Name</label> 
        <div class="input-group"><input type="text" name="name" required="true" value="<?php echo $_POST?$_POST['name']:''?>" placeholder="Enter your Full name" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-text-height"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Email</label> 
        <div class="input-group"><input type="email" name="email" id="email" placeholder="Enter Your Email Address" required="true" value="<?php echo $_POST?$_POST['email']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Password</label> 
        <div class="input-group"><input type="password" name="password" id="pass" required="true" value="<?php echo $_POST?$_POST['password']:''?>" autocomplete="true" minlength="8" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-lock"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Re-Password</label> 
        <div class="input-group"><input type="password" name="re-pass" id="re-pass" minlength="8" required="true" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-lock"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Mobile No.</label> 
        <div class="input-group"><input type="tel" name="phno" required="true" value="<?php echo $_POST?$_POST['phno']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon glyphicon glyphicon-phone"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Address</label> 
        <div class="input-group"><input type="text" name="address" id="address" required="true" value="<?php echo $_POST?$_POST['address']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon "></span>
        </div>
        </div>
        <div class="form-group">
        <div class="col-md-offset-3 col-md-8">
        <input type="submit" value="Register" class="ui-commandlink ui-widget btn btn-success btn-lg" />
        </div>
        </div>
        </form>
</div></div>
        <div class="col-sm-6">
                            <h3 class="text-success">Why Sign Up?</h3>
                            <ul class="list-unstyled">
                                <li> <span class="glyphicon glyphicon-ok"></span>  View your ticketing history.</li>
                                <li> <span class="glyphicon glyphicon-ok"></span>  Print your tickets details anytime.</li>
                                <li> <span class="glyphicon glyphicon-ok"></span>  View your personal profile.</li>
                            </ul>
                            </div>
                        </div>  
    </div>
</div></div>

        <div id="boxshadow">
            <div class="container" height="100%;">
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
                    </div>

                    </div></footer></div></div>
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

