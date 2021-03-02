<?php 

    function get_items_by_Category($Category) {
        global $db;
        if ($Category) {
            $query = 'SELECT I.ID, I.Description, T.taskName FROM items I LEFT JOIN
            tasks T ON I.taskID = T.taskID WHERE I.taskID = :task_id ORDER BY 
            I.ID';
        } else {
            $query = 'SELECT I.ID, I.Description, T.taskName FROM items I LEFT JOIN
            tasks T ON I.taskID = T.taskID ORDER BY T.taskID';
        }

        $statement = $db->prepare($query);
        $statement->bindValue('task_id', $task_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function delete_item($item_id) {
        global $db;
        $query = 'DELETE FROM items WHERE ID = :items_id';
        $statement = $db->prepare($query);
        $statement->bindValue('items_id', $items_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_item($task_id, $description) {
        global $db;
        $query = 'INSERT INTO items (Description, Category) VALUES (:descr, :Category)';
        $statement = $db->prepare($query);
        $statement->bindValue(':descr', $description);
        $statement->bindValue(':Category', $task_id);
        $statement->execute();
        $statement->closeCursor();
    }