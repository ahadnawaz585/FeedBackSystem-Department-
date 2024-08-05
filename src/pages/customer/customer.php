<?php
function renderCustomer()
{
    ?>
    <div class="form-container">
        <h2>Add Personal Info</h2>
        <form action="../../../db/customers/create.php" method="post" class="personal-info-form">
            <div class="form-row">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-row">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-row">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <a href="/?page=check" class="link-previous-email">Continue with previous email</a>
                |&nbsp;&nbsp;
                <a href="/?page=home" class="discard-button">Discard and Return to Home</a>
                <input type="submit" value="Submit" class="submit-button">
            </div>
        </form>
    </div>
    <?php
}
?>