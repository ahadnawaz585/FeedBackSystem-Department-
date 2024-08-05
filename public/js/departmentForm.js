class DepartmentManager {
    constructor() {
        this.departmentsTable = document.getElementById("departmentsTable");
        this.departmentsBody = document.getElementById("departmentsBody");
        this.createDepartmentForm = document.getElementById("createDepartmentForm");
        this.init();
    }

    init() {
        this.fetchDepartments();
        this.setupFormListener();
        this.setupDeleteListeners();
    }

    fetchDepartments() {
        fetch("../../db/departments/read.php")
            .then(response => response.json())
            .then(data => {
                data.forEach(department => {
                    this.addRowToTable(department);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    addRowToTable(department) {
        const row = this.departmentsBody.insertRow();
        row.innerHTML = `<td>${department.id}</td><td>${department.name}</td><td><button class="deleteBtn" data-id="${department.id}">Delete</button></td>`;
    }

    setupFormListener() {
        this.createDepartmentForm.addEventListener("submit", event => {
            event.preventDefault();
            this.submitForm();
        });
    }

    submitForm() {
        const formData = new FormData(this.createDepartmentForm);
        fetch("../../db/departments/create.php", {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            console.log(result);
            location.reload(); // Refresh the page after successful creation
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    setupDeleteListeners() {
        this.departmentsBody.addEventListener("click", event => {
            if (event.target.classList.contains("deleteBtn")) {
                const id = event.target.dataset.id;
                this.deleteDepartment(id);
            }
        });
    }

    deleteDepartment(id) {
        fetch("../../db/departments/delete.php", {
            method: 'POST',
            body: JSON.stringify({ id: id }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.text())
        .then(result => {
            console.log(result);
            location.reload(); 
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    new DepartmentManager();
});
