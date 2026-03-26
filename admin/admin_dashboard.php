<?php
session_start();
require_once __DIR__ . '/../includes/auth_check.php';
require_once '../config/config.php';
include '../templates/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Sweet Treats Bakery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fffaf3;
        }

        .admin-container {
            max-width: 600px;
            margin: 100px auto 40px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.29);
            text-align: center;
        }

        h1 {
            color: #d2691e;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        a.button {
            display: block;
            padding: 14px;
            background-color:rgb(96, 190, 244);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.34);
        }

        a.button:hover {
            background-color: #a0522d;
        }

        .footer-note {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #999;
        }

        @media (max-width: 768px) {
            .admin-container {
                margin: 60px 20px;
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.6rem;
            }

            p {
                font-size: 1rem;
            }

            a.button {
                font-size: 0.95rem;
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div class="admin-container">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['admin_username']); ?>!</h1>
    <p>You are logged in as admin of Sweet Treats Bakery.</p>

    <div class="dashboard">
        <a class="button" href="update_menu.php">➕ Update Daily Menu</a>
        <a class="button" href="view_feedback.php">📝 View Customer Feedback</a>
        <a class="button" href="logout.php"> Logout</a>
    </div>

    <div class="footer-note">
        &copy; <?= date("Y"); ?> Sweet Treats Bakery | Admin Panel
    </div>
</div>

<?php include '../templates/footer.php'; ?>
</body>
</html>
