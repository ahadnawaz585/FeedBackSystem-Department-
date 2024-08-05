<?php
function renderQuestions()
{
    ?>

<button id="questionFormButton">Create Question</button><br>
<h2>Select Department:</h2>
<select id="departmentSelect">
    </select>
    <h2>Questions</h2>
    <table id="questionsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="questionsBody">
            <!-- Questions will be inserted here dynamically -->
        </tbody>
    </table>
    <?php
}
?>