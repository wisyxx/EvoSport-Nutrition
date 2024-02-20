<main class="accounts">
    <div class="go-back">
        <a href="/">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-compact-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M13 20l-3 -8l3 -8" />
            </svg>
        </a>
        <h1 class="text">Go back</h1>
    </div>
    <form class="form" action="/login" method="POST">
        <h1 class="form__title">Log in</h1>
        
        <?php include_once __DIR__ . '/../templates/alerts.php' ?>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Your email" value="<?php echo s($_POST['email'] ?? '')  ?>">
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your strong password">
        </div>

        <input class="button submit" type="submit" value="Log in">

        <div class="actions">
            <a href="/forgot-password" class="forgot">Reset password</a>
            <a href="/create-account">Don't have an account yet? <span>Create one!</span></a>
        </div>
    </form>
    <div class="overlay"></div>
</main>