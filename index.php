<?php
include 'db.php';

$sql = "SELECT * FROM employs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg p-4" style="border-radius: 18px;">
            <h2 class="text-center mb-4 text-primary">Employees List</h2>
            <?php if (isset($_GET['status'])): ?>
                <div class="mb-3">
                    <?php if ($_GET['status'] === 'success'): ?>
                        <div class="alert alert-success text-center" role="alert">Employee updated successfully.</div>
                    <?php elseif ($_GET['status'] === 'error'): ?>
                        <div class="alert alert-danger text-center" role="alert">Error updating employee. Please try again.</div>
                    <?php elseif ($_GET['status'] === 'deleted'): ?>
                        <div class="alert alert-warning text-center" role="alert">Employee deleted successfully.</div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="mb-3 text-end">
                <a href="add_employ.php" class="btn btn-success">Add New Employee</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['position']) ?></td>
                                    <td><?= $row['salary'] ?></td>
                                    <td>
                                        <a href="edit_employ.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm me-1">Edit</a>
                                        <a href="delete_employ.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">No employees found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>