<a class="go-to-profile" href="/account">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-compact-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <path d="M13 20l-3-8 3-8" />
    </svg>
    <h1 class="edit-profile-title">Edit profile</h1>
</a>
<main class="profile-container">
    <?php
    include_once __DIR__ . '/../templates/alerts.php';
    ?>

    <form action="/edit-profile" method="POST" class="edit-form" enctype="multipart/form-data">
        <section class="profile-info">
            <div class="profile-image-container">
                <?php
                include_once __DIR__ . '/../templates/profile-image.php';
                ?>
                <div class="image-upload">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                        <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                    <input class="img-input" type="file" name="profile-img" id="profile-img" accept="image/*">
                </div>
            </div>
            <h2 class="user-name-title"><?php echo $user->name . ' ' . $user->surname ?></h2>
            <button type="button" class="delete-button delete-profile-image">Remove profile image</button>
        </section>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $user->name ?>">
        </div>
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="<?php echo $user->surname ?>">
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user->email ?>">
        </div>
        <div class="field">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $user->phone ?>">
        </div>

        <input class="save" type="submit" value="Save changes">
    </form>
</main>

<?php $script = '<script src="build/js/editProfile.js"></script>';
$script .= '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

?>