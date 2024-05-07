<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.R.A.M.S - Barangay Records Automation Management System</title>
    <style>
        body {
            background-color: #D1FFBD;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            color: #000;
            padding-bottom: 265px;
        }
        .description {
            width: 50%;
            padding: 20px;
        }
        .login {
            width: 40%;
            background-color: #71A340;
            padding: 20px;
            border-radius: 5px;
        }
        .login input[type="text"],
        .login input[type="password"],
        .login input[type="submit"] {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 3px;
            border: none;
        }
        .login input[type="submit"] {
            background-color: #92C74D;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    include("includes/top_navbar.php");
    ?>

<div class="container">
    <div class="description">
        <h1>Welcome to B.R.A.M.S</h1>
        <p>The Barangay Records Automation Management System (B.R.A.M.S) is a comprehensive software solution designed to streamline and automate the management of barangay records. Developed with the specific needs of barangay officials and administrators in mind, B.R.A.M.S offers a user-friendly platform to efficiently manage various types of records and processes within the barangay setting.</p>
        <button onclick="location.href='#'" style="background-color: #71A340; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Get Started</button>
    </div>
    <div class="login">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</div>

</body>

<?php
    include("includes/footer.php");
    ?>
</html>
