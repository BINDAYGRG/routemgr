<?php echo $_GET?$_GET['message'].'<br/>':'';?>
<table border="1">
<thead>
<tr>
<td>Id</td>
<td>Name</td>
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
    $query="select id, name from signup";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    { 
     echo '<tr><td>'.$myrow['id'].'</td>';
     echo '<td>'.$myrow['name'].'</td>';
    } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);


?>
</tbody>
    </table>
