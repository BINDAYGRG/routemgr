<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('../db.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "delete from reserve where transactionnum='$id'";
 mysql_query("delete from passenger where transactionnum='$id'");

 mysql_query( $sql);
 header("Location: dashboard.php?Succesfully Deleted");
}

?>