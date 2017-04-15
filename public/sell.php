<?php 
        require("../controllers/config.php");
    
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
             render("postad.php", ["title" => "Postad" ]);
        }
        else if($_SERVER["REQUEST_METHOD"] =="POST")
        {
            
            $flag=true;
            $target_dir = "./uploads/";
            $target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file))
            {
                 $flag=true;
            } 
            else
            {
                $flag=false;
            }
            $d_image="default.jpg";
            $image=basename($d_image,".jpg");
            if((!isset($_POST["imageupload"]))&&$flag)
            {   
                
                $image=basename( $_FILES["imageupload"]["name"],".jpg");
            }    
                


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
                my50::query("INSERT INTO store (user_id,title,image,category,description,price,date,purpose,contact) VALUES(?,?,?,?,?,?,?,?,?)",$_SESSION["id"],$_POST["title"],$image,$_POST["category"],$_POST["desc"],$_POST["price"],date('Y-m-d'),$_POST["choice"],$_POST["contact"]);
                $uname=my50::query("SELECT name FROM users WHERE id=?",$_SESSION["id"]);
                require("before_dashboard.php");

             }
        }
?>

