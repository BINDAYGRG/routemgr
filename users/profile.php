<html>
<head>
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" charset="utf-8">
<title>Dashboard</title>
</head>
<body>
    <div id="container">
        <div id="adminbar-outer" class="radius-bottom">
            <div id="adminbar" class="radius-bottom">
                <a id="logo" href="dashboard.php"></a>
                <div id="details">
                    <a class="avatar">
                    <img width="36" height="36" alt="avatar" src="../imagess/avatar.jpg">
                    </a>
                    <div class="tcenter">
                    Hi
                    <?php
                    session_start();
if(isset($_SESSION['passengerdata']))
{
                    include("../db.php");
                    $query="select name from passengerinfo where email= '".$_SESSION['passengerdata']."'";
    //operation or executing a query
    $query_result=mysql_query($query,$conn);
    
    
    while ($myrow = mysql_fetch_assoc($query_result) )
    {
     echo '<strong>' .$myrow['name'].'!</strong>';
     echo '
                 <br>
                    <a class="alightred" href="logout.php">Logout</a>';
 } 
    
    mysql_free_result($query_result); 
    mysql_close($conn);
}
    else
    {
header("Location: /routemgr");
    }
?>
                    </div>
                </div>
            </div>
        </div>
        <div id="panel-outer" class="radius" style="opacity: 1;">
            <div id="panel" class="radius">
                <ul class="radius-top clearfix" id="main-menu">
                    <li>
                        <a href="dashboard.php">
                            <img alt="Dashboard" src="../imagess/m-dashboard.png">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="active"  href="profile.php">
                            <img src="../imagess/profile.jpg">
                            <span>Profile</span>
                        </a>
                    </li>
                    <div class="clearfix"></div>
                </ul>
                <div id="content" class="clearfix">
                    <table cellpadding="1" cellspacing="1" id="resultTable">
                        <thead>
                            <tr>
                                <th  style="border-left: 1px solid #C1DAD7"> Name </th>
                                <th> Address </th>
                                <th> Contact No. </th>
                                <th> Email Address </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include('../db.php');
                            $result = mysql_query("SELECT * FROM passengerinfo where email= '".$_SESSION['passengerdata']."'");
                            while($row = mysql_fetch_array($result))
                                {
                                    echo '<tr class="record">';
                                    echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['name'].'</td>';
                                    echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['address'].'</td>';
                                    echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['phno'].'</td>';
                                    echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['email'].'</td>';
                                    echo '<td style="border-left: 1px solid #C1DAD7; text-align: center;"><a href="edit.php?id='.$row['id'].'">Edit</a></td>';

                                }
                            ?> 
                        </tbody>
                    </table>
                </div>
                <div id="footer" class="radius-bottom">
                    2016, Route Management System</a>
            </div>
        </div>
    </div>
</body>
</html>