<?php
    
    $rows=my50::query("SELECT item_id, image, title, description, price, date FROM store WHERE user_id=?",$_SESSION["id"]);
    $rows2=my50::query("SELECT name from users WHERE id=?",$_SESSION["id"]);

    $positions=[];
    foreach($rows as $row)
    {
        if($row["title"]!==false)
        {
            $positions[] = [
                "title"=> $row["title"],
                "image"=> $row["image"],
                "description"=> $row["description"],
                "price"=> $row["price"],
                "date"=> $row["date"],
                "item_id"=>$row["item_id"]
                ];
        }
    }
    render("dashboard.php",["title"=> "Dashboard", "positions"=>$positions, "username"=>$rows2[0]["name"] ]);

?>
