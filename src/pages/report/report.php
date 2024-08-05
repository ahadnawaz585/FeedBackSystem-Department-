<?php
function renderReport()
{
    ?>
    <div class="report">
        <h1>Department Feedback Report</h1>
        <label for="departmentSelect">Select Department:</label>
        <select id="departmentSelect">
            <!-- Departments will be dynamically populated here -->
        </select>
        <div id="reportContainer">
            <!-- Feedback report table will be dynamically populated here -->
        </div>
    </div>
    <?php
}
?>