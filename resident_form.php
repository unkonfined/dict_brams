<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

    // Ensure no SQL injection vulnerability, consider using prepared statements
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $appellation = mysqli_real_escape_string($conn, $_POST['appellation']);
    $place_of_birth = mysqli_real_escape_string($conn, $_POST['place_of_birth']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $civil_status = mysqli_real_escape_string($conn, $_POST['civil_status']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $philhealth_id = mysqli_real_escape_string($conn, $_POST['philhealth_id']);
    $city_municipality = mysqli_real_escape_string($conn, $_POST['city_municipality']);
    $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
    $residence_since = mysqli_real_escape_string($conn, $_POST['residence_since']);
    $cellphone_number = mysqli_real_escape_string($conn, $_POST['cellphone_number']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $emergency_contact_name = mysqli_real_escape_string($conn, $_POST['emergency_contact_name']);
    $emergency_contact_address = mysqli_real_escape_string($conn, $_POST['emergency_contact_address']);
    $emer_relationship = mysqli_real_escape_string($conn, $_POST['emer_relationship']);
    $emergency_contact_number = mysqli_real_escape_string($conn, $_POST['emergency_contact_number']);

    // Insert into personal_information table
    $sql_personal = "INSERT INTO personal_information 
                     (firstname, middlename, lastname, appellation, placeofbirth, dateofbirth, gender, nationality, relationship, philhealth_id, civilstatus)
                     VALUES ('$first_name', '$middle_name', '$last_name', '$appellation', '$place_of_birth', '$date_of_birth', '$gender', '$nationality', '$relationship', '$philhealth_id', '$civil_status')";
    $result_personal = mysqli_query($conn, $sql_personal);

    if ($result_personal) {
        $personal_id = mysqli_insert_id($conn); // Get the auto-generated ID of the inserted record

        // Insert into emergency_contacts table
        $sql_emergency = "INSERT INTO emergency_contacts 
                          (personal_id, emergency_contact_name, emer_relationship, emergency_contact_number, emergency_contact_address)
                          VALUES ('$personal_id', '$emergency_contact_name', '$emer_relationship', '$emergency_contact_number', '$emergency_contact_address')";
        $result_emergency = mysqli_query($conn, $sql_emergency);

        if ($result_emergency) {
            // Insert into contact_information table
            $sql_contact = "INSERT INTO contact_information 
                            (personal_id, city_municipality, barangay, residence_since, cellphone_number, email_address)
                            VALUES ('$personal_id', '$city_municipality', '$barangay', '$residence_since', '$cellphone_number', '$email_address')";
            $result_contact = mysqli_query($conn, $sql_contact);

            if ($result_contact) {
                // Redirect to Home.php
                header("Location: Home.php");
                exit(); // Ensure no further code execution after redirect
            } else {
                echo 'Error inserting into contact_information table: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error inserting into emergency_contacts table: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error inserting into personal_information table: ' . mysqli_error($conn);
    }
}
?>

<style>
    /* Global styles */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        padding: 0 15px; /* Add horizontal padding to prevent overflow */
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
        padding: 10px;
        overflow: hidden; /* Hide overflow on smaller screens */
    }

    .banner-text {
        font-size: 1.5rem;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #D8F1B9;
        padding: 10px;
        color: black;
        text-align: center;
    }

    .logo img {
        max-width: 100px;
        height: auto;
    }

    .logo-text {
        flex-grow: 1;
        text-align: center;
    }

    .logo-text h2 {
        margin-top: 10px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .logo img {
            max-width: 80px;
        }

        .logo-text h2 {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .logo img {
            max-width: 60px;
        }

        .logo-text h2 {
            font-size: 1rem;
        }

        /* Adjust padding for smaller screens */
        .container {
            padding: 0 10px;
        }

        /* Adjust margin for smaller screens */
        .form-group {
            margin-bottom: 15px;
        }
    }

    /* Additional styles for left and right logos */
    .logo .left-logo,
    .logo .right-logo {
        max-width: 30%; /* Adjust the max-width as needed */
        height: auto; /* This ensures the image maintains its aspect ratio */
    }
</style>


    
</head>
<body>
    <?php
    include("includes/top_navbar.php");
    ?>

        <div class="container"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="Home.php" class="btn btn-primary">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="container" id="container_content">
                                <div class="logo">
                                    <img class="left-logo" src="elements/barangay8logo.png" alt="Left Logo">
                                    <div class="logo-text">
                                        <h2>Baranggay Resident Registration Form</h2>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="banner">
                                <div class="banner-text">Please provide the information needed</div>
                            </div>

                            <!-- Registration form -->
                            <form method="POST" id="combined_form">
                                <!-- Personal Information fields -->
                                <h3 style="opacity: 0.5;">Personal Information</h3>
                                 <!-- Attach Photo -->
                                <p>Attach Photo *</p>
                                <input type="file" id="photo" name="photo" accept="image/*">
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name *</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appellation">Appellation</label>
                                            <select class="form-control" id="appellation" name="appellation">
                                                <option value="">Select Appellation</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Dr.">Dr.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth">Place of Birth *</label>
                                            <select class="form-control" id="place_of_birth" name="place_of_birth" required>
                                                <option value="">Select Place of Birth</option>
                                                <option value="Bago City">Bago City</option>
                                                <option value="Cadiz City">Cadiz City</option>
                                                <option value="Escalante City">Escalante City</option>
                                                <option value="Himamaylan City">Himamaylan City</option>
                                                <option value="Kabankalan City">Kabankalan City</option>
                                                <option value="Sagay City">Sagay City</option>
                                                <option value="San Carlos City">San Carlos City</option>
                                                <option value="Sipalay City">Sipalay City</option>
                                                <option value="Silay City">Silay City</option>
                                                <option value="Talisay City">Talisay City</option>
                                                <option value="Victorias City">Victorias City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth *</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="gendercheck">
                                    <p style="font-size: 1rem;">Gender *</p>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male" style="margin-right: 25px; font-size: 20px;">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female" style="font-size: 20px;">Female</label>
                                </div>
                                <br/>
                                <!-- Nationality and Civil Status -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Nationality *</label>
                                    <select class="form-control" id="nationality" name="nationality" required>
                                        <option value="">Select Nationality</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="american">American</option>
                                        <option value="british">British</option>
                                        <option value="chinese">Chinese</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="civil_status">Civil Status *</label>
                                    <select class="form-control" id="civil_status" name="civil_status" required>
                                        <option value="">Select Civil Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widow/Widower</option>
                                        <option value="separated">Live In</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="philhealth_id">PhilHealth ID *</label>
                                    <input type="number" class="form-control" id="philhealth_id" name="philhealth_id" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="membership">Philhealth Membership *</label>
                                    <select class="form-control" id="membership" name="membership" required onchange="checkMembership()">
                                        <option value="">Select Membership</option>
                                        <option value="Spouse">Member</option>
                                        <option value="Parent">Dependent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wra">WRA Last Menstruation Period </label>
                                        <input type="date" class="form-control" id="wra" name="wra">
                                    </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education_occupation">Educational Attainment *</label>
                                    <select class="form-control" id="education_occupation" name="education_occupation" placeholder="Select Educational Attainment"required>
                                        <option value="Alangilan">None</option>
                                        <option value="Alijis">Elementary Level</option>
                                        <option value="Bata">Elementary Graduate</option>
                                        <option value="Cabug">High School Level</option>
                                        <option value="Estefania">High School Graduate</option>
                                        <option value="Felisa">Vocational</option>
                                        <option value="Granada">College Level</option>
                                        <option value="Handumanan">College Graduate</option>
                                        <option value="Mandalagan">Postgraduate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wra">Occupation *</label>
                                        <input type="text" class="form-control" id="wra" name="wra">
                                    </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education_occupation">Remarks Nutrition Status *</label>
                                    <select class="form-control" id="education_occupation" name="education_occupation" placeholder="Select Educational Attainment"required>
                                        <option value="Alangilan">None</option>
                                        <option value="Alijis">SAM - Severe Acute Malnutrition</option>
                                        <option value="Bata">MAM - Moderate Acute Malnutrition</option>
                                        <option value="Cabug">ST - Stunted</option>
                                        <option value="Estefania">UP - for updating</option>
                                        <option value="Felisa">Transfer of Residence</option>
                                    </select>
                                </div>
                            </div>

                                <!-- Contact Information form -->
                                <h3 style="opacity: 0.5;">Contact Information</h3>
                                <div class="row">
                                    <!-- City/Municipality and Barangay -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city_municipality">City/Municipality *</label>
                                            <select class="form-control" id="city_municipality" name="city_municipality" required>
                                                <option value="">Select City/Municipality</option>
                                                <option value="Bacolod City">Bacolod City</option>
                                                <option value="Bago City">Bago City</option>
                                                <option value="Cadiz City">Cadiz City</option>
                                                <option value="Escalante City">Escalante City</option>
                                                <option value="Himamaylan City">Himamaylan City</option>
                                                <option value="Kabankalan City">Kabankalan City</option>
                                                <option value="La Carlota City">La Carlota City</option>
                                                <option value="Sagay City">Sagay City</option>
                                                <option value="San Carlos City">San Carlos City</option>
                                                <option value="Silay City">Silay City</option>
                                                <option value="Sipalay City">Sipalay City</option>
                                                <option value="Talisay City">Talisay City</option>
                                                <option value="Victorias City">Victorias City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="barangay">Barangay *</label>
                                            <select class="form-control" id="barangay" name="barangay" required>
                                                <option value="">Select Barangay</option>
                                                <option value="Alangilan">Alangilan</option>
                                                <option value="Alijis">Alijis</option>
                                                <option value="Bata">Bata</option>
                                                <option value="Cabug">Cabug</option>
                                                <option value="Estefania">Estefania</option>
                                                <option value="Felisa">Felisa</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Handumanan">Handumanan</option>
                                                <option value="Mandalagan">Mandalagan</option>
                                                <option value="Mansilingan">Mansilingan</option>
                                                <option value="Montevista">Montevista</option>
                                                <option value="Pahanocoy">Pahanocoy</option>
                                                <option value="Punta Taytay">Punta Taytay</option>
                                                <option value="Singcang-Airport">Singcang-Airport</option>
                                                <option value="Sum-ag">Sum-ag</option>
                                                <option value="Taculing">Taculing</option>
                                                <option value="Tangub">Tangub</option>
                                                <option value="Villamonte">Villamonte</option>
                                                <option value="Vista Alegre">Vista Alegre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="residence_since">Resident of Municipality since *</label>
                                            <input type="number" class="form-control" id="residence_since" name="residence_since" placeholder="YYYY" min="1900" max="2099" step="1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cellphone_number">Contact Number *</label>
                                            <input type="tel" class="form-control" id="cellphone_number" name="cellphone_number" required>
                                            <small class="form-text text-muted">Enter a valid 11-digit phone number (e.g., 09123456789).</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_address">Email Address *</label>
                                            <input type="email" class="form-control" id="email_address" name="email_address" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Emergency Contact form -->
                                <h3 style="opacity: 0.5;">Person to Notify in Case of Emergency</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emergency_contact_name">Full Name *</label>
                                            <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emergency_contact_address">Full Address *</label>
                                            <input type="text" class="form-control" id="emergency_contact_address" name="emergency_contact_address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="relationship">Relationship *</label>
                                            <select class="form-control" id="relationship" name="emer_relationship">
                                                <option value="">Select Relationship</option>
                                                <option value="Spouse">Spouse</option>
                                                <option value="Parent">Parent</option>
                                                <option value="Child">Child</option>
                                                <option value="Sibling">Sibling</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emergency_contact_number">Contact Number *</label>
                                            <input type="tel" class="form-control" id="emergency_contact_number" name="emergency_contact_number" required>
                                            <small class="form-text text-muted">Enter a valid 11-digit phone number (e.g., 09123456789).</small>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                            <div style="display: flex; justify-content: center;">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" style="width: 200px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>

    <?php
    include("includes/footer.php");
    ?>
