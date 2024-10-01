<?php require_once "inc/header.php";?>
<?php
$valid_priorities = ["normal", "high", "low"];
$errors = [];
$success = "";
if (isset($_POST["title"])) {

    $title = trim(htmlspecialchars($_POST["title"]));
    $priority = $_POST["priority"];

    if (strlen($title) < 3) {
        $errors[] = "plesae type at least 3 chars";
    }

    if (!in_array($priority, $valid_priorities)) {
        $errors[] = "plesae choose valid priority";
    }

    if (empty($errors)) {
        $data = json_decode(file_get_contents("tasks.json"), true);
        $id = rand(100, 10000);
        $data[$id] = [
            "id" => $id,
            "title" => $title,
            "priority" => $priority,
        ];
        file_put_contents("tasks.json", json_encode($data));
        $success = "Task Added Successfully";
    }

}

?>
<h1 class="text-center my-3 p-2">Add New Task</h1>
<div class="col-8 mx-auto">
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="border p-3">
        <div class="mb-3">
            <?php if (count($errors)): ?>
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger mb-1 p-1 "><?php echo $error; ?></div>
                <?php endforeach;?>
            <?php endif;?>
            <?php if ($success): ?>
                <div class="alert alert-success mb-1 p-1 "><?php echo $success; ?></div>
            <?php endif;?>
        </div>
        <div class="mb-3">
            <label for="title">Task Title</label>
            <input type="text" name="title" class="form-control" id="title" />
        </div>
        <div class="mb-3">
            <label for="title">Task Priority</label>
            <select  name="priority" class="form-control" id="title" >
                <option value="">----------</option>
                <option value="normal">Normal</option>
                <option value="high">High</option>
                <option value="low">Low</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit"  class="form-control bg-info text-center text-bold" value="Save" />
        </div>
    </form>
</div>
<?php require_once "inc/footer.php";
