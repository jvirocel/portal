<?php
session_start();
require_once '../config/database.php';

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit;
}

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'update') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image_url = $_POST['image_url'];
            
            $stmt = $pdo->prepare("UPDATE about_page SET title = ?, content = ?, image_url = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image_url, $id]);
            
            $_SESSION['message'] = "Content updated successfully!";
        }
    }
}

// Get all about page content
$stmt = $pdo->query("SELECT * FROM about_page ORDER BY display_order");
$about_content = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page Management - Candon City Portal</title>
    <link rel="icon" type="image/jpeg" href="../assets/img/Seal.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
        }
        .sidebar .nav-link:hover {
            color: rgba(255,255,255,1);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255,255,255,.1);
        }
        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4>Admin Panel</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                                <i class="fas fa-home me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'news.php' ? 'active' : ''; ?>" href="news.php">
                                <i class="fas fa-newspaper me-2"></i> News Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'services.php' ? 'active' : ''; ?>" href="services.php">
                                <i class="fas fa-cog me-2"></i> Services Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'media.php' ? 'active' : ''; ?>" href="media.php">
                                <i class="fas fa-image me-2"></i> Media Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>" href="about.php">
                                <i class="fas fa-info-circle me-2"></i> About Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'footer.php' ? 'active' : ''; ?>" href="footer.php">
                                <i class="fas fa-shoe-prints me-2"></i> Footer Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?logout=1">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">About Page Management</h1>
                </div>

                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <?php foreach ($about_content as $content): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><?php echo htmlspecialchars($content['title']); ?></h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?php echo $content['id']; ?>">
                                        
                                        <div class="mb-3">
                                            <label for="title_<?php echo $content['id']; ?>" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title_<?php echo $content['id']; ?>" 
                                                   name="title" value="<?php echo htmlspecialchars($content['title']); ?>" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="content_<?php echo $content['id']; ?>" class="form-label">Content</label>
                                            <textarea class="form-control" id="content_<?php echo $content['id']; ?>" 
                                                      name="content" rows="5" required><?php echo htmlspecialchars($content['content']); ?></textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="image_url_<?php echo $content['id']; ?>" class="form-label">Image URL</label>
                                            <input type="text" class="form-control" id="image_url_<?php echo $content['id']; ?>" 
                                                   name="image_url" value="<?php echo htmlspecialchars($content['image_url']); ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Update Content</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 