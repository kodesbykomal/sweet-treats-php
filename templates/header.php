<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sweet Treats Bakery</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Poppins', sans-serif;
            background-color: #fffaf3;
        }

        /* Header Container */
        header {
            background: linear-gradient(to right, #d2691e, #f4a460);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Website Name */
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #fff8f0;
            font-family: 'Georgia', serif;
            letter-spacing: 1px;
        }

        /* Navigation Menu */
        nav a {
            text-decoration: none;
            color: #fff;
            background-color: #a0522d;
            padding: 8px 16px;
            border-radius: 20px;
            margin-left: 10px;
            font-weight: 600;
            transition: background 0.3s, transform 0.2s;
        }

        nav a:hover {
            background-color: #8b4513;
            transform: translateY(-2px);
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            nav {
                margin-top: 15px;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            nav a {
                margin: 5px 8px 5px 0;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Sweet Treats Bakery</div>
    <nav>
        <a href="/Sweet_Treats/website_code/public/home.php">Home</a>
        <a href="/Sweet_Treats/website_code/public/menu.php">Menu</a>
        <a href="/Sweet_Treats/website_code/public/feedback.php">Leave Feedback</a>
        <a href="/Sweet_Treats/website_code/public/feedback_list.php">Customer Reviews</a>
        <a href="/Sweet_Treats/website_code/public/search_menu.php">Search Menu</a>
    </nav>
</header>

</body>
</html>
