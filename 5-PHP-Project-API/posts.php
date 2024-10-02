<?php require_once('inc/header.php'); ?>
<?php 

    if(file_exists("database/posts.json")){
        $posts = file_get_contents("database/posts.json");
        $posts = json_decode($posts, true);
    }else{
        $posts = file_get_contents("https://jsonplaceholder.typicode.com/posts");
        file_put_contents("database/posts.json",$posts);
        $posts = json_decode($posts, true);
    }
  

?>

    <h1 class="text-center p-2 my-3">All Posts</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User Id</th>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post):?>
                <tr>
                    <td><?php echo $post['userId'];?></td>
                    <td><?php echo $post['id'];?></td>
                    <td><?php echo $post['title'];?></td>
                    <td><?php echo $post['body'];?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
        </tbody>
    </table>

<?php require_once('inc/footer.php'); ?>

