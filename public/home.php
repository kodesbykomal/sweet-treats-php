<?php
include '../templates/header.php';
?>

<style>
    .container {
        max-width: 800px;
        margin: 60px auto;
        background: rgba(255, 255, 255, 0.95);
        padding: 50px 40px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
        animation: fadeIn 1.2s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h1 {
        color: #d2691e;
        margin-bottom: 20px;
        font-size: 2.7rem;
        font-family: 'Georgia', serif;
    }

    p {
        font-size: 1.15rem;
        color: #444;
        margin-bottom: 30px;
    }

    a.button {
        display: inline-block;
        background: linear-gradient(135deg, #d2691e, #f4a460);
        color: #fff;
        text-decoration: none;
        padding: 14px 30px;
        border-radius: 50px;
        margin: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    a.button:hover {
        background: linear-gradient(135deg, #a0522d, #cd853f);
        transform: scale(1.05);
    }

    .testimonial {
        margin-top: 40px;
        padding: 20px;
        background: #fff8ee;
        border-left: 5px solid #d2691e;
        font-style: italic;
        color: #555;
    }

    .svg-icon {
        width: 80px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 30px 20px;
            margin: 30px 15px;
        }

        h1 {
            font-size: 2rem;
        }

        p {
            font-size: 1rem;
        }

        a.button {
            width: 100%;
            max-width: 300px;
            display: block;
            margin: 10px auto;
        }

        .svg-icon {
            width: 60px;
        }
    }
</style>

<div class="container">

    <h1>Welcome to Sweet Treats Bakery</h1>
    <p>Indulge in our daily fresh bakes and share your sweet moments with us!</p>

    <a class="button" href="menu.php">🍰 View Today's Menu</a>
    <a class="button" href="feedback.php">📝 Leave Feedback</a>
    <a class="button" href="feedback_list.php">❤️ Read Feedback</a>

    <!-- Testimonial section -->
    <div class="testimonial">
        "The best cupcakes in town! Always fresh and full of flavor." – Priya S.
    </div>
</div>

<?php include '../templates/footer.php'; ?>
