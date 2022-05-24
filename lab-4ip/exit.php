<?php
session_start();



unset($_SESSION['auth']);
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['type']);
header('location: /index1.php');