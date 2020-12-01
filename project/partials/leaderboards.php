<?php
if(!isset($type)){
    flash("Type variable is not set");
}

switch($type){
     case "weekly":
	 $query = "SELECT score.id,username,score.created,score FROM Scores as score JOIN Users on score.user_id = Users.id AND BETWEEN (Timestamp()-(3600*24*7)) AND Timestamp() ORDER by score DESC, score.created ASC LIMIT 10";
     break; 
     case "monthly":
	 $query = "SELECT score.id,username,score.created,score FROM Scores as score JOIN Users on score.user_id = Users.id AND BETWEEN (Timestamp()-(3600*24*30)) AND Timestamp() ORDER by score DESC, score.created ASC LIMIT 10";
     break;
     case "lifetime":
	 $query = "SELECT score.id,username,score.created,score FROM Scores as score JOIN Users on score.user_id = Users.id ORDER by score DESC, score.created ASC LIMIT 10";
     break;
     default:
	 flash("That leaderboard is not valid");
     break;
}

if(isset($query)){
     $db = getDB();
     $stmt = $db->prepare($query);
     $stmt->execute();
     $scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt->errorInfo();
     if(!scores){
	$e = $stmt->errorInfo();
	flash($e[2]);
}
}
?>

<?php if (isset($scores) && !empty($scores)): ?>
      <div class="card">
      <div class="card-body">
        <div>
            <?php foreach ($scores as $r): ?>
            <div> User: <?php safer_echo($r["username"]); ?></div>
            <div> Score: <?php safer_echo($r["score"]); ?></div>
            <div> Time Achieved: <?php safer_echo($r["created"]); ?></div>
            <br>
            <?php endforeach; ?>
        </div>
     </div>
   </div>
<?php else: ?>
 <p> No Results Found </p>
<?php endif; ?>
