<?php
require_once '../config/config.php';
include '../templates/header.php';

// Fetch all feedback entries (most recent first)
$query = "SELECT name, message, timestamp FROM feedback ORDER BY timestamp DESC";
$result = $conn->query($query);
?>

<style>
    body {
        font-family: 'Segoe UI', 'Poppins', sans-serif;
        background-color: #fffaf3;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 850px;
        margin: 60px auto;
        background: #ffffff;
        padding: 50px 40px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h2 {
        color: #d2691e;
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.2rem;
        font-family: 'Georgia', serif;
    }

    .feedback {
        border-bottom: 1px solid #e2e2e2;
        padding: 25px 0;
        transition: background-color 0.2s ease;
    }

    .feedback:hover {
        background-color: #fff5eb;
        border-radius: 10px;
        padding-left: 10px;
    }

    .name {
        font-weight: bold;
        font-size: 1.2rem;
        color: #333;
    }

    .timestamp {
        font-size: 0.9rem;
        color: #999;
        margin-top: 4px;
    }

    .message {
        margin-top: 12px;
        color: #555;
        font-size: 1rem;
        line-height: 1.5;
    }

    .no-feedback {
        text-align: center;
        color: #888;
        font-size: 1.1rem;
        margin-top: 20px;
    }

    .back-link {
        text-align: center;
        margin-top: 40px;
    }

    .back-link a {
        text-decoration: none;
        color: #d2691e;
        font-weight: bold;
        padding: 10px 20px;
        border: 2px solid #d2691e;
        border-radius: 25px;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .back-link a:hover {
        background-color: #d2691e;
        color: white;
    }

    @media (max-width: 768px) {
        .container {
            padding: 30px 20px;
            margin: 30px 15px;
        }

        h2 {
            font-size: 1.8rem;
        }

        .name {
            font-size: 1.1rem;
        }

        .message {
            font-size: 0.95rem;
        }

        .back-link a {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<div class="container">
    <h2>What Our Customers Say</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="feedback">
                <div class="name"><?= htmlspecialchars($row['name']) ?></div>
                <div class="timestamp"><?= date("F j, Y, g:i a", strtotime($row['timestamp'])) ?></div>
                <div class="message"><?= nl2br(htmlspecialchars($row['message'])) ?></div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="no-feedback">No feedback has been submitted yet.</div>
    <?php endif; ?>

    <div class="back-link">
        <a href="home.php">← Back to Home</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
