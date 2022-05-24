<?php
session_start();



unset($_SESSION['auth']);
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['type']);
unset($_SESSION['score']);
header('location: /index1.php');