<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM employs WHERE id=$id";
    $conn->query($sql);
    header('Location: index.php?status=deleted');
    exit;
}
if ($id <= 0) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="card shadow-lg p-4" style="min-width:350px; max-width:400px; width:100%; border-radius: 18px;">
        <h2 class="text-center mb-4 text-danger">Delete Employee</h2>
        <p class="text-center mb-4">Are you sure you want to delete this employee?</p>
        <form method="post" class="d-flex justify-content-between">
          <button type="submit" class="btn btn-danger w-50 me-2">Delete</button>
          <a href="index.php" class="btn btn-outline-secondary w-50 ms-2">Cancel</a>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>