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

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['mediaFile'])) {
    $upload_dir = '../assets/uploads/';
    
    // Create uploads directory if it doesn't exist
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    $file = $_FILES['mediaFile'];
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    
    // Validate file
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 25 * 1024 * 1024; // 25MB in bytes
    
    if (!in_array($file['type'], $allowed_types)) {
        $error = 'Invalid file type. Only JPG, PNG, and GIF images are allowed.';
    } elseif ($file['size'] > $max_size) {
        $error = 'File is too large. Maximum size is 25MB.';
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Error uploading file.';
    } else {
        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $target_path = $upload_dir . $filename;
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            // Save to database
            try {
                $stmt = $pdo->prepare("INSERT INTO media (title, description, file_path, file_type) VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $description, 'assets/uploads/' . $filename, $file['type']]);
                $success = 'Media uploaded successfully.';
            } catch (PDOException $e) {
                $error = 'Error saving media information.';
                // Delete the uploaded file if database insert fails
                unlink($target_path);
            }
        } else {
            $error = 'Error moving uploaded file.';
        }
    }
}

// Fetch media items
$stmt = $pdo->query("SELECT * FROM media WHERE (status IS NULL OR status != 'archived') ORDER BY created_at DESC");
$media_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Gallery - Candon City Portal</title>
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
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        .media-item {
            position: relative;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            overflow: hidden;
        }
        .media-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .media-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .media-item:hover .overlay {
            opacity: 1;
        }
        .progress {
            display: none;
            margin-top: 10px;
        }
        .file-size-info {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        .media-item.archived {
            opacity: 0.7;
            border: 2px solid #ffc107;
        }
        .media-item.archived .overlay {
            background: rgba(255, 193, 7, 0.5);
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
                    <h1 class="h2">Media Gallery</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadMediaModal">
                        <i class="fas fa-upload me-2"></i>Upload Media
                    </button>
                </div>

                <!-- Media Grid -->
                <div class="media-grid">
                    <?php foreach ($media_items as $item): ?>
                        <div class="media-item <?php echo $item['status'] === 'archived' ? 'archived' : ''; ?>" data-media-id="<?php echo $item['id']; ?>">
                            <?php if (strpos($item['file_type'], 'image/') === 0): ?>
                                <img src="<?php echo htmlspecialchars($item['file_path']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 150px; object-fit: cover;">
                            <?php else: ?>
                                <video width="100%" height="150" controls>
                                    <source src="<?php echo htmlspecialchars($item['file_path']); ?>" type="<?php echo htmlspecialchars($item['file_type']); ?>">
                                    Your browser does not support the video tag.
                                </video>
                            <?php endif; ?>
                            <div class="overlay">
                                <div class="btn-group">
                                    <?php if ($item['status'] !== 'archived'): ?>
                                        <button class="btn btn-sm btn-light me-1" onclick="editMedia(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($item['title']); ?>', '<?php echo htmlspecialchars($item['description']); ?>')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-light" onclick="deleteMedia(<?php echo $item['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Archived</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="p-2">
                                <h6 class="mb-1"><?php echo htmlspecialchars($item['title']); ?></h6>
                                <?php if (!empty($item['description'])): ?>
                                    <p class="mb-0 small text-muted"><?php echo htmlspecialchars($item['description']); ?></p>
                                <?php endif; ?>
                                <?php if ($item['status'] === 'archived'): ?>
                                    <p class="mb-0 small text-muted">Archived on: <?php echo date('M d, Y', strtotime($item['archived_at'])); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if (empty($media_items)): ?>
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">No media items found. Upload some media to get started.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Upload Media Modal -->
    <div class="modal fade" id="uploadMediaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="" enctype="multipart/form-data" id="uploadForm">
                        <div class="mb-3">
                            <label for="mediaFile" class="form-label">Select Image</label>
                            <input type="file" class="form-control" id="mediaFile" name="mediaFile" accept=".jpg,.jpeg,.png,.gif" required>
                            <div class="file-size-info">
                                Maximum file size: 25MB<br>
                                Allowed formats: JPG, PNG, GIF
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <div class="mt-2">
                                <img id="preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none; object-fit: contain;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="uploadButton">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Media Modal -->
    <div class="modal fade" id="editMediaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editMediaId">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveEdit">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize modals
            const editModal = new bootstrap.Modal(document.getElementById('editMediaModal'));
            const uploadModal = new bootstrap.Modal(document.getElementById('uploadMediaModal'));
            
            // Make editMedia and deleteMedia functions globally available
            window.editMedia = function(id, title, description) {
                document.getElementById('editMediaId').value = id;
                document.getElementById('editTitle').value = title;
                document.getElementById('editDescription').value = description;
                editModal.show();
            };

            window.deleteMedia = function(id) {
                if (confirm('Are you sure you want to delete this media item?')) {
                    fetch('delete_media.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id=' + id
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the media item from the DOM
                            const mediaItem = document.querySelector(`[data-media-id="${id}"]`);
                            if (mediaItem) {
                                mediaItem.remove();
                            }
                            // Show success message
                            alert('Media item deleted successfully');
                            // Reload the page to refresh the grid
                            location.reload();
                        } else {
                            alert('Error deleting media: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the media.');
                    });
                }
            };

            // Save edit handler
            document.getElementById('saveEdit').addEventListener('click', function() {
                const id = document.getElementById('editMediaId').value;
                const title = document.getElementById('editTitle').value;
                const description = document.getElementById('editDescription').value;

                fetch('update_media.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}&title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error updating media: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the media.');
                });
            });

            // Preview image before upload
            const fileInput = document.getElementById('mediaFile');
            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const preview = document.getElementById('preview');
                    
                    if (!preview) {
                        console.error('Preview element not found');
                        return;
                    }

                    if (file) {
                        // Validate file size
                        if (file.size > 25 * 1024 * 1024) {
                            alert('File is too large. Maximum size is 25MB.');
                            this.value = '';
                            preview.style.display = 'none';
                            return;
                        }
                        
                        // Validate file type
                        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                        if (!validTypes.includes(file.type)) {
                            alert('Invalid file type. Only JPG, PNG, and GIF images are allowed.');
                            this.value = '';
                            preview.style.display = 'none';
                            return;
                        }
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
                        reader.onerror = function() {
                            console.error('Error reading file');
                            preview.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.style.display = 'none';
                    }
                });
            }

            // Handle form submission with progress bar
            const uploadForm = document.getElementById('uploadForm');
            if (uploadForm) {
                uploadForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const xhr = new XMLHttpRequest();
                    const progressBar = document.querySelector('.progress');
                    const progressBarInner = progressBar.querySelector('.progress-bar');
                    const uploadButton = document.getElementById('uploadButton');
                    
                    if (!progressBar || !progressBarInner || !uploadButton) {
                        console.error('Required elements not found');
                        return;
                    }
                    
                    // Show progress bar and disable submit button
                    progressBar.style.display = 'block';
                    uploadButton.disabled = true;
                    
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const percentComplete = (e.loaded / e.total) * 100;
                            progressBarInner.style.width = percentComplete + '%';
                            progressBarInner.textContent = Math.round(percentComplete) + '%';
                        }
                    });
                    
                    xhr.addEventListener('load', function() {
                        if (xhr.status === 200) {
                            location.reload();
                        } else {
                            alert('Upload failed. Please try again.');
                            uploadButton.disabled = false;
                            progressBar.style.display = 'none';
                        }
                    });
                    
                    xhr.addEventListener('error', function() {
                        alert('Upload failed. Please try again.');
                        uploadButton.disabled = false;
                        progressBar.style.display = 'none';
                    });
                    
                    xhr.open('POST', '');
                    xhr.send(formData);
                });
            }
        });
    </script>
</body>
</html> 