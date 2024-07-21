<html>
<head>
<title>Select Bus and Seat</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="sliderjs.js"></script>
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
    $query="select name from passengerinfo where email= '".$_SESSION['passengerdata']."'";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    {
echo '<li class="active" class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
Hello, ';
     echo $myrow['name'];
     echo ' <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul></li>';

 } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);
}
    else
    {

            echo'<li><a href="signup.php">Signup</a></li>
            <li><a href="signin.php">Signin <span class="sr-only">(current)</span></a></li>';
    }
?></ul>


        </div><!--/.nav-collapse -->
      </div>
    </nav>

<!--Body-->

    <div class="container" style="height: 100%;">
<center>
<table id="td3 boxshadow" style="box-shadow:0px 10px 15px 0px; border-radius: 6px; border:1px solid green ;background:#fff
" class="col-md-12">
<tbody>
<tr>
<td id="td2" class="col-sm-4">Travels</td>
<td id="td2" class="col-sm-2">Bus</td>
<td id="td2" class="col-sm-1">Departure</td>
<td id="td2" class="col-sm-1">Seats</td>
<td id="td2" class="col-sm-2">Price</td>
<td id="td2" class="col-sm-2"></td>
</tr>
</tbody>

</table>
</center>
<?php
if(isset($_SESSION['ticketsdata']))
{
//print_r($_SESSION);
    include('db.php');
    //preparing a query
    $query="select * from businfo where source= '".$_SESSION['ticketsdata']."' AND destination = '".$_SESSION['ticketsdata2']."'";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    {
        echo '<div><table class="col-md-12" style=" height: 70px; margin-top: 5px;background:white;border:1px; border-style: solid; border-radius: 10px 10px 10px 10px;box-shadow:0px 10px 15px 0px rgba(50, 50, 50, 0.75); border-radius: 6px; border:1px solid powderblue ;background:#fff"">';
        echo '<tbody> <tr>';
     echo'<td class="col-sm-4">'. $myrow['travels'].'</td>';
     echo'<td class="col-sm-2">'. $myrow['bus'].'</td>';
     echo'<td class="col-sm-1">'. $myrow['departure'].'</td>';
     echo'<td class="col-sm-1">'. $myrow['seats'].'</td>';
     echo'<td class="col-sm-2">'. $myrow['price'].'</td><td class="col-sm-2"><!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal'. $myrow['busno'].'">View Seats</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal'. $myrow['busno'].'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select the available seat/s</h4>
        </div>
        <div class="modal-body"><table>
       <td><iframe src="viewseats.php?id='. $myrow['busno'].'" width="380px" height="260px" frameborder="0"></iframe></td>
              <td><form action="confirmpage.php" method="post" onsubmit="return validateForm()" style="margin-bottom:none;">
                           <span style="margin-right: 11px;">Enter the Date: <input id="form-control" type="date" name="date" id="date" required="true" /></span><br/><br/>
                        <span style="margin-right: 11px;">No. of Passenger: 
                        <select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        </select>
                        </span><br><br>
                        <input type="submit" id="submit" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
</form></td></table>
        </div>
      </div>
      <!-- End Of Modal content-->
    </div>
  </div>
      <!-- End Of Modal-->
  </td>
  </div></td></tr></tbody>
</table>
</div><!-- End of Container1-->';
 } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);
}
    else
    {

            echo'Not Found Any Bus, You will be redirected to Home page.';
            header("Location: /routemgr");
    }
?>



</div></div>
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
    <script type="text/javascript">
    <script>valDate = new Date();
    var date1 = document.getElementById("date").value;
      function validateform() {
    var dateTocheck = newdate("date1");
    if (dateTOcheck < valDate) {
alert("Tickets can not be issued for Past");
}

}
    </script>

</body></html>

