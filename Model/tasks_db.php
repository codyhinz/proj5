<?php 

    function get_tasks() {
        global $db;
        $query = "SELECT * FROM tasks ORDER BY taskID";
        $statement = $db->prepare($query);
        $statement->execute();
        $tasks = $statement->fetchAll();
        $statement->closeCursor();
        return $tasks;
    }

    function get_task_name($task_id)  {
        if (!$task_id) {
            return "All tasks";
        }
        global $db;
        $query = "SELECT * FROM tasks WHERE taskID = :task_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':task_id', $task_id);
        $statement->execute();
        $task = $statement->fetch();
        $statement->closeCursor();
        $task_name = $task['taskName'];
        return $task_name;
    }

    function delete_task($task_id) {
        global $db;
        $query = "DELETE FROM tasks WHERE taskID = :task_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':task_id', $task_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_task($task_name) {
        global $db;
        $query = "INSERT INTO tasks (taskName) VALUES (:taskName)";
        $statement = $db->prepare($query);
        $statement->bindValue(':taskName', $task_name);
        $statement->execute();
        $statement->closeCursor();
    }