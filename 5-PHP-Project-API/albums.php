<?php require_once('inc/header.php'); ?>
<?php require_once 'functions.php'; ?>

<?php 

    if(file_exists("database/albums.json")){
        $albums = convertJsonToArray("database/albums.json");
    }else{
        $albums = file_get_contents("https://jsonplaceholder.typicode.com/albums");
        file_put_contents("database/albums.json",$albums);
        $albums = json_decode($albums, true);
    }
  

?>

    <h1 class="text-center p-2 my-3">All Albums</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User Id</th>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($albums as $album):?>
                <tr>
                    <td><?php echo $album['userId'];?></td>
                    <td><?php echo $album['id'];?></td>
                    <td><?php echo $album['title'];?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
        </tbody>
    </table>

<?php require_once('inc/footer.php'); ?>

