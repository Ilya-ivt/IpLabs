<?php
include_once "../class/db.class.php";
DB::getInstance();
session_start();

?>

<?php
$score = $_GET['score'];

$query = "SELECT * FROM users";

$res = DB::query($query);

$flag = false;

/*while (($item = DB::fetch_array($res)) != false) // #problem 3
{*/
    if ($flag)
    {
        $cur_id = $item['id'];
    }
    else
    {
        $flag = true;
    }


$query_2 = "UPDATE users
          SET score= '".$score."'
          WHERE id=".$_SESSION['id'];

DB::query($query_2);

$_SESSION['score'] = $score;

header('location: ../Game/game.php');
