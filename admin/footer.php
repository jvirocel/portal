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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_footer') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];
        $display_order = $_POST['display_order'];

        try {
            $stmt = $pdo->prepare("UPDATE footer SET title = ?, content = ?, link = ?, icon = ?, display_order = ? WHERE id = ?");
            $stmt->execute([$title, $content, $link, $icon, $display_order, $id]);
            
            header('Location: footer.php?success=1');
            exit;
        } catch (PDOException $e) {
            $error = "Error updating footer item: " . $e->getMessage();
        }
    }
}

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);

// Fetch footer items grouped by section
try {
    $stmt = $pdo->query("SELECT * FROM footer ORDER BY section, display_order");
    $footer_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group items by section
    $footer_sections = [];
    foreach ($footer_items as $item) {
        $footer_sections[$item['section']][] = $item;
    }
} catch (PDOException $e) {
    $error = "Error fetching footer items: " . $e->getMessage();
    $footer_sections = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Management - Candon City Portal</title>
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
        .section-title {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
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
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Footer item updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Footer Management</h1>
                </div>

                <!-- Footer Sections -->
                <?php foreach ($footer_sections as $section => $items): ?>
                    <div class="section-title">
                        <h3><?php echo ucwords(str_replace('_', ' ', $section)); ?></h3>
                    </div>
                    <div class="table-responsive mb-4">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Link</th>
                                    <th>Icon</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                                    <td><?php echo htmlspecialchars($item['content']); ?></td>
                                    <td><?php echo htmlspecialchars($item['link']); ?></td>
                                    <td><i class="fas <?php echo htmlspecialchars($item['icon']); ?>"></i></td>
                                    <td><?php echo $item['display_order']; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-footer" 
                                                data-id="<?php echo $item['id']; ?>"
                                                data-title="<?php echo htmlspecialchars($item['title']); ?>"
                                                data-content="<?php echo htmlspecialchars($item['content']); ?>"
                                                data-link="<?php echo htmlspecialchars($item['link']); ?>"
                                                data-icon="<?php echo htmlspecialchars($item['icon']); ?>"
                                                data-order="<?php echo $item['display_order']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            </main>
        </div>
    </div>

    <!-- Edit Footer Modal -->
    <div class="modal fade" id="editFooterModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Footer Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="update_footer">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_content" class="form-label">Content</label>
                            <input type="text" class="form-control" id="edit_content" name="content">
                        </div>
                        <div class="mb-3">
                            <label for="edit_link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="edit_link" name="link">
                        </div>
                        <div class="mb-3">
                            <label for="edit_icon" class="form-label">Icon</label>
                            <select class="form-select" id="edit_icon" name="icon">
                                <option value="fa-map-marker-alt">Map Marker</option>
                                <option value="fa-phone">Phone</option>
                                <option value="fa-envelope">Envelope</option>
                                <option value="fa-home">Home</option>
                                <option value="fa-info-circle">Info</option>
                                <option value="fa-cogs">Cogs</option>
                                <option value="fa-newspaper">Newspaper</option>
                                <option value="fa-facebook">Facebook</option>
                                <option value="fa-twitter">Twitter</option>
                                <option value="fa-instagram">Instagram</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_order" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="edit_order" name="display_order" min="1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle edit button click
        document.querySelectorAll('.edit-footer').forEach(button => {
            button.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById('editFooterModal'));
                document.getElementById('edit_id').value = this.dataset.id;
                document.getElementById('edit_title').value = this.dataset.title;
                document.getElementById('edit_content').value = this.dataset.content;
                document.getElementById('edit_link').value = this.dataset.link;
                document.getElementById('edit_icon').value = this.dataset.icon;
                document.getElementById('edit_order').value = this.dataset.order;
                modal.show();
            });
        });
    </script>
</body>
</html> 