<?php require_once 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List all products</title>
</head>
<body>
    <div class="container mt-5">
        <h2>List all products</h2>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                // Fetch products from the database
                $stmt = $pdo->query("SELECT p.id, p.name, p.description, p.price, p.quantity, c.name AS category_name, p.created_at FROM products p LEFT JOIN categories c ON p.category_id = c.id");
                foreach ($stmt as $product) {
                    echo "<tr>
                            <td>{$product['id']}</td>
                            <td>{$product['name']}</td>
                            <td>{$product['description']}</td>
                            <td>\${$product['price']}</td>
                            <td>{$product['quantity']}</td>
                            <td>{$product['category_name']}</td>
                            <td>{$product['created_at']}</td>
                            <td>
                                <a href='edit.php?id={$product['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$product['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Create Product</a>
    </div>
</body>
</html>