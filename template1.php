<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <?php

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

    // Check if resident ID is provided
    if(isset($_GET['resident_id'])) {
        $resident_id = $_GET['resident_id'];

        // Fetch data using INNER JOIN with prepared statement
        $sql = "SELECT personal_information.*, emergency_contacts.*, contact_information.*
                FROM personal_information
                INNER JOIN emergency_contacts ON personal_information.id = emergency_contacts.personal_id
                INNER JOIN contact_information ON personal_information.id = contact_information.personal_id
                WHERE personal_information.id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $resident_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if data exists
        if(mysqli_num_rows($result) > 0) {
            // Fetch and process data as needed
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "No resident found with the provided ID.";
            exit();
        }
    } else {
        echo "Resident ID not provided.";
        exit();
    }
    ?>

<style>
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
            margin-bottom: 10px;
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
            font-size: 1.2rem;
            margin-top: 10px;
            margin-bottom: 10px;
            color: black;
            text-align: center;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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
            background-image: url("elements/blank8logo.png");
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

        @media print {
            body * {
                visibility: hidden;
            }
            #container_content, #container_content * {
                visibility: visible;
            }
            #container_content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            /* Styling for A1-sized page */
            @page {
                size: A1;
            }
        }

        #container_content {
    position: relative;
    padding: 20px; /* Add padding as needed */
}

#container_content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("elements/Bacolod.png");
    background-size: contain; /* Scale the image to fit within the container */
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-position: center; /* Center the background image */
    opacity: 0.10; /* Adjust the opacity of the background image */
}


</style>

</head>
<body>

<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container" id="container_content">
                        <div class="logo">
                            <div class="logo-text">
                                <h5>Republic of the Philippines </h5>
                                <h4> OFFICE OF THE SANGGUNIANG BARANGAY </h4>
                                <h5>South Capitol Road, Ayala Malls Capitol Central </h5>
                                <h5>Barangay 8, Bacolod City </h5>
                                <h5>Cell No. 0919-560-5949/0995-073-6808 </h5>
                                <br>
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
                            <strong>HON. CRISTY P. BAUTISTA </strong><br>
                            Chairman Committee on <br>
                            Social Services/Women and Family <br>
                            <br>
                            <strong>HON. JOHNRY V. MALONGAYON </strong><br>
                            Chairman Committee on <br>
                            Health & Sanitation / Environmental <br>
                            Protection & Natural Resources <br>
                            <br>
                            <strong>HON. HELEN S. MAMOM </strong><br>
                            Chairman Committee on <br>
                            Education Laws and Ordinances <br>
                            <br>
                            <strong>HON. NOMER S. EDRAMA SR. </strong><br>
                            Chairman Committee on <br>
                            Market & Livelihood/Tourism Development  <br>
                            <br>
                            <strong>JAYCO FRANCISCO L. DOCTORA </strong><br>
                            Chairman Committee on <br>
                            Barangay Affair/ Ways & Means/ Infrastructure <br>
                            <br>
                            <strong>JOENITO Q. TALEON </strong><br>
                            Chairman Committee on <br>
                            Peace & Order / Human Rights <br>
                            <br>
                            <strong>JOEKAILLAH A. TALEON </strong><br>
                            Sk Chairman / Committee on <br>
                            Youth & Sports Development <br>
                            <br>
                            <strong>DARYLL LYN O. TOLOSA </strong><br>
                            Barangay Secretary <br>
                            <br>
                            <strong>JAMES G. TORRES </strong><br>
                            Barangay Treasurer <br>
                            <br>
                        </div>
                        

                        <div><?php echo $resident_id; ?></div>


                            </div>
                        
                            <div class="summary">
                                <br>
                                <br>
                                <br>
                                
                                <h3><strong> CERTIFICATE OF INDIGENCY </strong></h3><br>
                                <br>
                                <br>
                                <form method="POST" id="combined_form">
                                <div class="padform">
                                    TO WHOM IT MAY CONCERN: <br>
                                    <br>
                                    <br>
                                    This is to CERTIFY that <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>, is a resident of <?php echo $row['barangay']; ?>, Bacolod City whose means of livelihood is barely enough to support the daily needs of their family and therefore considered as indigent. <br>
                                    <br>
                                    This certification is issued upon the request of the above-named person for Medical Assistance and for whatever lawful purpose/s it may serve best. <br>
                                    <br>
                                    Issued this <span id="current_date"></span> at <?php echo $row['barangay']; ?>, Bacolod City, Philippines. <br>
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
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the current date
    var today = new Date();
    var day = today.getDate();
    var month = today.toLocaleString('default', { month: 'long' });
    var year = today.getFullYear();

    // Update the current_date span with the current date
    document.getElementById('current_date').innerHTML = day + " of " + month + ", " + year;
</script>

</body>
</html>
