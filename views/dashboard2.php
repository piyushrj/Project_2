    <?=("<h1>Welcome, {$username}!</h1><br>")?>
    <?=("<a href=sell.php>Sell Item</a><br>")?>
    <?=("<a href=store.php>Go to store</a><br>")?>
    <?=("<a href=logout.php>Logout</a><br>")?>     
    <div>
        
             <table>
                <tr>
                     <td>Image</td>
                     <td>Title</td>
                     <td>Description</td>
                     <td>Price</td>
                     <td>Date</td>
                     <td>Contact</td>
                </tr>
                <?php foreach ($positions as $position): ?>
                <tr>
                    <td><img width=150px height=100px src=<?="./uploads/".($position["image"]).".jpg"?> alt="item's image"></td>
                    <td><?=($position["title"])?></td>
                    <td><?=($position["description"])?></td>
                    <td><?=($position["price"])?></td>
                    <td><?=($position["date"])?></td>
                    <td><?=($position["contact"])?></td>
                </tr>
                <?php endforeach ?>
            </table>
        
     </div>

