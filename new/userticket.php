<?php
if(!(isset($_SESSION['ticketsdata'])))
{
  header("Location: /routemgr");
}
else
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

$qty=$_POST['qty'];
$date=$_POST['date'];
$result = mysql_query("SELECT * FROM businfo WHERE source='".$_SESSION['ticketsdata']."'");
while($row = mysql_fetch_array($result))
    {
        $numofseats=$row['seats'];
        $busno=$row['busno'];
        $query = mysql_query("SELECT sum(seat_reserve) FROM reserve where date = '$date'");
                            while($rows = mysql_fetch_array($query))
                              {
                              $inogbuwin=$rows['sum(seat_reserve)'];
                              }
        $avail=$numofseats-$inogbuwin;
        $seatnum=$inogbuwin+1;
    }
?>
<?php
if ($avail < $qty){
echo '<center>Oops! There are '.$avail .' Seats Available on This Bus</center>';
}
else if($avail > 0)
{
?>
<div id="stylized" class="myform">

<form id="form" name="form" action="save.php" method="post">
<input type="hidden" value="<?php echo $busno ?>" name="busno" />
<input type="hidden" value="<?php echo $email ?>" name="email" />
<input type="hidden" value="<?php echo $date ?>" name="date" />
<input type="hidden" value="<?php echo $qty ?>" name="qty" />
<label>Seat Number</label>
<input class="form-control input-lg" type="text" name="seatnum" value="
<?php
$N = $qty;
for($i=0; $i < $N; $i++)
{
echo $i+$seatnum.', ';
} 
 ?>
" id="name" readonly/><br>
<label>Your Name</label>
<input class="form-control input-lg" type="text" name="name" name="name" readonly="readonly" value="<?php echo $myrow['name']?>" required="true"><br/>
<label>Address</label>
<input class="form-control input-lg" type="text" name="address" value="<?php echo $myrow['address']?>" readonly="readonly" required="true"/><br>
<label>Contact</label>
<input class="form-control input-lg" type="tel" name="contact" readonly="readonly"  value="<?php echo $myrow['phno']?>" required="true"/><br>
<button type="submit" class="btn btn-default btn-lg">Confirm</button>
</form>
</div>
<?php
}
else if($avail <= 0)
{
echo '<center>no available seats</center>';
}}
?>