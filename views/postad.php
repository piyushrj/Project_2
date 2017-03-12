<form action="sell.php" id="adform" method="POST">
    <select name="category">
        <option value="Category" selected disabled>Select Category</option>
        <option value="Books">Books</option>
        <option value="Clothing">Clothing</option>
        <option value="Electronics">Electronics</option>
        <option value="Furniture">Furniture</option>
        <option value="Sports">Sports</option>
        <option value="Vehicle">Vehicle</option>
        <option value="Others">Others</option>
    </select><br>
    <input type="text" name="title" placeholder="Item Title (Min. length 4 char)"><br>
    <textarea type="text" name="desc" placeholder="Item description (Max. length 200 char)"></textarea><br>
    <textarea type="text" name="contact" placeholder="Contact info (Min. length 4 char)"></textarea><br>
    <input type="radio" name="choice" value="donate">I want to Donate
    <input type="radio" name="choice" value="sell">I want to Sell<br>
    <input type="text" name="price" placeholder="Your Price (In Rs.)"><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
    <div class="upload-div">Upload Image: <input class="upload-img" type="file" name="image"><br></div>
    
</form>
<button type="submit" form="adform" value="Submit">Submit</button>
