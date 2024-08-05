<?php
function renderAdmin()
{
    ?>
    <div class="admin-panel">
        <header>
            <h1>Feedback System Admin Panel</h1>
            <nav>
                <ul>
                    <li><a href="?page=questions">Questions</a></li>
                    <li><a href="?page=questionForm">Add Question</a></li>
                    <li><a href="?page=departmentForm">Departments</a></li>
                    <li><a href="?page=report">Reports</a></li>
                    <li><a href="https://feedbacksystem.com/?page=feedback" target="_blank">Go to Feedback System</a></li>
                </ul>
            </nav>
        </header>
        <section class="main-content">
            <p>Welcome to the Feedback System Admin Panel. From here, you can manage various aspects of the system.</p>
            <p>Use the navigation menu above to access different sections:</p>
            <ul>
                <li><strong>Questions:</strong> View and manage existing questions.</li>
                <li><strong>Add Question:</strong> Create a new question to be included in the feedback forms.</li>
                <li><strong>Departments:</strong> Manage departments within the organization.</li>
                <li><strong>Reports:</strong> Generate and view reports based on feedback data.</li>
                <li><strong>Feedback System:</strong> Go to the live Feedback System page to view feedback forms.</li>
            </ul>
        </section>
    </div>
    <?php
}
?>