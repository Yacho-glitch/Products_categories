<?php require_once 'database.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new product</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add new product</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <!-- <option value="1">Electronics</option>
                    <option value="2">Books</option>
                    <option value="3">Clothing</option>
                    <option value="4">Home & Kitchen</option> -->

                    <?php 
                    // Fetch categories from the database
                    $stmt = $pdo->query("SELECT id, name FROM categories")->fetchAll();
                    foreach ($stmt as $category) {
                        echo "<option value='{$category['id']}'>{$category['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="index.php" class="btn btn-secondary">Back to List</a>
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];
            $created_at = date('Y-m-d H:i:s');


            $stmt = $pdo->prepare("INSERT INTO products (name, description, price, quantity, category_id, created_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $description, $price, $quantity, $category, $created_at]);

            echo "<div class='alert alert-success mt-3'>Product created successfully!</div>";
            echo "<a href='index.php' class='btn btn-success mt-2'>View Products</a>";

        } else {
            echo "<div class='alert alert-info mt-3'>Fill the form to create a new product.</div>";
        }
        ?>
    </div>
</body>
</html>