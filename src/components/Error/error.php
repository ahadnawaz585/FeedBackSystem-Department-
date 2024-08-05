<?php
function renderError()
{
    ?>
    <div class="errorContainer">
        <h2 class="errorContainer__heading">Error Occurred</h2>
        <p class="errorContainer__message">Something went wrong. Please try again.</p>
        <button class="errorContainer__button" onclick="window.location.reload()">Try Again</button>
        <button class="errorContainer__button" href="#" onclick="goBack()">Go Back</button>
    </div>
    <?php
}
?>
