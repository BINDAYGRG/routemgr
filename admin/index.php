
<?php
session_start();
if(!(isset($_SESSION['admindata'])))
{
    header("Location: login.php");
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
    <script src="search.js"></script>

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
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="buses.php">CRUD Operation</a></li>
            <li><a href="users.php">Users</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <h2 class="sub-header">Ticket Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Bus No.</th>
                  <th>Confirmation Code</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Ph.No.</th>
                  <th>Route</th>
                  <th>Departure</th>
                  <th>Seat Numbers</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include("../db.php");
                  $query="SELECT * FROM `passenger` ORDER BY `passenger`.`id` DESC";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    { 
      echo '<tr><td>'.$myrow['bus'].'</td>';
      echo '<td>'.$myrow['transactionnum'].'</td>';
      echo '<td>'.$myrow['name'].'</td>';
      echo '<td>'.$myrow['address'].'</td>'; 
      echo '<td>'.$myrow['phno'].'</td>'; 
      echo '<td>'.$myrow['source'].' - '.$myrow['destination'].'</td>'; 
      echo '<td>'.$myrow['departure'].' A.M.</td>';
      echo '<td>'.$myrow['seatnumber'].'</td>'; 
      echo '<td>'.$myrow['status'].'</td>'; 
      echo '<td><a href="deletetickets.php?id='.$myrow['id'].'">delete</a></td>     </tr>'; 
    } 
    mysql_query("UPDATE `passenger` SET `status` = 'PAID', `payable`='0' WHERE `date`<(CURDATE()-INTERVAL 2 DAY)");
    mysql_free_result($query_result); 
    mysql_close($conn);

                ?>
              </tbody>
            </table>
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
