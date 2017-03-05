

<?php

    // configuration 
    require("../controllers/config.php");

     // if user reached page via GET (as by clicking a link or via redirect)
     if ($_SERVER["REQUEST_METHOD"] == "GET")
     {
         // else render form
         render("register_form.php", ["title" => "Register"]);
     }
     // else if user reached page via POST (as by submitting a form via POST)
     else if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        if (empty($_POST["name"]))
        {
            apologize("You must provide your name.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide your email address.");
        }
        else if (empty($_POST["college"]))
        {
            apologize("You must provide your college.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if($_POST["password"]!=$_POST["confirmation"])
        {
            apologize("Passwords did not match.");
        }
        else if (empty($_POST["gender"]))
        {
            apologize("You must provide your gender.");
        }
        
        $flag=my50::query("INSERT IGNORE INTO users (name, hash, email, college, gender) VALUES(?, ?, ?, ?, ?)", $_POST["name"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"], $_POST["college"], $_POST["gender"]);
         if($flag==0)
        {
            apologize("Username already exits.");
        }
        else
        {
            $rows = my50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $id;

                
                render("dashboard.php",["title" => "dashboard"]);
        }
     }
 ?>


