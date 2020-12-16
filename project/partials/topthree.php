<?php
if(!isset($_GET["id"])){
        $id = $_GET["id"];
}

$firstplace = 0;
$secondplace = 0;
$thirdplace = 0;

$params = [];

if(isset($id)){
     $db = getDB();
     $stmt = $db->prepare("SELECT id,participants,min_score,first_place_per,second_place_per,third_place_per,rewar>
     $stmt->execute([":id" => $id]);
     $scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
     if(!$params){
        $e = $stmt->errorInfo();
        flash($e[2]);
}
}

if(isset($params) && !empty($params)):

?>
<?php if (isset($scores) && !empty($scores)): ?>
      <div class="card">
      <div class="card-body">
        <div>
            <?php foreach ($scores as $r): ?>
            <div> User: <?php safer_echo($r["username"]); ?></div>
            <div> Score: <?php safer_echo($r["score"]); ?></div>
            <br>
            <?php endforeach; ?>
        </div>
     </div>
   </div>
<?php else: ?>
 <p> No Results Found </p>
<?php endif; ?>
