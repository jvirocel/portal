<?php
require_once 'config/database.php';

// Initialize form variables
$name = '';
$email = '';
$subject = '';
$message = '';
$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        try {
            // Save to database
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $subject, $message]);
            
            // Send email notification
            $to = 'info@candoncity.gov.ph';
            $email_subject = "New Contact Form Submission: $subject";
            $email_body = "You have received a new message from the Candon City Portal contact form.\n\n".
                         "Name: $name\n".
                         "Email: $email\n".
                         "Subject: $subject\n\n".
                         "Message:\n$message";
            $headers = "From: $email\r\n" .
                      "Reply-To: $email\r\n" .
                      "X-Mailer: PHP/" . phpversion();
            
            // For testing purposes, we'll just log the email instead of sending it
            error_log("Would send email to: $to\nSubject: $email_subject\nBody: $email_body");
            
            $success = 'Thank you for your message! We will get back to you soon.';
            
            // Clear form fields
            $name = $email = $subject = $message = '';
            
        } catch (PDOException $e) {
            $error = 'Sorry, there was an error saving your message. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Candon City Portal</title>
    <link rel="icon" type="image/jpeg" href="assets/img/Seal.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #28a745;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: var(--primary-color);
        }
        
        .contact-section {
            padding: 80px 0;
        }
        
        .contact-info {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            height: 100%;
        }
        
        .contact-info i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/seal.jpg" alt="Candon City Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-4">Contact Us</h2>
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success">
                            <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?php echo htmlspecialchars($message); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="text-center mb-4">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>Address</h4>
                            <p>City Hall, Candon City, Ilocos Sur</p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fas fa-phone"></i>
                            <h4>Phone</h4>
                            <p><a href="tel:+63776740001" class="text-decoration-none">(077) 674-0001</a></p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fas fa-envelope"></i>
                            <h4>Email</h4>
                            <p><a href="mailto:info@candoncity.gov.ph" class="text-decoration-none">info@candoncity.gov.ph</a></p>
                        </div>
                        <div class="text-center">
                            <h4>Follow Us</h4>
                            <div class="social-links">
                                <a href="https://facebook.com/candoncity" class="text-decoration-none me-3" target="_blank">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                                <a href="https://twitter.com/candoncity" class="text-decoration-none me-3" target="_blank">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                                <a href="https://instagram.com/candoncity" class="text-decoration-none" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-2">
        <div class="container">
            <div class="row">
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM footer ORDER BY section, display_order");
                    $footer_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Group items by section
                    $footer_sections = [];
                    foreach ($footer_items as $item) {
                        $footer_sections[$item['section']][] = $item;
                    }
                    
                    // Display each section
                    foreach ($footer_sections as $section => $items) {
                        echo '<div class="col-md-4 mb-2">';
                        echo '<h6 class="mb-2" style="font-size: 0.8rem;">' . ucwords(str_replace('_', ' ', $section)) . '</h6>';
                        echo '<ul class="list-unstyled">';
                        
                        foreach ($items as $item) {
                            echo '<li class="mb-0">';
                            if (!empty($item['link'])) {
                                echo '<a href="' . htmlspecialchars($item['link']) . '" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">';
                            }
                            if (!empty($item['icon'])) {
                                echo '<i class="fas ' . htmlspecialchars($item['icon']) . ' me-1" style="font-size: 0.7rem;"></i>';
                            }
                            echo '<span style="font-size: 0.7rem;">' . htmlspecialchars($item['title']) . '</span>';
                            if (!empty($item['content'])) {
                                echo '<br><small class="text-white-50" style="font-size: 0.6rem;">' . htmlspecialchars($item['content']) . '</small>';
                            }
                            if (!empty($item['link'])) {
                                echo '</a>';
                            }
                            echo '</li>';
                        }
                        
                        echo '</ul>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    // Fallback to static footer if database error occurs
                    ?>
                    <div class="col-md-4 mb-2">
                        <h6 class="mb-2" style="font-size: 0.8rem;">Contact Us</h6>
                        <ul class="list-unstyled">
                            <li class="mb-0">
                                <i class="fas fa-map-marker-alt me-1" style="font-size: 0.7rem;"></i>
                                <span style="font-size: 0.7rem;">City Hall, Candon City, Ilocos Sur</span>
                            </li>
                            <li class="mb-0">
                                <a href="tel:+63776740001" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-phone me-1" style="font-size: 0.7rem;"></i>
                                    (077) 674-0001
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="mailto:info@candoncity.gov.ph" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-envelope me-1" style="font-size: 0.7rem;"></i>
                                    info@candoncity.gov.ph
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-2">
                        <h6 class="mb-2" style="font-size: 0.8rem;">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li class="mb-0">
                                <a href="/" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-home me-1" style="font-size: 0.7rem;"></i>
                                    Home
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="/about" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-info-circle me-1" style="font-size: 0.7rem;"></i>
                                    About Us
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="/services" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-cogs me-1" style="font-size: 0.7rem;"></i>
                                    Services
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="/news" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-newspaper me-1" style="font-size: 0.7rem;"></i>
                                    News
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="/contact" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;">
                                    <i class="fas fa-envelope me-1" style="font-size: 0.7rem;"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-2">
                        <h6 class="mb-2" style="font-size: 0.8rem;">Follow Us</h6>
                        <ul class="list-unstyled">
                            <li class="mb-0">
                                <a href="https://facebook.com/candoncity" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;" target="_blank">
                                    <i class="fab fa-facebook me-1" style="font-size: 0.7rem;"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="https://twitter.com/candoncity" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;" target="_blank">
                                    <i class="fab fa-twitter me-1" style="font-size: 0.7rem;"></i>
                                    Twitter
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="https://instagram.com/candoncity" class="text-white-50 text-decoration-none" style="font-size: 0.7rem;" target="_blank">
                                    <i class="fab fa-instagram me-1" style="font-size: 0.7rem;"></i>
                                    Instagram
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
            <hr class="my-1" style="opacity: 0.1;">
            <div class="text-center">
                <p class="mb-0" style="font-size: 0.6rem;">&copy; <?php echo date('Y'); ?> Candon City Portal. All rights reserved.<span style="color: rgba(255,255,255,0.05); font-size: 0.5rem;">|</span><a href="admin/login.php" style="color: rgba(255,255,255,0.05); text-decoration: none; font-size: 0.5rem;">Admin</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 