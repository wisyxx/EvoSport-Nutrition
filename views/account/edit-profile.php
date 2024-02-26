<a class="go-to-profile" href="/account">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-compact-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path d="M0 0h24v24H0z" stroke="none" />
        <path d="M13 20l-3-8 3-8" />
    </svg>
    <h1 class="edit-profile-title">Edit profile</h1>
</a>
<main class="profile-container">
    <section class="profile-info">
        <img src="build/img/users/1.webp" alt="User profile image" class="profile-image">
        <h2 class="user-name-title"><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname'] ?></h2>
    </section>
    <form action="/edit-profile" method="POST" class="edit-form">
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'] ?>">
        </div>
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="<?php echo $_SESSION['surname'] ?>">
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
        </div>
        <div class="field">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <input class="save" type="submit" value="Save changes">
    </form>
</main>