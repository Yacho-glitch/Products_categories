<?php require_once '../database.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Create categorie</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Create a new category</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Back to categories</a>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];

                // Insert the new category into the database
                $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
                $stmt->execute([$name]);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Category created successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error creating category.</div>";
                }
            }
        ?>
    </div>
</body>
</html>