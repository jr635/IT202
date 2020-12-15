<link rel="stylesheet" href="static/css/styles.css">
<?php
//we'll be including this on most/all pages so it's a good place to include anything else we want on those pages
require_once(__DIR__ . "/../lib/helpers.php");
?>
<nav>
    <ul class="nav">
        <li><a href="home.php">Home</a></li>
        <?php if (!is_logged_in()): ?>
	    <li><a href="pongloggedout.html">Pong</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <?php if (has_role("Admin")): ?>
            <li><a href="test_create_scores.php">Create Scores</a></li>
            <li><a href="test_create_pointshistory.php">Create Points History</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()): ?>
            <li><a href="profile.php">Profile</a></li>
	    <li><a href="pong.html">Pong</a></li>
    	    <li><a href="test_list_scores.php">View Scores</a></li>
	    <li><a href="test_list_pointshistory.php">View Points History</a></li>
	    <li><a href="create_competition.php">Create A Competition</a></li>
	    <li><a href="competitions.php">All Competitions</a></li>
	    <li><a href="competitionhist.php">History Of Competitions</a></li>
	    <li><a href="my_competitions.php">My Competitions</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>
