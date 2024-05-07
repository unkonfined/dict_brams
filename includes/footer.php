<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #D8F1B9;
            padding: 40px 20px; /* Reduced padding to make it narrower */
            border-radius: 20px; /* Rounded corners */
            max-width: 60%; /* Maximum width for the footer */
            margin: 0 auto; /* Center the footer horizontally */
        }

        .email_foot {
            color: #6c757d;
            font-size: 20px; /* Increased font size */
        }

        .logo_foot {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the content horizontally */
            text-align: center; /* Center the text */
        }

        .logo_foot img {
            max-width: auto; /* Increased image width */
            max-height: 200px;
            margin-bottom: 15px;
        }

        .copyright {
            font-size: 14px;
            color: #6c757d;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Footer -->
    <footer class="footer">
            <div class="row justify-content-center"> <!-- Centering the content -->
                <div class="col-md-6"> <!-- Adjust the column width based on your design -->
                    <div class="logo_foot">
                        <img src="elements/dict_logo2.png" alt="Company Logo">
                        <p class="email_foot">contact@example.com</p>
                    </div>
                </div>
            </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright">
        <p>&copy; 2024 Department of Information and Communication Technology</p>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
