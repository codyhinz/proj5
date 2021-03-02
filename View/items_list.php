<?php include('view/header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Tasks</h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type='hidden' name="action" value="list_items">
            <select name="Category" required>
                <option value="0">View All</option>
                <?php foreach ($tasks as $task) : ?>
                <?php if ($taskID == $task['taskID']) { ?>
                    <option value="<?= $task['taskID'] ?>" selected>
                <?php } else { ?>
                    <option value="<?= $task['taskID'] ?>">
                <?php } ?>
                        <?= $task['taskName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Go</button>
        </form>
    </header>
</section>
<?php include('view/footer.php') ?>