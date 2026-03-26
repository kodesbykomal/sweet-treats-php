<?php
session_start();
require_once __DIR__ . '/../includes/auth_check.php';
require_once '../config/config.php';
include '../templates/header.php';

$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = trim($_POST["item_name"]);
    $desc = trim($_POST["description"]);
    $price = floatval($_POST["price"]);

    $stmt = $conn->prepare("INSERT INTO menu (item_name, description, price, date_posted) VALUES (?, ?, ?, CURDATE())");
    $stmt->bind_param("ssd", $item, $desc, $price);

    if ($stmt->execute()) {
        $msg = "Menu item added successfully!";
    } else {
        $msg = "Error adding item.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Menu Item | Sweet Treats Bakery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffaf3;
        }

        .form-container {
            max-width: 600px;
            margin: 100px auto 50px auto;
            background:rgba(255, 255, 255, 0.52);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.34);
        }

        h2 {
            text-align: center;
            color: #d2691e;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color:rgb(96, 161, 222);
            color: #fff;
            padding: 14px;
            border: none;
            margin-top: 25px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #a0522d;
        }

        .msg {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            text-decoration: none;
            color: #d2691e;
            font-weight: bold;
            border: 2px solid #d2691e;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            background-color: #d2691e;
            color: #fff;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 60px 20px;
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            input[type="submit"] {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Daily Menu Item</h2>

    <?php if ($msg): ?>
        <p class='msg'><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label for="price">Price (£):</label>
        <input type="number" step="0.01" name="price" required>

        <input type="submit" value="Add Item">
    </form>

    <div class="back-link">
        <a href="admin_dashboard.php">← Back to Dashboard</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
</body>
</html>
