<?php
session_start();
if(isset($_SESSION['ticketsdata']))
{
    unset($_SESSION['ticketsdata']);
    unset($_SESSION['ticketsdata']);
    header("Location: index.php");
}
else
{

if($_POST)
{
    if($_POST['source'] && $_POST['destination']){
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
        
        $query="SELECT * from businfo where source='".$_POST['source']."' AND destination='".$_POST['destination']."'"; //die($query);
        //operation or executing a query
        $query_result=mysql_query($query,$conn);
        if($query_result)$myrow = mysql_fetch_assoc($query_result);
        
        
        if(!$query_result)
        {
            echo "Bus Not Found";
        }
        else if(!empty($myrow))
        {
            if($_POST['destination']==$myrow['destination'])
            {
                $_SESSION['ticketsdata']=$_POST['source'];
                $_SESSION['ticketsdata2']=$_POST['destination'];
                header("Location: select-seat.php");
            }
            else
            {
                //bus not found
              echo"<script>alert('Bussss Not Found');</script>";

            }
        }
        else
        {
            //incorrect login
            echo"<script>alert('Bus Not Found');</script>";
        }
       mysql_close($conn);     
    }
    else
    {
        echo"<script>alert('Input All Field');</script>";
    } 
} 
}
?>
<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" type="text/css" href="nepalidate/nepali.datepicker.v2.min.css" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="carousel.css">
	<title>Pokhara Route Management System</title>
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
          <img style="margin-left: -15px;" src="imagess/bus.png">  <a class="navbar-brand" href="#">Route Sewa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="margin-left: 5px;">
              <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
<?php
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
                <li><a href="users/dashboard.php">Profile</a></li>
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
?>

         </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <!-- body -->
          <div class="container" style="min-height: 400px">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 " style="box-shadow:0px 10px 15px 0px rgba(50, 50, 50, 0.75); border-radius: 6px; border:1px solid powderblue ;background:#fff">
<form method="post" action="index.php" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">From Address</label>
                                    <select class="form-control" required="true" name="source" value="<?php echo $_POST?$_POST['source']:''?>" style="width:100%;margin-top: 5px;border-radius:3px;padding:6px 5px;border: 1px solid #ccc;">
						<?php
						include('db.php');
						$result = mysql_query("SELECT DISTINCT source FROM businfo");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['source'].'">';
								echo $row['source'];
								echo '</option>';
							}
						?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label" style="margin-top: -15px;">To Address</label>
                                    <select class="form-control" id="destination" placeholder="Destination Address (eg. Kathmandu)" required="true" name="destination" value="<?php echo $_POST?$_POST['destination']:''?>" style="margin-top: 5px; border-radius:3px;padding:6px 5px;border: 1px solid #ccc;">

						<?php
						include('db.php');
						$result = mysql_query("SELECT DISTINCT destination FROM businfo");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['destination'].'">';
								echo $row['destination'];
								echo '</option>';
							}
						?>

                                    </select>
                                </div>
                            </div>
                            <br/>
                               <div class="form-group">
                                <div class="col-sm-12"><input type="submit" name="searchbuses" value=" Search Buses" class="ui-commandlink ui-widget btn btn-warning" style="width:100%;" />
                                </div>
                                </div>


