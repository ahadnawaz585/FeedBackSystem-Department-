class QuestionManager {
    constructor() {
      this.departmentSelect = document.getElementById("departmentID");
      this.questionsContainer = document.getElementById("questionsContainer");
      this.addQuestionBtn = document.getElementById("addQuestionBtn");
  this.setupQuestionButton();
      this.fetchDepartments();
      this.setupEventListeners();
    }
  
    fetchDepartments() {
      fetch("../../db/departments/read.php")
        .then(response => response.json())
        .then(data => {
          this.populateDepartments(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    populateDepartments(departments) {
      departments.forEach(department => {
        const option = document.createElement("option");
        option.value = department.id;
        option.textContent = department.name;
        this.departmentSelect.appendChild(option);
      });
    }
  
    setupEventListeners() {
      this.addQuestionBtn.addEventListener("click", () => {
        this.addQuestionInput();
      });
  
      this.questionsContainer.addEventListener("click", event => {
        if (event.target.classList.contains("remove-question")) {
          event.target.parentNode.remove();
        }
      });
    }
  
    addQuestionInput() {
      const newQuestionInput = document.createElement("div");
      newQuestionInput.className = "question-input";
      newQuestionInput.innerHTML = `
          <label for="questionText">Question:</label><br>
          <input type="text" name="questionText[]" required style="width: calc(100% - 80px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; margin-bottom: 10px;">
      `;
      this.questionsContainer.appendChild(newQuestionInput);
  
      if (this.questionsContainer.children.length > 1) {
        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "remove-question";
        removeButton.textContent = "-";
        removeButton.style = "background-color: #f44336; border: none; color: white; padding: 10px 15px; font-size: 16px; border-radius: 5px; cursor: pointer;";
        newQuestionInput.appendChild(removeButton);
      }
    }

    setupQuestionButton() {
        const questionFormButton = document.getElementById("questionButton");
        questionFormButton.addEventListener("click", () => {
            window.location.href = "https://feedbacksystem.com/?page=questions";
        });
    }

  }
  
  document.addEventListener("DOMContentLoaded", function () {
    new QuestionManager();
  });
  