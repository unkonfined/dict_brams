<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .topfoot {
            overflow: hidden;
            /* background-color: #D8F1B9; */
            text-align: center; 
            padding: 20px 0;
        }

        .email_foot {
            color: #143A1F;
        }

        .logo_foot {
            margin-bottom: 15px;
        }

        .copyright {
            font-size: 12px;
            background-color: #143A1F;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        /* Media Query for responsive adjustments */
        @media screen and (max-width: 600px) {
            .topfoot {
                padding: 10px 0;
            }
        }

        /* CSS for container_footer */
        .container_footer {
            background-color: #D8F1B9; /* Background color */
            width: 80%; /* Adjust width */
            max-width: 600px; /* Set maximum width */
            margin: 0 auto; /* Center align horizontally */
            padding: 20px; /* Add padding */
            border-radius: 10px; /* Add border radius for rounded corners */
        }
    </style>
</head>

<body>
    <div class="topfoot">
        <div class="container_footer">
            <div class="row">
                <div class="col-md-6 mx-auto logo_foot">
                    <p>dict_example@example.com</p>
                    <img src="elements/dict_logo2.png" alt="Company Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="botfoot">
        <div class="copyright">
            <p>Copright (C) 2024 Department of Information and Communication Technology</p>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
