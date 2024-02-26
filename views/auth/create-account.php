<main class="accounts">
    <div class="go-back">
        <a href="/login">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-compact-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M13 20l-3 -8l3 -8" />
            </svg>
        </a>
        <h1 class="text">Go back</h1>
    </div>

    <form class="form" action="/create-account" method="POST">
        <h1 class="form__title">Create account</h1>

        <?php include_once __DIR__ . '/../templates/alerts.php' ?>

        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Your name" value="<?php echo s($user->name) ?>">
        </div>
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" placeholder="Your surname" value="<?php echo s($user->surname) ?>">
        </div>
        <div class="field">
            <label for="phone">Phone</label>
            <input maxlength="9" type="tel" name="phone" id="phone" placeholder="Your phone number" value="<?php echo s($user->phone) ?>">
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Your email" value="<?php echo s($user->email) ?>">
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your strong password">
        </div>

        <input class="button submit" type="submit" value="Create account">

        <div class="actions">
            <a href="/login">Already have an account? <span>Log in!</span></a>
        </div>
    </form>
    <div class="overlay"></div>
</main>