<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap core CSS -->
     <link rel="stylesheet" type="text/css" href="nepalidate/nepali.datepicker.v2.min.css" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="sliderjs.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="carousel.css">
    <title>Confirm Your Booking</title>
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
<?php
session_start();
if(isset($_SESSION['passengerdata']))
{
//print_r($_SESSION);

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
    //preparing a query
    $query="select * from passengerinfo where email= '".$_SESSION['passengerdata']."'";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    {
        $email=$myrow['email'];
echo '<li class="active" class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
Hello, ';
     echo $myrow['name'];
     echo ' <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul></li></ul>


        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" height="100%;">
';
include('new/userticket.php');
 } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);
}
    else
    {

            echo'<li><a href="signup.php">Signup</a></li>
            <li><a href="signin.php">Signin <span class="sr-only">(current)</span></a></li></ul>


        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" height="100%;">
';

include('new/notuser.php');
    }
?>
<footer>
<div id="boxshadow">
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

         <script type="text/javascript" src="nepalidate/nepali.datepicker.v2.min.js"></script>
     <script>
    $(document).ready(function(){
        $('#nepaliDate').nepaliDatePicker({
            ndpEnglishInput: 'englishDate'
        });
        $('#nepaliDate1').nepaliDatePicker({
            onChange: function(){
                ($('#nepaliDate1').val());
            }
        });

    });
    $(document).ready(function() {
    $(".expanded").hide();

    $(".collapsed, .expanded").click(function() {
        $(this).parent().children(".collapsed, .expanded").toggle();
    });
});
</script>
</body></html>

