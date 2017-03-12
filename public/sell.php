<?php 
        require("../controllers/config.php");
    
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
             render("postad.php", ["title" => "Postad" ]);
        }
        else if($_SERVER["REQUEST_METHOD"] =="POST")
        {
             if(empty($_POST["title"]||strlen($_POST["title"])<4))
                 apologize("You must provide the item title of minimum character length");
             else if(empty($_POST["category"]))
                apologize("You must give a category to your item");
             else if(empty($_POST["desc"])||strlen($_POST["desc"])>200)
                apologize("Please provide a valid description max 200 characters");
             else if(empty($_POST["contact"]))
                apologize("PLease provide contact information");
             else if(empty($_POST["choice"]))
                apologize("You must choose whether you wanna donate or sell you item");
             else
             {
                my50::query("INSERT INTO store (user_id,title,image,category,description,price,date,purpose,contact) VALUES(?,?,?,?,?,?,?,?,?)",$_SESSION["id"],$_POST["title"],$_POST["image"],$_POST["category"],$_POST["desc"],$_POST["price"],date('Y-m-d'),$_POST["choice"],$_POST["contact"]);
                $uname=my50::query("SELECT name FROM users WHERE id=?",$_SESSION["id"]);
                require("before_dashboard.php");

             }
        }
?>

