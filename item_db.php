<?php

function get_all_items() {
    global $db;
    $query = 'SELECT * FROM todoitems
            ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->execute();
    $all_items = $statement->fetchAll();
    $statement->closeCursor();
    return $all_items;
}

function get_items_by_category($category_id) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        //$category_id = 1;
        //$all_items = get_all_items();
        global $db;
    $query = 'SELECT * FROM todoitems
              ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();
    return $todoitems;
    } else {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE todoitems.categoryID = :category_id
              ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();
    return $todoitems;
}
}

function get_item($ItemNum) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":ItemNum", $ItemNum);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
    return $item;
}

function delete_item($ItemNum) {
    global $db;
    $query = 'DELETE FROM todoitems
              WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($Title, $Description, $category_id) {
    global $db;
    $query = 'INSERT INTO todoitems
                 (Title, Description, categoryID)
              VALUES
                 (:Title, :Description, :category_id)';
    $statement = $db->prepare($query);
    
    $statement->bindValue(':Title', $Title);
    $statement->bindValue(':Description', $Description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

?>