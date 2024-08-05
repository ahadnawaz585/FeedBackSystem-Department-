<?php

try {

    $conn->exec("CREATE TABLE IF NOT EXISTS Customers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(20),
        address VARCHAR(255),
        password VARCHAR(20)
    )");


    $stmt = $conn->prepare("SELECT COUNT(*) FROM Customers WHERE email = 'feedback@admin'");
    $stmt->execute();
    $adminCount = $stmt->fetchColumn();

    if ($adminCount == 0) {
        // Insert admin user
        $stmt = $conn->prepare("INSERT INTO Customers (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $adminName);
        $stmt->bindParam(':email', $adminEmail);
        $stmt->bindParam(':password', $adminPassword);

        $adminName = "Admin User";
        $adminEmail = "feedback@admin";
        $adminPassword = "pass4everything";

        $stmt->execute();
    }

    $conn->exec("CREATE TABLE IF NOT EXISTS Departments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100)
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS SurveyQuestions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        departmentID INT,
        questionText TEXT,
        FOREIGN KEY (departmentID) REFERENCES Departments(id)
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS SurveyResponses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customerID INT,
        departmentID INT,
        questionID INT,
        response TEXT,
        FOREIGN KEY (customerID) REFERENCES Customers(id),
        FOREIGN KEY (departmentID) REFERENCES Departments(id),
        FOREIGN KEY (questionID) REFERENCES SurveyQuestions(id)
    )");

    $stmt = $conn->query("SELECT COUNT(*) FROM Departments");
    $departmentCount = $stmt->fetchColumn();

    if ($departmentCount == 0) {
        $conn->exec("INSERT INTO Departments (name) VALUES
            ('Sales'),
            ('Customer Support'),
            ('Marketing'),
            ('Product Development'),
            ('Finance')");
    }

    $stmt = $conn->query("SELECT COUNT(*) FROM SurveyQuestions");
    $questionCount = $stmt->fetchColumn();

    if ($questionCount == 0) {
        // Questions for Sales department
        $conn->exec("INSERT INTO SurveyQuestions (departmentID, questionText) VALUES
            (1, 'How satisfied are you with our product?'),
            (1, 'How likely are you to recommend our services to others?'),
            (1, 'What features would you like to see in our next product update?'),
            (1, 'How responsive do you find our website/mobile app?'),
            (1, 'Do you find our pricing competitive compared to similar products/services?'),
            (1, 'What additional services would you like us to offer?'),
            (1, 'What improvements would you suggest for our sales process?'),
            (1, 'How satisfied are you with the performance of our sales team?'),
            (1, 'What obstacles prevent you from making a purchase?'),
            (1, 'How would you rate the quality of our after-sales support?'),
            (1, 'What are your thoughts on our product demo/trial experience?'),
            (1, 'How effective do you find our sales presentations?'),
            (1, 'How satisfied are you with the information provided on our website?'),
            (1, 'What improvements would you suggest for our order fulfillment process?'),
            (1, 'How likely are you to continue using our product/service in the future?')");

        // Questions for Customer Support department
        $conn->exec("INSERT INTO SurveyQuestions (departmentID, questionText) VALUES
            (2, 'How satisfied are you with the customer support experience?'),
            (2, 'What improvements can we make to our support services?'),
            (2, 'How responsive do you find our support team?'),
            (2, 'What additional support channels would you like us to offer?'),
            (2, 'How would you rate the clarity of our support documentation?'),
            (2, 'How satisfied are you with the resolution of your support tickets?'),
            (2, 'What challenges do you face when seeking support from us?'),
            (2, 'How likely are you to recommend our support services to others?'),
            (2, 'What improvements would you suggest for our support ticketing system?'),
            (2, 'How effective do you find our self-service support options?'),
            (2, 'How satisfied are you with the professionalism of our support team?'),
            (2, 'What features would you like to see in our support portal?'),
            (2, 'How would you rate the response time of our support team?'),
            (2, 'What improvements would you suggest for our support knowledge base?'),
            (2, 'How likely are you to contact our support team in the future?')");

        // Questions for Marketing department
        $conn->exec("INSERT INTO SurveyQuestions (departmentID, questionText) VALUES
            (3, 'What improvements can we make to our marketing efforts?'),
            (3, 'How effective do you find our promotional campaigns?'),
            (3, 'What marketing channels do you prefer to receive information from us?'),
            (3, 'How satisfied are you with the relevance of our marketing messages?'),
            (3, 'What social media platforms do you follow us on?'),
            (3, 'How likely are you to engage with our marketing content?'),
            (3, 'What marketing materials would you like to see more of?'),
            (3, 'How would you rate the creativity of our marketing campaigns?'),
            (3, 'What improvements would you suggest for our website design?'),
            (3, 'How effective do you find our email marketing efforts?'),
            (3, 'How satisfied are you with the frequency of our marketing communications?'),
            (3, 'What marketing events would you like us to host or participate in?'),
            (3, 'How likely are you to share our marketing content with others?'),
            (3, 'What improvements would you suggest for our advertising strategies?'),
            (3, 'How satisfied are you with the quality of our marketing materials?')");

        // Questions for Product Development department
        $conn->exec("INSERT INTO SurveyQuestions (departmentID, questionText) VALUES
            (4, 'What features would you like to see in our next product update?'),
            (4, 'How responsive do you find our website/mobile app?'),
            (4, 'What improvements would you suggest for our product usability?'),
            (4, 'How satisfied are you with the performance of our products?'),
            (4, 'What obstacles prevent you from fully utilizing our products?'),
            (4, 'How would you rate the reliability of our products?'),
            (4, 'What additional integrations would you like us to offer?'),
            (4, 'How likely are you to upgrade to the latest version of our product?'),
            (4, 'What improvements would you suggest for our product documentation?'),
            (4, 'How satisfied are you with the training provided for our products?'),
            (4, 'What new features would you like us to prioritize in our next update?'),
            (4, 'How effective do you find our product demos?'),
            (4, 'How satisfied are you with the performance of our beta releases?'),
            (4, 'What improvements would you suggest for our product testing process?'),
            (4, 'How likely are you to participate in our product feedback sessions?')");

        // Questions for Finance department
        $conn->exec("INSERT INTO SurveyQuestions (departmentID, questionText) VALUES
            (5, 'How would you rate the quality of our financial services?'),
            (5, 'What improvements would you suggest for our billing process?'),
            (5, 'How satisfied are you with the accuracy of our financial reports?'),
            (5, 'What challenges do you face when managing your account with us?'),
            (5, 'How likely are you to recommend our financial services to others?'),
            (5, 'What improvements would you suggest for our invoicing system?'),
            (5, 'How satisfied are you with the transparency of our financial transactions?'),
            (5, 'What additional financial services would you like us to offer?'),
            (5, 'How would you rate the responsiveness of our finance team?'),
            (5, 'What improvements would you suggest for our expense tracking system?'),
            (5, 'How likely are you to use our financial planning services in the future?'),
            (5, 'What improvements would you suggest for our budgeting tools?'),
            (5, 'How satisfied are you with the level of support provided by our finance team?'),
            (5, 'What financial education resources would you like us to provide?'),
            (5, 'How likely are you to continue using our financial services in the future?')");
    }

    // echo "Example data inserted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>