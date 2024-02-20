<section class="account-info">
    <img src="build/img/products/omega3.jpg" alt="User profile picture" class="profile-image">
    <div class="user-info">
        <h1>Hello, <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?>!</h1>
        <div class="actions">
            <a href="/edit-profile" class="button edit-profile">Edit profile</a>
            <a href="/logout" class="button logout">Logout</a>
        </div>
    </div>
</section>

<section class="shopping-basket">
    <h1>Shopping basket</h1>
    <div class="shopping-basket__products">
        <div class="product">
            <div class="product-info">
                <div class="product-image">
                    <img src="build/img/products/creatine.webp" alt="Product image">
                </div>
                <p class="product-name">Some product name</p>
                <p class="product-price">25€</p>
            </div>

            <form action="/api/basket/delete" method="POST">
                <input type="hidden" name="id" value="<?php // echo $product->id 
                                                        ?>">
                <input class="delete-button" type="submit" value="Delete">
            </form>
        </div>
    </div>
</section>