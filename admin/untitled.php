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
            <li><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="#">CRUD Operation</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Users</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Help</a></li>
            <li><a href="">About</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Bus Details <a class="btn btn-default" href="addnew.php" role="button">Add New Details</a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Bus No</th>
                  <th>Travel Company</th>
                  <th>Seats</th>
                  <th>Price</th>
                 
                </tr>
              </thead>

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
    //preparing a query
    $query="select * from businfo";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    { 
    echo '<tbody> <tr>';
     echo '<td>'.$myrow['bus'].'</td>';
     echo '<td>'.$myrow['busno'].'</td>';
     echo '<td>'.$myrow['travels'].'</td>';
     echo '<td>'.$myrow['seats'].'</td>';
     echo '<td>'.$myrow['price'].'</td>';
     echo '<td><a href="" data-toggle="modal" data-target="#myModal'. $myrow['busno'].'">Edit</a>
 <!-- Modal -->
  <div class="modal fade" id="myModal'. $myrow['busno'].'" role="dialog">
    <div class="modal-dialog">  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$myrow['bus'].' - Details</h4>
        </div>
        <div class="modal-body">
<iframe src="edit.php?id='. $myrow['busno'].'" frameborder="0" height="600" width="400px" style="margin-top: -20px;"></iframe>
        </div>
      </div>
      <!-- End Of Modal content-->
          </div>
  </div>
      <!-- End Of Modal-->
      <a href="">Delete</a>
    <a href="" data-toggle="modal" data-target="#myModal'. $myrow['busno'].'">Full Details</a>
 <!-- Modal -->
  <div class="modal fade" id="myModal'. $myrow['busno'].'" role="dialog">
    <div class="modal-dialog">  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$myrow['bus'].' - Details</h4>
        </div>
        <div class="modal-body">
        Bus Name : '.$myrow['bus'].'<br/>
        Bus No. :'.$myrow['busno'].'<br/>
        Travel Company:'.$myrow['travels'].'<br/>
        Seats :'.$myrow['seats'].'<br/>
        Price :'.$myrow['price'].'

        </div>
      </div>
      <!-- End Of Modal content-->
          </div>
  </div>
      <!-- End Of Modal--></td>';
     echo '</tr></tbody>';

    } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);


?>          </table>
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
