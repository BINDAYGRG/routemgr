<?php
        session_start();
        unset($_SESSION['admindata']);
        header("Location: ../admin");
?>