<?php require_once('inc/header.php'); ?>
<?php require_once 'functions.php'; ?>

<?php 

    $data_array = convertJsonToArray("database/settings.json");

?>

    <h1 class="text-center p-2 my-3"><?= $data_array[0]["title"]; ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <img src="<?= $data_array[0]["image"]; ?>" alt="" width="100%">
            </div>
        </div>
    </div>

<?php require_once('inc/footer.php'); ?>

