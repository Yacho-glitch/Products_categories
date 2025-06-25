<?php 
    require_once 'database.php';

    if(isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $product = $stmt->fetch();

    }
      

    if (isset($_POST['name'])) {
        $name        = $_POST['name'];
        $description = $_POST['description'];
        $price       = $_POST['price'];
        $quantity    = $_POST['quantity'];
        $category    = $_POST['category'];

        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, quantity = ?, category_id = ? WHERE id = ?");
        $stmt->execute([$name, $description, $price, $quantity, $category, $_GET['id']]);
        
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
    <title>Edit</title>
</head>
<body>
        <div class="container mt-5">
        <h2>Edit Product</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<? $product['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" required><?= htmlspecialchars($product['description'])?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" name="price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <?php 
                    // Fetch categories from the database
                    $stmt = $pdo->query("SELECT id, name FROM categories")->fetchAll();
                    foreach ($stmt as $category):
                        $selected = ($category['id'] == $product['category_id']) ? "selected" : "";
                    ?>
                    <option value="<?= $category['id'] ?>" <?= $selected ?>><?= htmlspecialchars($category['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
</body>
</html>