
<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
//we use this to safely get the email to display
$email = "";
if (isset($_SESSION["user"]) && isset($_SESSION["user"]["email"])) {
    $email = $_SESSION["user"]["email"];
}
?>
<p>Welcome, <?php echo $email; ?></p>

 <p> Top 10 Weekly Scores: </p> 
<?php $type = "weekly"; include(__DIR__. "/partials/leaderboards.php");?>

 <p> Top 10 Monthly Scores: </p>
<?php $type = "monthly"; include(__DIR__. "/partials/leaderboards.php");?>

 <p> Top 10 LifeTime Scores: </p> 
<?php $type = "lifetime"; include(__DIR__. "/partials/leaderboards.php");?>

<?php require(__DIR__ . "/partials/flash.php"); ?>
