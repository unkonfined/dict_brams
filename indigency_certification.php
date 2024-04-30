<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Responsive Form</title> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 20px;
        }

        /* Logo and Banner */
        .logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: solid;
            border-color: #143A1F;
        }

        .behind-logo {
            width: 500px;
            position: relative;
            display: flex;
            align-items: center;
            opacity: 0.3;

        }

        .officers {
            font-size: 1.05rem;
            margin-top: 10px;
            margin-bottom: 10px;y
            border-top-style: none;
            border-right-style: solid;
            border-bottom-style: none;
            border-left-style: none;
            border-color: #143A1F;
            padding: 10px;
            color: black;
            text-align: center;
            width: 420px;
        }

        .summary {
            font-size: 1.5rem;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 400px;
            padding: 50px;
            color: black;
            text-align: center;
            width: 800px;
        }

        .left-logo {
            width: 195px;
            margin-left: 180px;
        }

        .logo img {
            max-width: 60px;
            height: auto;
        }

        .logo-text {
            flex-grow: 1;
            text-align: center;
            margin-top: 30px;
        }

        .grid-container {
        background-image: "elements/blank8logo.png" ;
        background-position: center;
        background-repeat: no-repeat;
        display: grid;
        align-content: space-around;
        grid-template-columns: auto auto auto;
        gap: 10px;
        padding: 10px;
        }

    

        .logo-text h2 {
            margin-top: 10px;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .form-group {
                margin-bottom: 15px;
            }

            .logo img {
                max-width: 70px;
            }

            .logo-text h2 {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .form-group {
                margin-bottom: 10px;
            }

            .logo img {
                max-width: 60px;
            }

            .logo-text h5 {
                font-size: 1rem;
            }
        }

    /* Additional styles for left and right logos */
    .logo .left-logo,
    .logo .right-logo {
        max-width: 200px; /* Adjust the max-width as needed */
        height: auto; /* This ensures the image maintains its aspect ratio */
    }
        .btn-common {
        display: inline-block;
        padding: 0.7em 1.4em 0.7em 1.1em;
        font-family: inherit;
        font-weight: 500;
        font-size: 16px;
        color: white;
        background: #ad5389;
        background: linear-gradient(0deg, rgba(20,167,62,1) 0%, rgba(102,247,113,1) 100%);
        border: none;
        border-radius: 20em;
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        text-decoration: none;
        outline: none;
    }

    .btn-common:hover {
        box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
    }

    .btn-common:active {
        box-shadow: 0 0.3em 1em -0.5em #14a73e98;
    }

    /* Specific styling for input button */
    .input-btn {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: none;
        background: none;
    }
</style>

    
</head>
<body>
    <?php
    include("includes/top_navbar.php");
    ?>

                        <div class="logo">
                            <img class="left-logo" src="elements/barangay8logo.png" alt="Left Logo">
                            <div class="logo-text">
                                <h5>Republic of the Philippines </h5>
                                <h4> OFFICE OF THE SANGGUNIANG BARANGAY </h4>
                                <h5>South Capitol Road, Ayala Malls Capitol Central </h5>
                                <h5>Barangay 8, Bacolod City </h5>
                                <h5>Cell No. 0919-560-5949/0995-073-6808 </h5>
                                <br>
                            </div>
                            <img class="right-logo" src="elements/blank8logo.png" alt="Right Logo">
                        </div>
                    </div>
                    <div class="grid-container">
                        <div>
                        <div class = "officers">
                            <br>
                            <br>
                            <strong>HON. EVELYN F. DONESA </strong><br>
                            Punong Barangay <br>
                            <br>
                            <br>
                            
                            <strong>KAGAWAD</strong><br>
                            <br>
                            <strong>HON. JIMMMY D. MARANON </strong><br>
                            Chairman Committee on <br>
                            Appropriation Disaster & Rescue <br>
                            <br>
                            <br>
                            <strong>HON. CRISTY P. BAUTISTA </strong><br>
                            Chairman Committee on <br>
                            Social Services/Women and Family <br>
                            <br>
                            <br>
                            <strong>HON. JOHNRY V. MALONGAYON </strong><br>
                            Chairman Committee on <br>
                            Health & Sanitation / Environmental <br>
                            Protection & Natural Resources <br>
                            <br>
                            <br>
                            <strong>HON. HELEN S. MAMOM </strong><br>
                            Chairman Committee on <br>
                            Education Laws and Ordinances <br>
                            <br>
                            <br>
                            <strong>HON. NOMER S. EDRAMA SR. </strong><br>
                            Chairman Committee on <br>
                            Market & Livelihood/Tourism Development  <br>
                            <br>
                            <br>
                            <strong>JAYCO FRANCISCO L. DOCTORA </strong><br>
                            Chairman Committee on <br>
                            Barangay Affair/ Ways & Means/ Infrastructure <br>
                            <br>
                            <br>
                            <strong>JOENITO Q. TALEON </strong><br>
                            Chairman Committee on <br>
                            Peace & Order / Human Rights <br>
                            <br>
                            <br>
                            <strong>JOEKAILLAH A. TALEON </strong><br>
                            Sk Chairman / Committee on <br>
                            Youth & Sports Development <br>
                            <br>
                            <br>
                            <strong>DARYLL LYN O. TOLOSA </strong><br>
                            Barangay Secretary <br>
                            <br>
                            <br>
                            <strong>JAMES G. TORRES </strong><br>
                            Barangay Treasurer <br>
                            <br>
                        </div>

                        <div></div>


                    </div>
                    
                        <div class = "summary">
                            <br>
                            <br>
                            <br>
                            
                            <h3><strong> CERTIFICATE OF INDIGENCY </strong></h3><br>
                            <br>
                            <br>
                            <form action="picon.php" method="POST" id="combined_form">
                                <div class = "padform">
                                TO WHOM IT MAY CONCERN: <br>
                                <br>
                                <br>
                                This is to CERTIFY that (FIRST NAME) (LAST NAME), is a resident of (BARANGAY NAME) Barangay 8, Bacolod City, whose means of livelihood is barely enough to support the daily needs of their family and therefore considered as indigent. <br>
                                <br>
                                This certification is issued upon the request of the above-named person for (PURPOSE) and for whatever lawful purpose/s it may serve best. <br>
                                <br>
                                Issued this (DAY) of (MONTH), (YEAR) at Barangay 8, Bacolod City, Philippines. <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="body4">
                                    <strong> HON. EVELYN F. DONESA </strong><br>
                                    Punong Barangay <br>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <button onClick="window.print()" class="btn btn-success w-25">Print</button>
                            </form>  
                        </div>
                    </div>  
            </div>
        </div>
    </div>
</div>