</form>
</div>


     <div style="border-color: black;height: 300px;" class="col-md-7 hidden-xs hidden-sm"><div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 300px;">


    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="border: 1px solid powderblack;border-radius: 6px;box-shadow:0px 5px 5px 0px rgba(50, 50, 50, 0.75);" role="listbox" style="height: 300px;">



        <!--BENCHMARK--> 

        <div class="item active">
            <div class="col-md-12">
                <div class="col-md-5" style="padding: 0px">
                    <h3 style="color: lightcoral;font-weight: bold">Miteri Yatayat</h3>

                    <output>&gt;Wi-Fi</output>
                    <output>&gt;A/c and fan system</output>

                    <output>&gt;Music system</output>
                    <output>&gt;Comfortable seats</output>
                    <output>&gt;First aid kits</output>
                    <output>&gt;Mobile Charger</output>
                    <output>&gt;Mineral Water</output>
                    <output>&gt;Experienced And Friendly Staffs</output>
                    <output>&gt;On Time Departure</output>
                </div>
                <div class="col-md-7" style="margin-top: 20px">
                    <img class="img-thumbnail" src="imagess/Miteri-2.jpg" alt="..." />
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-md-12">
                <div class="col-md-5" style="padding: 0px">
                    <h3 style="color: lightcoral;font-weight: bold">Travel One Nepal</h3>

                    <output>&gt;Wi-Fi</output>
                    <output>&gt;A/c and fan system</output>

                    <output>&gt;Music system</output>
                    <output>&gt;Comfortable seats</output>
                    <output>&gt;First aid kits</output>
                    <output>&gt;Mobile Charger</output>
                    <output>&gt;Mineral Water</output>
                    <output>&gt;Experienced And Friendly Staffs</output>
                    <output>&gt;On Time Departure</output>
                </div>
                <div class="col-md-7" style="margin-top: 40px">
                    <img class="img-thumbnail" src="imagess/travelOne.jpg" alt="..." />
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!--BENCHMARK--> 



        <!--BENCHMARK--> 

        <div class="item">
            <div class="col-md-12">
                <div class="col-md-5" style="padding: 0px">
                    <h3 style="color: lightcoral;font-weight: bold">Benchmark Travels</h3>

                    <output>&gt;Wi-Fi</output>
                    <output>&gt;A/c and fan system</output>

                    <output>&gt;Music system and LED Tv</output>
                    <output>&gt;Comfortable seats with belt</output>
                    <output>&gt;First aid kits</output>
                    <output>&gt;Fire Extinguisher</output>
                    <output>&gt;European Standard Emission coach</output>
                    <output>&gt;Air Suspension for extra luxury</output>
                    <output>&gt;Doctor on call</output>
                </div>
                <div class="col-md-7" style="margin-top: 40px">
                    <img class="img-thumbnail" src="imagess/benchmark.jpg" alt="..." />
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item">
            <div class="col-md-12">
                <div class="col-md-5" style="padding: 0px">
                    <h3 style="color: lightcoral;font-weight: bold">Palpasa Ujyalo</h3>
                    <output>&gt;Wi-Fi</output>
                    <output>&gt;Comfortable Seats</output>
                    <output>&gt;LED Tv</output>
                    <output>&gt;Air Cooler</output>
                    <output>&gt;Mineral Water and Snacks</output>
                    <output>&gt;Passenger Insurance</output>
                    <output>&gt;Reading  Lights(On top of each seats)</output>

                    <output>&gt;Guaranteed quality service</output>


                </div>
                <div class="col-md-7" style="margin-top: 40px">
                    <img class="img-thumbnail" src="imagess/palpasaUjyalo.jpg" alt="..." />
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <div class="item">
            <div class="col-md-12">
                <div class="col-md-5" style="padding: 0px">
                    <h3 style="color: lightcoral;font-weight: bold">Facebook Deluxe</h3>
                    <output>&gt;Wi-Fi</output>
                    <output>&gt;Comfortable Seats</output>
                    <output>&gt;LED Tv</output>
                    <output>&gt;Air Cooler</output>
                    <output>&gt;Mineral Water and Snacks</output>
                    <output>&gt;Passenger Insurance</output>
                    <output>&gt;Reading  Lights(On top of each seats)</output>

                    <output>&gt;Guaranteed quality service</output>


                </div>
                <div class="col-md-7" style="margin-top: 40px">
                    <img class="img-thumbnail" src="imagess/facebook.jpg" alt="..." />
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span style="color: blue" class="glyphicon glyphicon-chevron-left"></span>
    </a>

    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span style="color: blue" class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
                        <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 3000
            });

        });
                        </script>
                    </div>


<div class="col-md-2  hidden-sm hidden-xs" style="padding: 0px;border-radius: 6px;">
                        <div class="panel panel-default" style="border: 1px solid powderblue;max-height: 285px;overflow:hidden;min-height: 285px; min-width: 100px; box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.75);">
                            <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b style="font-size:13px;">Latest Updates</b></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                   
                                            <Strong><a href="signup.php">Signup</a></Strong> to get More Access.</li><hr style="margin-top: -2px;">
 <?php
{

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

$result = mysql_query("SELECT * FROM `businfo` ORDER BY `businfo`.`travels` DESC");
while($row = mysql_fetch_array($result))
    {
    $travels=$row['travels'];
    echo'<strong>'. $travels.'</strong> Added <hr style="margin-top: -2px;">';
    }
}
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
</div>
      </div>
    </div> <!-- /container -->


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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/emulation.js"></script>
    <script src="js/sliderjs.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>