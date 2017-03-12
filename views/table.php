<div>
    <form method="post" action="delete.php">
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
        <?php foreach ($positions as $position): ?>
        <tr>
            <td><img width=100px height=50px src=<?=($position["image"])?></td>
            <td><?=($position["title"])?></td>
            <td><?=($position["description"])?></td>
            <td><?=($position["price"])?></td>
            <td><button name=delete value=<?=($position["item_id"])?> >Delete</button></td>
        </tr>
        <?php endforeach ?>
        </table>
        </form>
</div>
        
        

