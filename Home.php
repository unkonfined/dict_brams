<!DOCTYPE html>
<html lang="en">
<head>

    <?php 
    include("includes/fornosearchbar.php"); 
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('elements/landing-page.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #000;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 45px;
            text-align: center;
        }
        .description {
            max-width: 800px;
            padding: 20px;
            /* background-color: rgba(255, 255, 255, 0.8); */
            /* border-radius: 10px; */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            margin: 20px;
        }
        .description h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .description p {
            font-size: 1.125em;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .description button {
            /* background-color: #71A340; */
            font-size: 1.25em;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            /* transition: background-color 0.3s ease; */
        }
        .description button:hover {
            /* background-color: #5e8a2c; */
        }
        @media (min-width: 768px) {
            .container {
                flex-direction: row;
                justify-content: space-between;
                text-align: left;
            }
            .description {
                width: 45%;
                padding: 55px;
            }
            .description h1 {
                font-size: 3.5em;
            }
            .description p {
                font-size: 1.125em;
            }
        }
    </style>
</head>

<title>BRAMS</title>

<body>
<div class="container">
    <div class="description">
        <h1>YOUR PARTNER IN EFFICIENT BARANGAY MANAGEMENT</h1>
        <p>The Barangay Records Automation Management System (B.R.A.M.S) is a comprehensive software solution designed to streamline and automate the management of barangay records. Developed with the specific needs of barangay officials and administrators in mind, B.R.A.M.S offers a user-friendly platform to efficiently manage various types of records and processes within the barangay setting.</p>
        <!-- Uncomment the button below if needed -->
        <!-- <button onclick="location.href='#'">Get Started</button> -->
    </div>
</div>
</body>
</html>
