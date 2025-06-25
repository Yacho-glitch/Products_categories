<?php require_once '../database.php'; 

    // Check if the ID is provided in the URL
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>No category ID provided.</div>";
    }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'];

//     // Execute the delete statement
//     if ($stmt->execute([$id])) {
//         echo "<div class='alert alert-success'>Category deleted successfully!</div>";
//     } else {
//         echo "<div class='alert alert-danger'>Error deleting category.</div>";
//     }
// }


?>

