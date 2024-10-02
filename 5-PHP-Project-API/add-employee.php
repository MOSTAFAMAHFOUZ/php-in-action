<?php
require_once('inc/header.php'); ?>

<?php

    if(!isset($_SESSION['auth'])){
        header('Location: index.php');
        exit;
    }

?>

<h1 class="text-center p-2 my-3">New Employee</h1>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="text-center">
            <?php if (isset($_SESSION['success'])): ?>
                <h3 class="text-success"><?= $_SESSION['success']; ?> </h3>
            <?php endif; ?>
            </div>
            
            <form action="actions/store-employee.php" method="POST" class="border p-3">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="type your name">
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['name'])): ?>
                        <span class="text-danger"><?= $_SESSION['errors']['name']; ?> </span>
                    <?php endif; ?>

                </div>
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="type your email">
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['email'])): ?>
                        <span class="text-danger"><?= $_SESSION['errors']['email']; ?> </span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="type your password">
                    <?php if (isset($_SESSION['errors']) && isset($_SESSION['errors']['password'])): ?>
                        <span class="text-danger"><?= $_SESSION['errors']['password']; ?> </span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['errors'],$_SESSION['success']); ?>
<?php require_once('inc/footer.php'); ?>