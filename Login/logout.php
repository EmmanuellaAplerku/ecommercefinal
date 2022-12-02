<?php
session_start();


unset($_SESSION['customer_id']);
unset($_SESSION['role']);
header('Location: ../index.php');

?>