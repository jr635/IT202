<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>
    <form method="POST">
        <label>Reason</label>
        <input name="reason" placeholder="Reason"/>
        <label>Points Change</label>
        <input type="number" min="1" name="points_change"/>
        <input type="submit" name="save" value="Create"/>
    </form>

<?php
if (isset($_POST["save"])) {
    //TODO add proper validation/checks
    $reason = $_POST["reason"];
    $pc = $_POST["points_change"];
    $user = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO PointsHistory (reason, points_change, user_id) VALUES(:reason, :pc, :user)");
    $r = $stmt->execute([
        ":reason" => $reason,
        ":pc" => $pc,
        ":user" => $user
    ]);
    if ($r) {
        flash("Created successfully with id: " . $db->lastInsertId());
    }
    else {
        $e = $stmt->errorInfo();
        flash("Error creating: " . var_export($e, true));
    }
}
?>
<?php require(__DIR__ . "/partials/flash.php");
