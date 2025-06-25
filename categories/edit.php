<?php require_once '../database.php';

    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $category = $stmt->fetch();

    }

    if (isset($_POST['name']) && isset($_POST['id'])) {
        // Get the ID of the category to be updated
        $id = $_POST['id'];
        $name = $_POST['name'];

        // Insert the new category into the database
        $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);

        header("Location: index.php");
        exit();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Categorie</title>
</head>
<body>
     <div class="container mt-5">
        <h2>Create a new category</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Back to categories</a>
        </form>
    </div>
</body>
</html>