<?php
require_once '../config/config.php';
include '../templates/header.php';

// Get today's date
$today = date('Y-m-d');

// Fetch today's menu from the database 
$stmt = $conn->prepare("SELECT item_name, description, price FROM menu WHERE date_posted = ?");
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();
?>

<style>
    /* Main container */
    .container {
        max-width: 900px;
        margin: 60px auto;
        background: #fff;
        padding: 50px 40px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', 'Poppins', sans-serif;
    }

    /* Heading */
    h2 {
        color: #d2691e;
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.2rem;
        font-family: 'Georgia', serif;
    }

    /* Each menu item block */
    .menu-item {
        border-bottom: 1px solid #e2e2e2;
        padding: 25px 0;
        transition: background-color 0.2s ease;
    }

    .menu-item:hover {
        background-color: #fff7ef;
        border-radius: 10px;
        padding-left: 10px;
    }

    .item-name {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
    }

    .description {
        color: #666;
        margin: 8px 0 12px;
        font-size: 1rem;
    }

    .price {
        color: #a0522d;
        font-weight: bold;
        font-size: 1.1rem;
    }

    /* Fallback message */
    .no-items {
        text-align: center;
        font-size: 1.2rem;
        color: #999;
        margin-top: 40px;
    }

    /* Back to home link */
    .back-link {
        text-align: center;
        margin-top: 40px;
    }

    .back-link a {
        text-decoration: none;
        color: #d2691e;
        font-weight: bold;
        font-size: 1rem;
        border: 2px solid #d2691e;
        padding: 10px 20px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .back-link a:hover {
        background-color: #d2691e;
        color: #fff;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        .container {
            padding: 30px 20px;
            margin: 30px 15px;
        }

        h2 {
            font-size: 1.8rem;
        }

        .item-name {
            font-size: 1.2rem;
        }

        .description,
        .price {
            font-size: 1rem;
        }

        .back-link a {
            display: inline-block;
            width: 100%;
            max-width: 280px;
        }
    }
</style>

<div class="container">
    <h2>Today's Fresh Menu</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="menu-item">
                <div class="item-name"><?= htmlspecialchars($row['item_name']); ?></div>
                <div class="description"><?= htmlspecialchars($row['description']); ?></div>
                <div class="price">£<?= number_format($row['price'], 2); ?></div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="no-items">We're still baking! Please check back soon for today's specials.</div>
    <?php endif; ?>

    <div class="back-link">
        <a href="home.php">← Back to Home</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
