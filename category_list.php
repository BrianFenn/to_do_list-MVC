<?php include 'view/header.php'; ?>
<main>
    <h1>My To Do List</h1>

    

    <section>
        <!-- display a table of products -->
        <h2>Category List</h2>
        <table>
            <tr>
                
                <th>Name</th>
                
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($categories as $category) : ?>
            <tr>
                
                <td><?php echo $category['categoryName']; ?></td>
                
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_category">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['category_id']; ?>">
                    
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_category">

        <label>Add Category:</label>
        
        <br>

        <label>Name</label>
        <input type="text" name="categoryName" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Category" />
        <br>
    </form>

        <p class="last_paragraph">
            <a href="index.php?action=list_items">View To Do List</a>
        </p>
    </section>
</main>
<?php include './view/footer.php'; ?>
