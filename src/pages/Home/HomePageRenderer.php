<div class="container">
    <h1>Welcome to the Feedback System</h1>
    <p>Our feedback system is designed to help you gain valuable insights and improve your business based on customer feedback.</p>

    <div class="explanation">
        <h2>How it Works:</h2>
        <p>The feedback system allows you to create customized surveys tailored to your business needs. You can define specific questions and gather feedback from your customers effortlessly.</p>
        <p>Once the feedback is collected, you can analyze the responses in real-time through intuitive dashboards. This helps you identify trends, areas for improvement, and opportunities to enhance customer satisfaction.</p>
        <p>Additionally, the system enables you to manage departments efficiently, ensuring that feedback is directed to the relevant teams for action and follow-up.</p>
        
        <?php
        $tokenExists = isset($_COOKIE['token']);
        $getStartedUrl = $tokenExists ? "/?page=feedback" : "/?page=customerForm";
        ?>
        
        <a href="<?php echo $getStartedUrl; ?>" class="btn-get-started">Get Started</a>
    </div>
    <p>Ready to get started?</p>
</div>
