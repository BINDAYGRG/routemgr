
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
    $id=$_GET['id'];
    if($_POST){
        
        $query="update `businfo` set `bus`='".$_POST['bus']."', `travels`='".$_POST['travels']."', `source`='".$_POST['source']."', `destination`='".$_POST['destination']."', `departure`='".$_POST['departure']."', `seats`='".$_POST['seats']."', `price`='".$_POST['price']."' where busno='$id'";
        //operation or executing a query
        $query_result=mysql_query($query,$conn);
        
      
        if($query_result)
           
           echo '<center>Your Profile has been successfully Edited</center>';
    }
    else if($_GET['id'])
    {
        $query="select * from businfo where busno='$id'"; 
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
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div>
   <div class="col-md-6" style="margin-top:25px;">
        <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST" class="form-horizontal">
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Bus No.</label> 
        <div class="input-group"><input type="text" required="true" readonly="readonly" name="busno" value="<?php echo $_POST?$_POST['busno']:$myrow['busno']?>" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Bus Name</label> 
        <div class="input-group"><input type="text" name="bus" required="true" value="<?php echo $_POST?$_POST['bus']:$myrow['bus']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Travel Company</label> 
        <div class="input-group"><input type="text" name="travels" required="true" value="<?php echo $_POST?$_POST['travels']:$myrow['travels']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Source</label> 
        <div class="input-group"><input type="text" name="source" required="true" value="<?php echo $_POST?$_POST['source']:$myrow['source']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Destination</label> 
        <div class="input-group"><input type="text" name="destination" required="true" value="<?php echo $_POST?$_POST['destination']:$myrow['destination']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Departure Time</label> 
        <div class="input-group"><input type="time" name="departure" required="true" value="<?php echo $_POST?$_POST['departure']:$myrow['departure']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Total Seats</label> 
        <div class="input-group"><input type="text" name="seats" required="true" value="<?php echo $_POST?$_POST['seats']:$myrow['seats']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group"> <label style="text-align: left" class="col-md-3 control-label">Price of Seat</label> 
        <div class="input-group"><input type="text" name="price" required="true" value="<?php echo $_POST?$_POST['price']:$myrow['price']?>" autocomplete="true" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control" />
        <span class="input-group-addon"></span>
        </div>
        </div>
        <div class="form-group">
        <div class="col-md-offset-3 col-md-8">
        <input type="submit" value="Update Details" class="ui-commandlink ui-widget btn btn-success btn-lg" />
        </div>
        </div>
        </form>
</div></div>
          </div>
        </div>
      </div>
    </div>

 </body>
 </html>
