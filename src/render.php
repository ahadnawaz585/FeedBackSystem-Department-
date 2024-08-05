<?php

require_once 'src/core/pageHeader.php';
require_once 'src/components/NavBar/navbar.php';
require_once 'src/core/contentRenderer.php';
require_once 'src/core/resourceLoader.php';

class MainRenderer
{
    private $pageHeader;
    private $currentPage;

    public function __construct()
    {
        $this->pageHeader = new PageHeader("Feedback System - Home", "feedback system, customer feedback, surveys, departments", "Welcome to the Feedback System. Collect feedback, manage departments, and analyze survey responses effortlessly.");
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 'home';
        ResourceLoader::lazyLoadResources($this->currentPage, $this->pageHeader);
    }

    public function renderMain()
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php echo $this->pageHeader->renderHeader(); ?>

        <body>
            <?php if ($this->shouldShowNavbar()) : ?>
                <?php renderNavbar(); ?>
            <?php endif; ?>
            <?php ContentRenderer::renderContent($this->currentPage); ?>
            <?php if ($this->shouldShowFooter()) : ?>
                <?php $this->renderFooter(); ?>
            <?php endif; ?>
        </body>

        </html>
        <?php
        return ob_get_clean();
    }

    private function shouldShowNavbar()
    {
        $excludedRoutes = [ 'admin', 'departmentForm', 'questions', 'questionForm', 'report'];
    
        if (!isset($_COOKIE['admin_token']) && in_array($this->currentPage, $excludedRoutes)) {
            header("Location: /?page=home");
            exit();
        }
    
        if ($this->currentPage === 'feedback' && !isset($_COOKIE['token'])) {
            header("Location: /?page=check");
            exit();
        }
    
        if ($this->currentPage === 'check' && isset($_COOKIE['token'])) {
            header("Location: /?page=feedback");
            exit();
        }
    
        return true;
    }
    

    private function shouldShowFooter()
    {
        $excludedRoutes = ['success'];
        return !in_array($this->currentPage, $excludedRoutes);
    }

    private function renderFooter()
    {
        include __DIR__ . '/components/Footer/footer.php';
    }
}

?>
