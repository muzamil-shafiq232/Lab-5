<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $position = $conn->real_escape_string($_POST['position']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $sql = "INSERT INTO employs (name, position, salary) VALUES ('$name', '$position', '$salary')";
    if ($conn->query($sql)) {
        header('Location: index.php');
        exit;
    } else {
        $error = 'Error: ' . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employ</title>
    <style>
        form { width: 300px; margin: 40px auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 6px; }
        input[type="submit"] { margin-top: 15px; padding: 8px 16px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Add New Employ</h2>
    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Position:</label>
        <input type="text" name="position" required>
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" required>
        <input type="submit" value="Add Employ">
    </form>
    <div style="text-align:center;"><a href="index.php">Back to List</a></div>
</body>
</html>