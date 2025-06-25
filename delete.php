<?php require_once 'database.php';

    // if(isset($_GET['id'])) {

    //     $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    //     $stmt->execute([$_GET['id']]);
    //     header("Location: index.php");
    //     exit();
    // }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    //     $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    //     if ($id) {
    //         $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    //         if ($stmt->execute([$id])) {
    //             header("Location: index.php?deleted=1");
    //             exit();
    //         } else {
    //         echo "Error deleting product.";
    //         }
    //     } else {
    //         echo "Invalid ID.";
    //     }
    // } else {
    //     echo "Invalid request.";
    // }

    // // Allow deletion via GET (not recommended)
    // if (isset($_GET['id'])) {
    //     $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    //     if ($id) {
    //         $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    //         if ($stmt->execute([$id])) {
    //             header("Location: index.php?deleted=1");
    //             exit();
    //         } else {
    //             echo "Error deleting product.";
    //         }
    //         } else {
    //             echo "Invalid ID.";
    //         }
    // } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    //     $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    //     if ($id) {
    //         $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    //         if ($stmt->execute([$id])) {
    //             header("Location: index.php?deleted=1");
    //             exit();
    //         } else {
    //             echo "Error deleting product.";
    //         }
    //     } else {
    //         echo "Invalid ID.";
    //     }
    // } else {
    //     echo "Invalid request.";
    // }

    if (isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
            if ($stmt->execute([$id])) {
                header("Location: index.php?deleted=1");
                exit();
            } else {
                echo "Error deleting product.";
            }
        } else {
            echo "Invalid ID.";
        }
    } else {
        echo "Invalid request.";
    }