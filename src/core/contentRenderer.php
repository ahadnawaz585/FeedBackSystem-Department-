<?php

class ContentRenderer
{
    public static function renderContent($currentPage)
    {
        switch ($currentPage) {
            case 'about':
                include __DIR__ . '/../pages/About/about.php';
                renderAbout();
                break;
            case 'admin':
                include __DIR__ . '/../pages/admin/admin.php';
                renderAdmin();
                break;
            case 'check':
                include __DIR__ . '/../pages/check/check.php';
                renderCheck();
                break;
            case 'error':
                include __DIR__ . '/../components/error/error.php';
                renderError();
                break;
            case 'contact':
                include __DIR__ . '/../pages/contact/contact.php';
                renderContact();
                break;
            case 'feedback':
                include __DIR__ . '/../pages/feedBack/feedBack.php';
                renderFeedback();
                break;
            case 'customerForm':
                include __DIR__ . '/../pages/customer/customer.php';
                renderCustomer();
                break;
            case 'success':
                include __DIR__ . '/../components/success/success.php';
                break;
            case 'department':
                include __DIR__ . '/../pages/department/department.php';
                renderDepartment();
                break;
            case 'questionForm':
                include __DIR__ . '/../pages/questionForm/questionForm.php';
                renderQuestionForm();
                break;
            case 'report':
                include __DIR__ . '/../pages/report/report.php';
                renderReport();
                break;
            case 'questions':
                include __DIR__ . '/../pages/questions/questions.php';
                renderQuestions();
                break;
            case 'departmentForm':
                include __DIR__ . '/../pages/departmentForm/departmentForm.php';
                renderDepartmentForm();
                break;
            default:
                include __DIR__ . '/../pages/Home/HomePageRenderer.php';
                break;
        }
    }
}

?>
