<main class="admin-page">
    <h1 class="admin-page__title">Admin panel</h1>
    <a class="admin-page__home-button" href="/">Home page</a>
    <section class="admin-panels">
        <aside class="users-panel admin-panels__panel">
            <div class="products-panel__heading">
                <h2 class="panel-title">Users</h2>
            </div>
            <?php foreach ($users as $user) : ?>
                <div class="panel-card">
                    <?php include __DIR__ . '/../templates/profile-image.php' ?>
                    <div class="user-info-actions">
                        <div class="card-data">
                            <p class="card-data-field"><span>ID: </span><?php echo $user->id ?></p>
                            <p class="card-data-field"><span>Name: </span><?php echo $user->name . ' ' . $user->surname ?></p>
                            <p class="card-data-field"><span>Email: </span><?php echo $user->email ?></p>
                            <p class="card-data-field"><span>Phone: </span><?php echo $user->phone ?></p>
                        </div>
                        <div class="card-actions">
                            <a href="/api/users/set-admin" class="set-admin button">Set admin</a>
                            <form class="form" action="/api/users/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                <input type="submit" name="delete" class="remove-user delete-button" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>

        <aside class="products-panel admin-panels__panel">
            <div class="products-panel__heading">
                <h2 class="panel-title">Products</h2>
                <a href="/new-product" class="button">New product</a>
            </div>

            <?php foreach ($products as $product) : ?>
                <div class="panel-card">
                    <img class="product-img" src="build/img/products/<?php echo $product->image ?>" alt="Product image">
                    <div class="product-info-actions">
                        <div class="card-data">
                            <p class="card-data-field"><span>ID: </span><?php echo $product->id ?></p>
                            <p class="card-data-field"><span>Name: </span><?php echo $product->name ?></p>
                            <p class="card-data-field"><span>Price: </span><?php echo $product->price ?></p>
                        </div>
                        <div class="card-actions">
                            <a href="/admin/products/update" class="update-product button">Update</a>
                            <a href="/api/products/delete" class="remove-product delete-button">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
    </section>
</main>