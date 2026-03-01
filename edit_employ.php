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
    <title>Edit Employ</title>
    <style>
        form { width: 300px; margin: 40px auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 6px; }
        input[type="submit"] { margin-top: 15px; padding: 8px 16px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Edit Employ</h2>
    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($employ['name']) ?>" required>
        <label>Position:</label>
        <input type="text" name="position" value="<?= htmlspecialchars($employ['position']) ?>" required>
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" value="<?= $employ['salary'] ?>" required>
        <input type="submit" value="Update Employ">
    </form>
    <div style="text-align:center;"><a href="index.php">Back to List</a></div>
</body>
</html>