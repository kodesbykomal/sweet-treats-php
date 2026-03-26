<?php
require_once '../config/config.php';
include '../templates/header.php';

$searchTerm = "";
$results = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchTerm = trim($_POST['search']);

    if (empty($searchTerm)) {
        $error = "Please enter a search term.";
    } else {
        $likeTerm = "%" . $searchTerm . "%";
        $stmt = $conn->prepare("SELECT item_name, description, price FROM menu WHERE item_name LIKE ?");
        $stmt->bind_param("s", $likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Menu | Sweet Treats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffaf3;
            margin: 0;
            padding: 0;
        }

        /* Sticky Header Fix */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #d2691e;
            padding: 15px 0;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.8rem;
            margin: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            font-size: 1rem;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 60px auto;
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #d2691e;
            text-align: center;
            margin-bottom: 25px;
            font-size: 2rem;
        }

        form {
            text-align: center;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 12px;
            width: 70%;
            max-width: 400px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            padding: 12px 20px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 8px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #a0522d;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .menu-item {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }

        .item-name {
            font-weight: bold;
            font-size: 1.3rem;
            color: #333;
        }

        .description {
            margin: 5px 0;
            color: #555;
            font-size: 1rem;
        }

        .price {
            color: #444;
            font-weight: bold;
        }

        .no-results {
            text-align: center;
            font-size: 1.1rem;
            color: #777;
            margin-top: 20px;
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
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px 20px;
            }

            header h1 {
                font-size: 1.5rem;
                margin-bottom: 10px;
            }

            nav {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            nav a {
                font-size: 0.95rem;
                margin: 0 5px;
            }

            input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            button {
                width: 100%;
                margin-top: 10px;
            }

            .container {
                padding: 30px 20px;
                margin: 30px 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search Our Menu</h2>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="search" placeholder="e.g. Croissant" value="<?= htmlspecialchars($searchTerm) ?>">
        <button type="submit">Search</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !$error): ?>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $item): ?>
                <div class="menu-item">
                    <div class="item-name"><?= htmlspecialchars($item['item_name']) ?></div>
                    <div class="description"><?= htmlspecialchars($item['description']) ?></div>
                    <div class="price">£<?= number_format($item['price'], 2) ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results">No matching items found.</div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="back-link">
        <a href="home.php">← Back to Home</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
