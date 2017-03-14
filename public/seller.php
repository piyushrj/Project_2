<?php
    require("../controllers/config.php");
    if(!empty($_GET["item"]))
    {
        $rows=my50::query("SELECT image, title, description, price, date, contact FROM store WHERE item_id=?",$_GET["item"]);
        $rows2=my50::query("SELECT name from users WHERE id=?",$_SESSION["id"]);

        $positions=[];
        foreach($rows as $row)
        {
            if($row["title"]!==false)
            {
                $positions[]=[
                    "image"=>$row["image"],
                    "title"=>$row["title"],
                    "description"=>$row["description"],
                    "price"=>$row["price"],
                    "date"=>$row["price"],
                    "contact"=>$row["contact"]
                    ];
            }
        }
        render("dashboard2.php",["title"=>"Dashboard", "positions"=>$positions, "username"=>$rows2[0]["name"]]);

    }

   ?>        
        

