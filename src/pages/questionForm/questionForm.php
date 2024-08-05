<?php
function renderQuestionForm()
{
    ?><button id="questionButton">See Questions</button><br>
    <h2 style="text-align: center;">Create Question</h2>
    <form id="createQuestionForm" action="../../../db/surveyQuestion/create.php" method="POST" style="max-width: 500px; margin: 0 auto;">
        <div style="margin-bottom: 15px;">
            <label for="departmentID">Department:</label><br>
            <select id="departmentID" name="departmentID" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                <option value="">Select Department</option>
            </select>
        </div>
        <div id="questionsContainer">
            <div class="question-input" style="margin-bottom: 15px;">
                <label for="questionText">Question:</label><br>
                <input type="text" name="questionText[]" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
          </div>
        </div>
        <button type="button" id="addQuestionBtn" style="width: 100%; background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer; margin-bottom: 15px;">Add Question</button>
        <button type="submit" name="create" style="width: 100%; background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;">Create Questions</button>
    </form>
    <?php
}
?>
