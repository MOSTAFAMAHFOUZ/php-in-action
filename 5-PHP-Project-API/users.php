<?php require_once('inc/header.php'); ?>

<?php 

    if(!file_exists("database/users.json")){
        $users = file_get_contents("https://jsonplaceholder.typicode.com/users");
        file_put_contents("database/users.json",$users);
    }else{
        $users = file_get_contents("database/users.json");
    }
    $users_data = json_decode($users, true);


?>

    <h1 class="text-center p-2 my-3">All Users</h1>
    <div class="container">
        <div class="row">
            <?php foreach($users_data as $user): ?>
            <div class="col-6">
                <div class="card mb-3" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user['name']; ?></h5>
                        <h4 class="card-title"><?php echo $user['username']; ?></h4>
                        <h5 class="card-title"><?php echo $user['email']; ?></h5>
                        <p class="card-text">
                            <h4>Address : </h4>
                            <?php echo $user['address']['street'] . " , " . $user['address']['suite'] . " , " . $user['address']['city'] . " , " .$user['address']['zipcode']; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $user['phone']; ?> - 
                            <?php echo $user['website']; ?>
                        </p>
                        <div>
                            Company : 
                            <?php echo implode(" -- " , $user["company"]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>


<?php require_once('inc/footer.php'); ?>

