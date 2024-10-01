<?php include_once("inc/header.php"); ?>
<?php include_once("data.php"); ?>
<div class="container">
    <div class="row">
        <h1 class="text-center">All Products</h1>
        <?php foreach($products as $product): ?>
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <?php echo $product['category']; ?> 
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['title']; ?> </h5>
                    <div class="cont-img">
                        <img src="<?php echo $product['image']; ?>" width="250" height="250">
                    </div>
                    <span class="badge bg-warning"><?php echo $product['price']; ?></span>
                    <p class="card-text"> <?php echo $product['description']; ?> </p>
                    <a href="add-to-cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include_once("inc/footer.php"); ?>