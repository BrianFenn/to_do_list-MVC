<?php include './view/header.php'; ?>
<main>
    <h1>Item List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
        <ul>
        <?php foreach ($categories as $category) : ?>
            <li>
            <a href="?category_id=<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                
                <th>Title</th>
                <th class="right">Description</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todoitems as $item) : ?>
            <tr>
                
                <td><?php echo $item['Title']; ?></td>
                <td class="right"><?php echo $item['Description']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_item">
                    <input type="hidden" name="ItemNum"
                           value="<?php echo $item['ItemNum']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $ItemNum['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add Item</a>
            <br>
            <a href="?action=show_view_edit_categories_form">View/Edit Categories</a>
        </p>
    </section>
</main>
<?php include './view/footer.php'; ?>