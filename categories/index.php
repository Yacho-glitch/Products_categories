<?php require_once '../database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <div class="container mt-5">
        <h2>List of categories</h2>
        <table class="table table-hover">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM categories");
                foreach($stmt as $category) {
                    echo "<tr>
                            <td>{$category['id']}</td>
                            <td>{$category['name']}</td>
                            <td>
                                <a href='edit.php?id={$category['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$category['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
        </table>
        <a href="create.php" class="btn btn-primary">Create new category</a>
        <a href="../index.php" class="btn btn-secondary">Back to home</a>
    </div>
</body>
</html>