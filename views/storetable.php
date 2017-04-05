<?=("<h1>Hello, {$username} </h1><br>")?>
<?=("<a href=sell.php>Sell Item</a><br>")?>
<?=("<a href=logout.php>Logout</a><br>")?>
<div>
<ul>
    <li><a href="store.php?">All</a></li>
    <li><a href="store.php?category=Books">Books</a></li>
    <li><a href="store.php?category=Clothing">Clothing</a></li>
    <li><a href="store.php?category=Electronics">Electronics</a></li>
    <li><a href="store.php?category=Furniture">Furniture</a></li>
    <li><a href="store.php?category=Sports">Sports</a></li>
    <li><a href="store.php?category=Vehicle">Vehicle</a></li>
    <li><a href="store.php?category=Others">Others</a></li>
</ul>
<!-- code for the dropdown college form yet to be written-->

<table style='border:1px solid black'>
    <tr>
        
        <td><h3>Image</h3></td>
        <td><h3>Title</h3></td>
        <td><h3>Price</h3></td>
        <td><h3>College</h3></td>
        <td><h3>Category</h3></td>
        <td><h3>Date</h3></td>
        <td><h3>Contact Seller</h3></td>
        
    </tr>
    <?php foreach ($positions as $position): ?>
                <tr>
                    <td><img width=150px height=100px src=<?="./uploads/".($position["image"]).".jpg"?> alt="item's image"></td>
                    <td><?=($position["title"])?></td>
                    <td><?=($position["price"])?></td>
                    <td><?=($position["college"])?></td>
                    <td><?=($position["category"])?></td>
                    <td><?=($position["date"])?></td>
                    <td><a href="seller.php?<?=("item={$position["item_id"]}")?>">Contact Seller</a></td>
                    
                </tr>
    <?php endforeach ?>
</table>
</div>


