<?php
session_start();
require_once('./connection/connect.php');
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Website</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod justo euismod, dignissim purus sed, malesuada metus.</p>
            <a href="about.php" class="cta-button">Learn More</a>
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <h2>Quality Services</h2>
            <p>We offer top-notch services to our clients. Our team is dedicated to delivering excellence.</p>
        </div>
        <div class="feature">
            <h2>Experienced Team</h2>
            <p>Our experienced professionals are experts in their respective fields, ensuring the best results for you.</p>
        </div>
        <div class="feature">
            <h2>Customer Satisfaction</h2>
            <p>Your satisfaction is our priority. We strive to meet and exceed your expectations.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Company Name. All rights reserved.</p>
    </footer>
</body>




</html>
