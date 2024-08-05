

<div class="successContainer">
    <h2>Success!</h2>
    <p>Your action was completed successfully.</p>
    <a href="/?page=home">Go back to home page</a><br>
    <?php if (!isset($_COOKIE['admin_token'])): ?>
        <a href="/?page=feedback">Start giving feedback</a>
    <?php endif; ?>
</div>
