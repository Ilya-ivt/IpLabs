<link rel="shortcut icon" href="#">

<?php
include_once "../class/db.class.php";
DB::getInstance();
session_start();

$id = $_GET['id'];
$connect = mysqli_connect("localhost", "root", "",  "lab4");

mysqli_query($connect, "DELETE FROM `users` WHERE id = ".$_GET['id']);

header("location: /admin/listusers.php");