<?php
include 'db.php';

$sql = "SELECT * FROM employs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employs List</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        a { margin: 0 5px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Employs List</h2>
    <?php if (isset($_GET['status'])): ?>
        <div style="width:60%;margin:10px auto;text-align:center;">
            <?php if ($_GET['status'] === 'success'): ?>
                <div style="background:#d4edda;color:#155724;padding:10px;border:1px solid #c3e6cb;">Employee updated successfully.</div>
            <?php elseif ($_GET['status'] === 'error'): ?>
                <div style="background:#f8d7da;color:#721c24;padding:10px;border:1px solid #f5c6cb;">Error updating employee. Please try again.</div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <a href="add_employ.php" style="margin-left:20px;">Add New Employ</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['position']) ?></td>
                    <td><?= $row['salary'] ?></td>
                    <td>
                        <a href="edit_employ.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete_employ.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this employ?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No employs found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>