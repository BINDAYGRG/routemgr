<?php
        session_start();
        unset($_SESSION['passengerdata']);
        $_SESSION['flashmessage'][]=$message;
        header("Location: index.php");
?>