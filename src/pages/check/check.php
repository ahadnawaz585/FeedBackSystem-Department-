<?php
function renderCheck()
{
    ?>
    <div class="checkFormContainer">
        <h2>Verify for Feedback</h2>
        <form action="../../../db/customers/checkCredentials.php" method="post">
            <div class="formRow">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="formRow">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <a href="/?page=customerForm
            " class="link-previous-email">Get Registered?</a>
                <a href="/?page=home" class="discard-button">Discard and Return to Home</a>
                <input type="submit" value="Continue">
            </div>

        </form>
    </div>
    <?php
}
?>