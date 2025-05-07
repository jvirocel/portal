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

// Handle form submission for adding service
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add_service') {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon = $_POST['icon'] ?? '';
        $link = $_POST['link'] ?? '';
        
        if (!empty($title) && !empty($description) && !empty($icon) && !empty($link)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO services (title, description, icon, link) VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $description, $icon, $link]);
                
                header('Location: services.php?success=1');
                exit;
            } catch (PDOException $e) {
                $error = "Error adding service: " . $e->getMessage();
            }
        } else {
            $error = "All fields are required";
        }
    } 
    // Handle service update
    elseif ($_POST['action'] === 'edit_service') {
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon = $_POST['icon'] ?? '';
        $link = $_POST['link'] ?? '';
        
        if (!empty($id) && !empty($title) && !empty($description) && !empty($icon) && !empty($link)) {
            try {
                $stmt = $pdo->prepare("UPDATE services SET title = ?, description = ?, icon = ?, link = ? WHERE id = ?");
                $stmt->execute([$title, $description, $icon, $link, $id]);
                
                header('Location: services.php?success=2');
                exit;
            } catch (PDOException $e) {
                $error = "Error updating service: " . $e->getMessage();
            }
        } else {
            $error = "All fields are required";
        }
    }
}

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);

// Fetch existing services
try {
    $stmt = $pdo->query("SELECT * FROM services ORDER BY id DESC");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error fetching services: " . $e->getMessage();
    $services = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Management - Candon City Portal</title>
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
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET['success'] == 1 ? 'Service added successfully!' : 'Service updated successfully!'; ?>
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
                    <h1 class="h2">Services Management</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                        <i class="fas fa-plus me-2"></i>Add New Service
                    </button>
                </div>

                <!-- Services Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($service['id']); ?></td>
                                <td><?php echo htmlspecialchars($service['title']); ?></td>
                                <td><?php echo htmlspecialchars($service['description']); ?></td>
                                <td><i class="fas <?php echo htmlspecialchars($service['icon']); ?>"></i></td>
                                <td><?php echo htmlspecialchars($service['link']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1 edit-service" 
                                            data-id="<?php echo $service['id']; ?>"
                                            data-title="<?php echo htmlspecialchars($service['title']); ?>"
                                            data-description="<?php echo htmlspecialchars($service['description']); ?>"
                                            data-icon="<?php echo htmlspecialchars($service['icon']); ?>"
                                            data-link="<?php echo htmlspecialchars($service['link']); ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="add_service">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <select class="form-select" id="icon" name="icon">
                                <option value="fa-id-card">ID Card</option>
                                <option value="fa-home">Home</option>
                                <option value="fa-file-alt">Document</option>
                                <option value="fa-comments">Comments</option>
                                <option value="fa-map-marked-alt">Map</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link (e.g., hazard-map/map-viewer.html)</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Enter the path to the service page" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="edit_service">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_icon" class="form-label">Icon</label>
                            <select class="form-select" id="edit_icon" name="icon">
                                <option value="fa-id-card">ID Card</option>
                                <option value="fa-home">Home</option>
                                <option value="fa-file-alt">Document</option>
                                <option value="fa-comments">Comments</option>
                                <option value="fa-map-marked-alt">Map</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="edit_link" name="link" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle edit button click
        document.querySelectorAll('.edit-service').forEach(button => {
            button.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById('editServiceModal'));
                document.getElementById('edit_id').value = this.dataset.id;
                document.getElementById('edit_title').value = this.dataset.title;
                document.getElementById('edit_description').value = this.dataset.description;
                document.getElementById('edit_icon').value = this.dataset.icon;
                document.getElementById('edit_link').value = this.dataset.link;
                modal.show();
            });
        });
    </script>
</body>
</html> 