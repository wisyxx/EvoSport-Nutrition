<?php 
    include_once __DIR__ . '/../templates/header.php';
?>

<div class="product">
    <div class="product__info">
        <h1 class="product__name"><?php echo $product->name ?></h1>
        <img class="product__image" src="build/img/products/<?php echo $product->image ?>" alt="product image">
    </div>
    <aside class="product__actions">
        <p class="product__description"><?php echo $product->description ?></p>
        <p class="product__price"><?php echo $product->price ?>€</p>
    </aside>
</div>

<?php
    $script = '<script type="module" src="build/js/app.js"></script>';
?>