<?php
    require("../controllers/config.php");
    if(!empty($_GET["category"]))
    {
        $rows=my50::query("SELECT store.item_id, store.image, store.title, store.price, users.college, store.category, store.date FROM store, users WHERE store.category=?", $_GET["category"]);
    }
    else
    {
        $rows=my50::query("SELECT store.item_id, store.image, store.title, store.price, users.college, store.category, store.date FROM store, users");
    }
    $positions=[];
    foreach($rows as $row)
    {
        if($row["title"]!==false)
        {
            $positions[] = [
                "item_id"=>$row["item_id"],
                "image"=>$row["image"],
                "title"=>$row["title"],
                "college"=>$row["college"],
                "price"=>$row["price"],
                "category"=>$row["category"],
                "date"=>$row["date"]
            ];
        }
    }
    $rows2=my50::query("SELECT name FROM users WHERE id=?",$_SESSION["id"]);
    render("storetable.php",["title"=>"Store", "positions"=>$positions, "username"=>$rows2[0]["name"]]);
    

                    
?>

