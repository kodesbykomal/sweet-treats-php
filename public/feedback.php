<?php
require_once '../config/config.php';
include '../templates/header.php';

$name = $email = $message = "";
$success = $error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $success = "Thank you for your feedback!";
            $name = $email = $message = "";
        } else {
            $error = "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
}
?>

<style>
    body {
        font-family: 'Segoe UI', 'Poppins', sans-serif;
        background-color: #fffaf3;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 60px auto 50px auto;
        background: #ffffff;
        padding:  40px 50px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h2 {
        color: #d2691e;
        text-align: center;
        margin-bottom: 35px;
        font-size: 2rem;
        font-family: 'Georgia', serif;
    }

    form label {
        display: block;
        margin-top: 20px;
        font-weight: 600;
        color: #444;
        font-size: 1rem;
    }

    form input,
    form textarea {
        width: 100%;
        padding: 12px 15px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        transition: border 0.2s ease;
    }

    form input:focus,
    form textarea:focus {
        border-color: #d2691e;
        outline: none;
    }

    form textarea {
        resize: vertical;
        height: 140px;
    }

    .btn {
        background: linear-gradient(to right, #d2691e, #f4a460);
        color: white;
        padding: 14px 30px;
        margin-top: 30px;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
        background: linear-gradient(to right, #a0522d, #cd853f);
        transform: scale(1.03);
    }

    .message {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
        padding: 12px;
        border-radius: 8px;
    }

    .message.success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
    }

    .message.error {
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
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
            font-size: 1.6rem;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="container">
    <h2>We value your feedback!</h2>

    <?php if ($success): ?>
        <div class="message success"><?= htmlspecialchars($success) ?></div>
    <?php elseif ($error): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required>

        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

        <label for="message">Your Feedback:</label>
        <textarea name="message" id="message" required><?= htmlspecialchars($message) ?></textarea>

        <button type="submit" class="btn">Submit Feedback</button>
    </form>

    <div class="back-link">
        <a href="home.php">← Back to Home</a>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
