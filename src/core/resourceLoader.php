<?php

class ResourceLoader
{
    public static function lazyLoadResources($currentPage, $pageHeader)
    {
        $pageHeader->addCssLink('/public/css/navbar.css');
        $pageHeader->addCssLink('/public/css/footer.css');
        $pageHeader->addCssLink('/public/css/styles.css');
        $pageHeader->addScript('/public/js/navbar.js');

        switch ($currentPage) {
            case 'feedback':
                $pageHeader->addCssLink('/public/css/feedBack.css');
                $pageHeader->addScript('/public/js/feedBack.js');
                break;
            case 'customerForm':
                $pageHeader->addCssLink('/public/css/customer.css');
                break;
            case 'check':
                $pageHeader->addCssLink('/public/css/check.css');
                $pageHeader->addCssLink('/public/css/customer.css');
                break;
            case 'error':
                $pageHeader->addCssLink('/public/css/error.css');
                $pageHeader->addScript('/public/js/error.js');
                break;
            case 'success':
                $pageHeader->addCssLink('/public/css/success.css');
                break;
            case 'department':
                $pageHeader->addCssLink('/public/css/department.css');
                break;
            case 'questionForm':
                $pageHeader->addCssLink('/public/css/questionForm.css');
                $pageHeader->addScript('/public/js/questionForm.js');
                break;
            case 'questions':
                $pageHeader->addCssLink('/public/css/questions.css');
                $pageHeader->addScript('/public/js/questions.js');
                break;
            case 'departmentForm':
                $pageHeader->addCssLink('/public/css/departmentForm.css');
                $pageHeader->addScript('/public/js/departmentForm.js');
                break;
            case 'admin':
                $pageHeader->addCssLink('/public/css/admin.css');
                break;
            case 'about':
                $pageHeader->addCssLink('/public/css/about.css');
                break;
            case 'contact':
                $pageHeader->addCssLink('/public/css/contact.css');
                break;
            case 'report':
                $pageHeader->addCssLink('/public/css/report.css');
                $pageHeader->addScript('/public/js/report.js');
                $pageHeader->addScript('https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js');
                break;
            default:
                $pageHeader->addCssLink('/public/css/home.css');
                break;
        }
    }
}

?>
