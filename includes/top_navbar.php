<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>   
        #dateTime {
            text-align: right;
            color: #ffffff;
            background-color: #143A1F;
            padding: 5px;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
            /* Added responsive styles */
            max-width: 100%; /* Ensures the container doesn't overflow */
            box-sizing: border-box; /* Keeps padding inside the width */
            overflow: hidden; /* Prevents overflow of content */
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
</body>
</html>
