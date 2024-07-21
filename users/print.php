<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Save the Bus Ticket</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
Print or Save the Ticket details<br><br>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content" style="width: 400px;">
<strong>Ticket Reservation Details</strong><br><br>
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
$id=$_GET['id'];
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$row1=$rows['bus'];
		$resulta = mysql_query("SELECT * FROM businfo WHERE id='$row1'");
    echo '<b>Bus No: </b>'. $rows['bus'].'<br>';
    echo '<b>Number of Seats :</b>'. $rows['seat_reserve'].'<br>';
		echo '<b>Seat Numbers: </b>'. $rows['seat'].'<br>';
    echo '<b>Confirmation Code: </b>'.$id.' (Confirmation Code is need to verify the booking)<br>';
	}
?>
</div>
<a href="index.php">Home</a>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">