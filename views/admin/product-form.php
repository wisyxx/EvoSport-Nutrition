<main class="product-form">
    <form class="form" method="POST" enctype="multipart/form-data">
        <h1 class="form__title">Update product</h1>
        <?php include_once __DIR__ . '/../templates/alerts.php' ?>
        <div class="field">
            <label for="name">Product name:</label>
            <input type="text" name="name" id="name" value="<?php echo $product->name ?>">
        </div>
        <div class="field">
            <label for="price">Product price:</label>
            <input type="number" name="price" id="price" value="<?php echo $product->price ?>">
        </div>
        <div class="field">
            <textarea name="description" id="description" placeholder="Product description"><?php echo $product->description ?></textarea>
        </div>
        <div class="field">
            <label for="image">Product image:</label>
            <div class="image-upload">
                <img class="product-image" src="/build/img/products/<?php echo $product->image ?>" alt="Product image">
                <input type="file" name="image" id="image">
            </div>
        </div>
        <input class="button" type="submit" value="Update">
    </form>
    <div class="overlay"></div>
</main>