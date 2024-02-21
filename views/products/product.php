<?php
include_once __DIR__ . '/../templates/header.php';
?>

<div class="product" data-productid="<?php echo $product->id ?>">
    <div class=" product__image">
    <img src="build/img/products/<?php echo $product->image ?>" alt="product image">
</div>

<aside class="product__info">
    <h1 class="product__name"><?php echo $product->name ?></h1>
    <p class="product__description"><?php echo $product->description ?></p>
    <p class="product__price"><?php echo $product->price ?>€</p>
    <button class="button basket-add">
        <img src="build/img/shopping-basket.svg" alt="shopping basket">
        Add
    </button>
</aside>
</div>

<?php
$script = '<script type="module" src="build/js/app.js"></script>';
$script .= '<script type="module" src="build/js/shoppingBasket.js"></script>';
$script .= '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
?>