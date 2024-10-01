<?php require_once "inc/header.php";?>
<?php
require_once 'functions.php';
$tasks = json_decode(file_get_contents("tasks.json"), true);
if (isset($_GET['priority'])) {
    $filtered_tasks = [];
    foreach ($tasks as $task) {
        if ($task['priority'] == $_GET['priority']) {
            $filtered_tasks[] = $task;
        }
    }
    $tasks = $filtered_tasks;
}
?>
<h1 class="text-center my-3 p-2">All Tasks</h1>
<div class="col-12">
    <?php if (count($tasks)): ?>
    <div class="cont-stats my-3 p-0">
        <a href="index.php?priority=low" class="btn btn-info my-2">Low</a>
        <a href="index.php?priority=high" class="btn btn-danger my-2">High</a>
        <a href="index.php?priority=normal" class="btn btn-warning my-2">Normal</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
$i = 1;
foreach ($tasks as $key => $task): ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $task['title']; ?></td>
                <td><?php echo typePriority($task['priority']); ?></td>
                <td>
                    <a href="edit-task.php?id=<?=$task['id']?>" class="btn btn-info mx-2">Edit</a>
                    <a href="delete-task.php?id=<?=$task['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
<?php endforeach;?>
        </tbody>
    </table>
<?php else: ?>
        <div class="alert alert-info text-center">Thier is No Tasks </div>
<?php endif;?>
</div>
<?php require_once "inc/footer.php";
