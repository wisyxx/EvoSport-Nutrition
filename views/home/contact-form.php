<main class="product-form">
    <form class="form" method="POST">
        <h1 class="form__title">Contact form</h1>
        <div class="field">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="field">
            <label for="email">Your email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="field">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div class="field">
            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <a href="/" class="delete-button">Cancel</a>
        <input class="button" type="submit" value="Send">
    </form>
    <div class="overlay"></div>
</main>