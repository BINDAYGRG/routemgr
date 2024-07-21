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

    $slquery = "SELECT * FROM businfo WHERE busno = '".$_POST['busno']."'";
    
    $selectresult = mysql_query($slquery, $conn);
    if(mysql_num_rows($selectresult)>0)
    {
      echo "<script>
       alert('The Bus you are tryinh to add is already added, please edit or delelte if you want.');
       document.getElementById('busno').style.borderColor = '#E34234';
       </script>" ;
    }
    else
    {
    //operation or executing a query
    $query="INSERT INTO `businfo` (`busno`,`bus`,`travels`,`source`,`destination`,`departure`,`seats`,`price`) values('".$_POST['busno']."','".$_POST['bus']."','".$_POST['travels']."','".$_POST['source']."','".$_POST['destination']."','".$_POST['departure']."','".$_POST['seats']."','".$_POST['price']."')"; 
    $query_result=mysql_query($query,$conn);
    header("Location: addnew.php?message=record+added");
    mysql_close($conn);
    if($query_result)
        header("Location: buses.php");
}
}   

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Admin - Route Management System - DashBoard</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles.css" rel="stylesheet">

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Route Sewa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../" target="new">Visit Site</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../admin">Overview <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="#">CRUD Operation</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Users</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Appearance</a></li>
            <li><a href="">Help</a></li>
            <li><a href="">About</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Add New Bus Details - Route Sewa</h2>
         
                            <div>
    <div class="col-md-6" style="margin-top:25px;">
        <form action="addnew.php" method="POST" class="form-horizontal">
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Bus No.</label> 
        <div class="input-group"><input type="text" required="true" name="busno" id="busno" value="<?php echo $_POST?$_POST['busno']:''?>" placeholder="Enter the Bus No." autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Bus Name</label> 
        <div class="input-group"><input type="text" name="bus" placeholder="Enter the Bus Name" required="true" value="<?php echo $_POST?$_POST['bus']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Travel Company</label> 
        <div class="input-group"><input type="text" name="travels" placeholder="Enter the Name of Travel Company" required="true" value="<?php echo $_POST?$_POST['travels']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Source</label> 
        <div class="input-group"><input type="text" name="source" placeholder="Enter the Source Place" required="true" value="<?php echo $_POST?$_POST['source']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Destination</label> 
        <div class="input-group"><input type="text" name="destination" placeholder="Enter the Destination Place" required="true" value="<?php echo $_POST?$_POST['destination']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Departure Time</label> 
        <div class="input-group"><input type="time" name="departure" placeholder="Enter the Departure time of Bus" required="true" value="<?php echo $_POST?$_POST['departure']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Total Seats</label> 
        <div class="input-group"><input type="text" name="seats" placeholder="Enter the Total No. of Seats" required="true" value="<?php echo $_POST?$_POST['seats']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Price of Seat</label> 
        <div class="input-group"><input type="text" name="price" placeholder="Enter the Rate of 1 Seat" required="true" value="<?php echo $_POST?$_POST['price']:''?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group">
        <div class="col-md-offset-3 col-md-8">
        <input type="submit" value="Add Details" class="ui-commandlink ui-widget btn btn-success btn-lg" />
        </div>
        </div>
        </form>
</div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
