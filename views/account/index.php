<?php include_once __DIR__ . '/../templates/header.php' ?>

<section class="account-info">
    <img src="build/img/products/omega3.jpg" alt="User profile picture" class="profile-image">
    <div class="user-info">
        <h1>Hello, <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?>!</h1>
        <div class="actions">
            <a href="/edit-profile" class="button edit-profile">Edit profile</a>
            <a href="/logout" class="button logout">Log out</a>
        </div>
    </div>
</section>

<section class="shopping-basket" id="shopping-basket">
    <h1>Shopping basket</h1>
    <div class="shopping-basket__products">
        <?php foreach ($basketProducts as $product) : ?>
            <div class="basket-product">
                <div class=" product-image">
                    <img src="build/img/products/<?php echo $product->image ?>" alt="Product image">
                </div>
                <div class="product-info" data-productid="<?php echo $product->productId ?>">
                    <p class=" product-name"><?php echo $product->name ?></p>
                    <p class="product-price"><?php echo $product->price ?>€</p>
                    <button class="delete-button" type="button" data-basketitemid="<?php echo $product->id ?>">Remove</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
$script = '<script type="module" src="build/js/app.js"></script>';
$script .= '<script type="module" src="build/js/shoppingBasket.js"></script>';
$script .= '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
?>