<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .topnav {
            overflow: hidden;
            background-color: #D8F1B9;
            padding: 10px;
        }

        .topnav img {
            max-width: 100px;
            height: auto;
            float: left;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 8px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            border-radius: 5px;
        }

        .topnav .search-container button {
            padding: 8px 12px;
            margin-top: 8px;
            background: #143A1F;
            color: #fff;
            font-size: 17px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @media screen and (max-width: 600px) {
            .topnav img {
                float: none;
                display: block;
                margin: 0 auto;
            }

            .topnav .search-container {
                float: none;
                text-align: center;
                margin-top: 10px;
            }

            .topnav input[type=text] {
                width: 80%;
            }

            .topnav .search-container button {
                width: 80%;
            }
        }

        #dateTime {
            text-align: right;
            color: #ffffff;
            background-color: #143A1F;
            padding: 5px;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
            max-width: 100%;
            box-sizing: border-box;
            overflow: hidden;
        }

        .btn-group-nav {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-group-nav form {
            flex: 1;
            min-width: 10%;
        }

        .btn-group-nav button {
            align-items: center;
            border: 1px solid transparent;
            color: black;
            padding: 10px 24px;
            cursor: pointer;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            height: 65px;
            font-size: 15px;
            transition: background-color 0.3s;
        }

        .btn-group-nav button:hover {
            background-color: #D8F1B9;
        }

        @media (max-width: 768px) {
            .btn-group-nav button {
                font-size: 12px;
                padding: 8px 12px;
                height: auto;
            }
        }

        @media (max-width: 480px) {
            .btn-group-nav button {
                font-size: 10px;
                padding: 6px 10px;
                height: auto;
            }
        }

        @media (max-width: 320px) {
            .btn-group-nav button {
                font-size: 8px;
                padding: 4px 8px;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div id="dateTime">
        <?php
            // Set the timezone to Philippines
            date_default_timezone_set('Asia/Manila');

            // Get the complete current date and time
            $completeDateTime = date('l, F j, Y h:i:s A');

            // Display the result
            echo "<p>PHILIPPINE STANDARD TIME: $completeDateTime</p>";
        ?>
    </div>
    <div class="btn-group-nav">
        <form action="Home.php" method="get">
            <button type="submit">HOME</button>
        </form>
        <form action="resident_form.php" method="get">
            <button type="submit">REGISTRATION FORM</button>
        </form>
        <form action="household_form.php" method="get">
            <button type="submit">HOUSEHOLD FORM</button>
        </form>
        <form action="resident_profile.php" method="get">
            <button type="submit">LIST OF RESIDENTS</button>
        </form>
        <form action="MenuOfDocuments.php" method="get">
            <button type="submit">Household Profile</button>
        </form>
    </div>
</body>
</html>
