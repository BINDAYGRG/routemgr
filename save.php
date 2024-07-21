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
function createRandomString() {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}
$confirmation = createRandomString();
$email=$_POST['email'];
$name=$_POST['name'];
$qty=$_POST['qty'];
$busno=$_POST['busno'];
$seatnum=$_POST['seatnum'];
$date=$_POST['date'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$result = mysql_query("SELECT * FROM businfo WHERE busno='$busno'");
while($row = mysql_fetch_array($result))
  {
  $price=$row['price'];
  $source = $row['source'];
  $destination = $row['destination'];
  $departure = $row['departure'];
  }
  $payable=$qty*$price;

mysql_query("INSERT INTO `passenger`(`name`, `address`, `phno`, `bus`,`source`,`destination`,`departure`, `transactionnum`, `payable`,`status`, `seatnumber`,`date`,`email`) VALUES ('$name' ,'$address' ,'$contact','$busno','$source', '$destination','$departure' ,'$confirmation' ,'$payable','Not Paid','$seatnum','$date','$email')");
mysql_query("INSERT INTO `reserve`(`date`, `bus`, `seat_reserve`, `transactionnum`, `seat`) VALUES ('$date','$busno','$qty','$confirmation','$seatnum')");
/*echo $confirmation;
echo $name;
echo $qty;
echo $busno;
echo $date;
echo $contact;
echo $address;
echo $price;
echo $payable;*/
header("location: print.php?id=$confirmation&seatnum=$seatnum");
?>