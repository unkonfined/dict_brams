<!DOCTYPE html>
<html>
<head>
<?php
    include("includes/top_navbar.php");
    include("includes/bot_navbar.php");
    ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('elements/landing-page.png');
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: cover;
    }
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 45px;
        color: #000;
    }
    .description {
        width: 45%;
        padding: 55px;
    }

    .h1 {
     font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
    <div class="description">
        <h1 style="font-size:70px">YOUR PARTNER IN EFFICIENT BARANGAY MANAGEMENT</h1>
        <br/>
        <p style="font-size:18px">The Barangay Records Automation Management System (B.R.A.M.S) is a comprehensive software solution designed to streamline and automate the management of barangay records. Developed with the specific needs of barangay officials and administrators in mind, B.R.A.M.S offers a user-friendly platform to efficiently manage various types of records and processes within the barangay setting.</p>
        <br/>
        <button onclick="location.href='#'" style="background-color: #71A340; font-size: 20px; color: #fff; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer;">Get Started</button>
    </div>


</body>

</html>
