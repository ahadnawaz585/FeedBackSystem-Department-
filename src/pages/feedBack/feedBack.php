<?php
function renderFeedback()
{
    ?>
    <div class="feedBackContainer">
        <h2>Select Department</h2>
        <select id="departmentSelect">
            <!-- Departments will be dynamically populated here -->
        </select>

        <div id="messageContainer"></div> <!-- New message container -->

        <div id="questionForm" style="display: none;">
            <h2>Feedback Questions</h2>
            <form id="responseForm" method="POST" action="">
                <input type="hidden" id="customerID" name="customerID" value="">
                <input type="hidden" id="departmentID" name="departmentID" value="">
                <table id="feedbackTable">
                    <!-- Table headers here -->
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Agreed</th>
                            <th>Very Agreed</th>
                            <th>Neutral</th>
                            <th>Not Agreed</th>
                            <th>Strongly Disagree</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Questions and options will be dynamically populated here -->
                    </tbody>
                </table>
                <button type="submit" id="submitButton" name="create" disabled>Submit Response</button>
            </form>
        </div>
    </div>
    <?php
}
?>