<?php
function renderDepartmentForm()
{
    ?>

    <div class="departmentFormContainer">
    <h2>Create New Department</h2>
        <form id="createDepartmentForm">
            <label for="name">Department Name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Create Department</button>
            <input type="hidden" name="create" value="1"> 
        </form>
        
        <h2>Departments</h2>
        <table id="departmentsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="departmentsBody">
            </tbody>
        </table>
    
    </div>
    <?php
}