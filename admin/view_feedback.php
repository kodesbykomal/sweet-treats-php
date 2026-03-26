<?php
session_start();
require_once __DIR__ . '/../includes/auth_check.php';
require_once '../config/config.php';
include '../templates/header.php';

// Fetch feedback from database (most recent first)
$sql = "SELECT name, message, timestamp FROM feedback ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #fdf6f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 850px;
        margin: 60px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h2 {
        text-align: center;
        color: #d2691e;
        font-size: 2rem;
        margin-bottom: 30px;
    }

    .feedback-entry {
        padding: 20px;
        border: 1px solid #eee;
        border-left: 6px solid #d2691e;
        border-radius: 10px;
        margin-bottom: 20px;
        background-color: #fffaf5;
        transition: transform 0.3s ease;
    }

    .feedback-entry:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
    }

    .feedback-name {
        font-weight: bold;
        font-size: 1.1rem;
        color: #333;
    }

    .feedback-message {
        margin: 10px 0;
        color: #555;
        font-size: 1rem;
        white-space: pre-wrap;
        line-height: 1.6;
    }

    .timestamp {
        font-size: 0.85rem;
        color: #999;
    }

    .no-feedback {
        text-align: center;
        color: #777;
        font-size: 1.1rem;
        padding: 30px 0;
    }

    .back-link {
        text-align: center;
        margin-top: 40px;
    }

    .back-link a {
        color: #d2691e;
        text-decoration: none;
        font-weight: bold;
        font-size: 1rem;
        padding: 10px 18px;
        border-radius: 30px;
        background: #fff3e6;
        border: 1px solid #f1c6a0;
        transition: all 0.3s ease;
    }

    .back-link a:hover {
        background: #ffe1c4;
        color: #a0522d;
    }

    @media (max-width: 600px) {
        .container {
            padding: 25px 20px;
            margin: 30px 15px;
        }

        h2 {
            font-size: 1.6rem;
        }

        .feedback-entry {
            padding: 15px;
        }

        .feedback-name {
            font-size: 1rem;
        }

        .feedback-message {
            font-size: 0.95rem;
        }
    }
</style>

<div class="container">
    <h2>Customer Feedback</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="feedback-entry">
                <div class="feedback-name"><?= htmlspecialchars($row['name']); ?></div>
                <div class="feedback-message"><?= nl2br(htmlspecialchars($row['message'])); ?></div>
                <div class="timestamp"><?= date("d M Y, H:i", strtotime($row['timestamp'])); ?></div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="no-feedback">No feedback has been submitted yet.</div>
    <?php endif; ?>

    <div class="back-link">
        <a href="admin_dashboard.php">← Back to Dashboard</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
