class DepartmentReport {
    constructor() {
        this.departmentSelect = document.getElementById("departmentSelect");
        this.reportContainer = document.getElementById("reportContainer");
        this.addEventListeners();
        this.fetchDepartments();
    }

    addEventListeners() {
        this.departmentSelect.addEventListener("change", () => {
            const selectedDepartmentId = this.departmentSelect.value;
            if (selectedDepartmentId === "none") {
                this.reportContainer.innerHTML = ""; // Clear report container
            } else {
                this.fetchReport(selectedDepartmentId);
            }
        });
    }

    fetchDepartments() {
        fetch("../../db/departments/read.php")
            .then(response => response.json())
            .then(data => {
                this.populateDepartments(data);
            })
            .catch(error => {
                console.error('Error fetching departments:', error);
            });
    }

    populateDepartments(departments) {
        this.departmentSelect.innerHTML = "";
        
        // Add "None" option
        const noneOption = document.createElement("option");
        noneOption.value = "none";
        noneOption.textContent = "None";
        this.departmentSelect.appendChild(noneOption);
        
        // Add departments
        departments.forEach(department => {
            const option = document.createElement("option");
            option.value = department.id;
            option.textContent = department.name;
            this.departmentSelect.appendChild(option);
        });
    }

    fetchReport(departmentId) {
        fetch("../../db/surveyResponse/report.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'department_id=' + departmentId
        })
            .then(response => response.json())
            .then(data => {
                this.renderReport(data);
            })
            .catch(error => {
                console.error('Error fetching report:', error);
            });
    }

    renderReport(data) {
        let html = '<table id="feedbackTable">';
        html += '<div>';
        html += '<button id="downloadCSVButton">Download as CSV</button>';
        html += '<button id="downloadPDFButton">Download as PDF</button>';
        html += '</div>';
        html += '<thead>';
        html += '<tr>';
        html += '<th>Question</th>';
        html += '<th>% Agreed</th>';
        html += '<th>% Very Agreed</th>';
        html += '<th>% Neutral</th>';
        html += '<th>% Not Agreed</th>';
        html += '<th>% Strongly Disagree</th>';
        html += '</tr>';
        html += '</thead>';
        html += '<tbody>';
        data.forEach(question => {
            html += '<tr>';
            html += '<td>' + question.question_text + '</td>';
            html += '<td>' + question.percent_Agreed + '</td>';
            html += '<td>' + question.percent_Very_Agreed + '</td>';
            html += '<td>' + question.percent_Neutral + '</td>';
            html += '<td>' + question.percent_Not_Agreed + '</td>';
            html += '<td>' + question.percent_Strongly_Disagree + '</td>';
            html += '</tr>';
        });
        html += '</tbody>';
        html += '</table>';

     

        this.reportContainer.innerHTML = html;

        const downloadCSVButton = document.getElementById("downloadCSVButton");
        downloadCSVButton.addEventListener("click", () => {
            this.downloadReport(data, 'csv');
        });

        const downloadPDFButton = document.getElementById("downloadPDFButton");
        downloadPDFButton.addEventListener("click", () => {
            this.downloadReport(data, 'pdf');
        });
    }

    downloadReport(data, format) {
        if (format === 'csv') {
            const csv = data.map(question => Object.values(question).join(',')).join('\n');
            const blob = new Blob([csv], { type: 'text/csv' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'feedback_report.csv';
            link.click();
        } else if (format === 'pdf') {
            const reportWindow = window.open('', '_blank');
            reportWindow.document.write('<html><head><title>Feedback Report</title></head><body>');

            reportWindow.document.write('<h1>Feedback Report</h1>');
            reportWindow.document.write('<table border="1"><thead><tr><th>Question</th><th>% Agreed</th><th>% Very Agreed</th><th>% Neutral</th><th>% Not Agreed</th><th>% Strongly Disagree</th></tr></thead><tbody>');
            data.forEach(question => {
                reportWindow.document.write('<tr>');
                reportWindow.document.write('<td>' + question.question_text + '</td>');
                reportWindow.document.write('<td>' + question.percent_Agreed + '</td>');
                reportWindow.document.write('<td>' + question.percent_Very_Agreed + '</td>');
                reportWindow.document.write('<td>' + question.percent_Neutral + '</td>');
                reportWindow.document.write('<td>' + question.percent_Not_Agreed + '</td>');
                reportWindow.document.write('<td>' + question.percent_Strongly_Disagree + '</td>');
                reportWindow.document.write('</tr>');
            });
            reportWindow.document.write('</tbody></table>');

            reportWindow.document.write('</body></html>');

            reportWindow.document.close();
            reportWindow.print();
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new DepartmentReport();
});
