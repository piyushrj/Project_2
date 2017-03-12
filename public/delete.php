<?php
    require("../controllers/config.php");
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        my50::query("DELETE FROM store WHERE item_id=?", $_POST["delete"]);
    }
    require("before_dashboard.php");
?>

