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

$seats=$_GET['id'];
$result = mysql_query("SELECT * FROM businfo WHERE busno='$seats'");
while($row = mysql_fetch_array($result))
	{
	$seats=$row['seats'];
	}
?><p style="margin-left: 30px;">Total No. Of Seats</p><br/>
<div style="border:1px solid blue; padding:10px 5px; border-radius:5px; width: 226px;">
<?php
$N = $seats+1;
for($i=1; $i < $N; $i++)
{
echo '<input type="button" style="border:none; width:23px; padding:2px; margin:2px;" value="'.$i.'" />';
}
}
?>
</div>