<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $sql = "UPDATE employs SET name='$name', position='$position', salary='$salary' WHERE id=$id";
    if ($conn->query($sql)) {
        header('Location: index.php?status=success');
        exit;
    } else {
        header('Location: index.php?status=error');
        exit;
    }
}

$sql = "SELECT * FROM employs WHERE id=$id";
$result = $conn->query($sql);
$employ = $result ? $result->fetch_assoc() : null;
if (!$employ) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Edit Employee</title>
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
                <h2 class="text-center mb-4 text-primary">Edit Employee</h2>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger text-center" role="alert"><?= $error ?></div>
                <?php endif; ?>
                <form method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($employ['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="<?= htmlspecialchars($employ['position']) ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" step="0.01" value="<?= $employ['salary'] ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary w-50 me-2">Update Employee</button>
                        <a href="index.php" class="btn btn-outline-secondary w-50 ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>