<?php
require_once 'config/database.php';

// Get all about page content
$stmt = $pdo->query("SELECT * FROM about_page ORDER BY display_order");
$about_content = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group content by section
$sections = [];
foreach ($about_content as $content) {
    $sections[$content['section']] = $content;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Candon City - Candon City Government Services Portal</title>
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
        
        .about-header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo isset($sections['header']['image_url']) ? $sections['header']['image_url'] : 'https://eos.com/wp-content/uploads/2024/10/growing-tobacco-main.jpg.webp'; ?>');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
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
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- About Header -->
    <section class="about-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">About Candon City</h1>
            <p class="lead">Discover the Heart of Ilocos Sur</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if (isset($sections['history'])): ?>
                        <h2 class="mb-4"><?php echo htmlspecialchars($sections['history']['title']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($sections['history']['content'])); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <?php if (isset($sections['vision'])): ?>
                        <h2 class="mb-4"><?php echo htmlspecialchars($sections['vision']['title']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($sections['vision']['content'])); ?></p>
                    <?php endif; ?>
                    
                    <?php if (isset($sections['mission'])): ?>
                        <h2 class="mb-4 mt-4"><?php echo htmlspecialchars($sections['mission']['title']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($sections['mission']['content'])); ?></p>
                    <?php endif; ?>
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