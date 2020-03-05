<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        //$category_id = 1;
        //$all_items = get_all_items();
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $todoitems = get_items_by_category($category_id);
    include('item_list.php');
} if ($action == 'list_items1') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        //$category_id = 1;
        //$all_items = get_all_items();
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $todoitems = get_items_by_category($category_id);
    include('item_list.php');
}
    else if ($action == 'delete_item') {
    $ItemNum = filter_input(INPUT_POST, 'ItemNum', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
            
    if (
            $ItemNum == NULL || $ItemNum == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('./errors/error.php');
    } else { 
        
        delete_item($ItemNum);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('item_add.php');    
} else if ($action == 'add_item') {
    
    //$ItemNum = filter_input(INPUT_POST, 'ItemNum');
    $Title = filter_input(INPUT_POST, 'Title');
    $Description = filter_input(INPUT_POST, 'Description');
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||  
            $Title == NULL || $Description == NULL || $Description == FALSE) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
        add_item($Title, $Description, $category_id);
        header("Location: .?category_id=$category_id");
    }
}
else if ($action == 'show_view_edit_categories_form') {
    //$categories = get_categories();
    $categoryID = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    //$category_name = get_category_name($categoryID);
    $categories = get_categories();
    
    include('category_list.php');   
    
    
} 

else if ($action == 'add_category') {
        
    $categoryName = filter_input(INPUT_POST, 'categoryName');
    if ($categoryName == NULL || $categoryName == FALSE) {
        $error = "Invalid category name data. Check all fields and try again.";
        include('./errors/error.php');

    } else { 
        add_category($categoryName);
        $categoryID = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
        //$category_name = get_category_name($categoryID);
        $categories = get_categories();
        include('category_list.php');
       // header("Location: category_list.php");
        //include('category_list.php'); 
    }
}

else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id');
    $categoryName = filter_input(INPUT_POST, 'categoryName');
    if ($categoryName == NULL || $categoryName == FALSE) {
        $error = "Invalid category name data. Check all fields and try again.";
        include('./errors/error.php');
    } else {
        delete_category($category_id);
        //header("index.php?action=list_items");
        include('category_list.php');
    }
}

?>
