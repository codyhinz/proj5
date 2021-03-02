<?php 
    require('model/database.php');
    require('model/items_db.php');
    require('model/tasks_db.php');

    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $task_name = filter_input(INPUT_POST, 'task_name', FILTER_SANITIZE_STRING);

    $task_id = filter_input(INPUT_POST, 'task_id', FILTER_VALIDATE_INT);

    if (!$task_id) {
        $task_id = filter_input(INPUT_GET, 'task_id', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_items';
        }
    }

    swtich($action)
    {
        default:
            $task_name = get_task_name($task_id);
            $tasks = get_tasks();
            $items = get_items_by_Category($task_id);
            include('view/items_list.php');
    }