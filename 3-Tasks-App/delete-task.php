
<?php require_once "inc/header.php";?>
<?php
$success = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $tasks = json_decode(file_get_contents("tasks.json"), true);
    if (isset($tasks[$id])) {
        unset($tasks[$id]);
        file_put_contents("tasks.json", json_encode($tasks));
        $success = "Task Deleted Successfully";
    }

}
?>
<div class="col-8 mx-auto">
    <?php if ($success): ?>
        <div class="alert alert-success mb-1 p-1 "><?php echo $success; ?></div>
    <?php else: ?>
        <div class="not-found">
            <h1 class="my-5 display-1 text-center">404</h1>
            <div class="alert alert-warning text-center my-3 p-1 ">Task Not Found</div>
        </div>
    <?php endif;?>
</div>
<?php require_once "inc/footer.php";
