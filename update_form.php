<?php
// Include necessary files
include("includes/top_navbar.php");

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

        // Update functionality
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            // Update personal information
            $sql_update_personal = "UPDATE personal_information SET firstname = ?, middlename = ?, lastname = ?, 
                                    apellation = ?, placeofbirth = ?, dateofbirth = ?, 
                                    gender = ?, nationality = ?, relationship = ?, 
                                    philhealth_id = ?, civilstatus = ?
                                    WHERE id = ?";

            $stmt_update_personal = mysqli_prepare($conn, $sql_update_personal);
            mysqli_stmt_bind_param($stmt_update_personal, "sssssssssssi", $_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], 
                                    $_POST['apellation'], $_POST['place_of_birth'], $_POST['date_of_birth'], 
                                    $_POST['gender'], $_POST['nationality'], $_POST['relationship'], 
                                    $_POST['philhealth_id'], $_POST['civil_status'], $resident_id);
            
            // Update contact information
            $sql_update_contact = "UPDATE contact_information SET city_municipality = ?, barangay = ?, 
                                   residence_since = ?, cellphone_number = ?, 
                                   email_address = ?
                                   WHERE personal_id = ?";

            $stmt_update_contact = mysqli_prepare($conn, $sql_update_contact);
            mysqli_stmt_bind_param($stmt_update_contact, "sssssi", $_POST['city_municipality'], $_POST['barangay'], 
                                    $_POST['residence_since'], $_POST['cellphone_number'], 
                                    $_POST['email_address'], $resident_id);
            
            // Update emergency contacts
            $sql_update_emergency = "UPDATE emergency_contacts SET emergency_contact_name = ?, 
                                     emergency_contact_address = ?, 
                                     emer_relationship = ?, 
                                     emergency_contact_number = ?
                                     WHERE personal_id = ?";

            $stmt_update_emergency = mysqli_prepare($conn, $sql_update_emergency);
            mysqli_stmt_bind_param($stmt_update_emergency, "ssssi", $_POST['emergency_contact_name'], 
                                    $_POST['emergency_contact_address'], 
                                    $_POST['emer_relationship'], 
                                    $_POST['emergency_contact_number'], $resident_id);
            
            // Execute all update statements
            mysqli_stmt_execute($stmt_update_personal);
            mysqli_stmt_execute($stmt_update_contact);
            mysqli_stmt_execute($stmt_update_emergency);

            // Check if all updates were successful
            if (mysqli_stmt_errno($stmt_update_personal) === 0 && mysqli_stmt_errno($stmt_update_contact) === 0 && mysqli_stmt_errno($stmt_update_emergency) === 0) {
                // Redirect to Home.php
                header("Location: Home.php");
                exit();
            } else {
                echo 'Error updating data: ' . mysqli_error($conn);
            }
        }
    } else {
        echo "No resident found with the provided ID.";
        exit();
    }
} else {
    echo "Resident ID not provided.";
    exit();
}

// Close connection
mysqli_close($conn);
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="Home.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="container" id="container_content">
                        <div class="logo">
                            <img class="left-logo" src="elements/Bacolod.png" alt="Left Logo">
                            <div class="logo-text">
                                <h2>Barangay Resident Registration Form</h2>
                            </div>
                            <img class="right-logo" src="elements/NegOcc2.jpg" alt="Right Logo">
                        </div>
                        <div class="banner">
                            <div class="oval"></div>
                            <div class="banner-text">Please provide the information needed</div>
                        </div>

                        <!-- Registration form -->
                        <form method="POST" id="combined_form">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <!-- Personal Information -->
                            <h3 style="opacity: 0.5;">Personal Information</h3>
                            <!-- <p>Attach Photo *</p>
                            <input type="file" id="photo" name="photo" accept="image/*"> -->
                            <!-- Personal Information fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['firstname']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $row['middlename']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['lastname']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellation">Apellation</label>
                                        <select class="form-control" id="apellation" name="apellation">
                                            <option value="">Select Apellation</option>
                                            <option value="Mr." <?php if($row['apellation'] == 'Mr.') echo 'selected'; ?>>Mr.</option>
                                            <option value="Mrs." <?php if($row['apellation'] == 'Mrs.') echo 'selected'; ?>>Mrs.</option>
                                            <option value="Miss" <?php if($row['apellation'] == 'Miss') echo 'selected'; ?>>Miss</option>
                                            <option value="Ms." <?php if($row['apellation'] == 'Ms.') echo 'selected'; ?>>Ms.</option>
                                            <option value="Dr." <?php if($row['apellation'] == 'Dr.') echo 'selected'; ?>>Dr.</option>
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
                                            <option value="Bago City" <?php if($row['placeofbirth'] == 'Bago City') echo 'selected'; ?>>Bago City</option>
                                            <option value="Cadiz City" <?php if($row['placeofbirth'] == 'Cadiz City') echo 'selected'; ?>>Cadiz City</option>
                                            <option value="Escalante City" <?php if($row['placeofbirth'] == 'Escalante City') echo 'selected'; ?>>Escalante City</option>
                                            <option value="Himamaylan City" <?php if($row['placeofbirth'] == 'Himamaylan City') echo 'selected'; ?>>Himamaylan City</option>
                                            <option value="Kabankalan City" <?php if($row['placeofbirth'] == 'Kabankalan City') echo 'selected'; ?>>Kabankalan City</option>
                                            <option value="Sagay City" <?php if($row['placeofbirth'] == 'Sagay City') echo 'selected'; ?>>Sagay City</option>
                                            <option value="San Carlos City" <?php if($row['placeofbirth'] == 'San Carlos City') echo 'selected'; ?>>San Carlos City</option>
                                            <option value="Sipalay City" <?php if($row['placeofbirth'] == 'Sipalay City') echo 'selected'; ?>>Sipalay City</option>
                                            <option value="Silay City" <?php if($row['placeofbirth'] == 'Silay City') echo 'selected'; ?>>Silay City</option>
                                            <option value="Talisay City" <?php if($row['placeofbirth'] == 'Talisay City') echo 'selected'; ?>>Talisay City</option>
                                            <option value="Victorias City" <?php if($row['placeofbirth'] == 'Victorias City') echo 'selected'; ?>>Victorias City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth *</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $row['dateofbirth']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="gendercheck">
                                <p style="font-size: 1rem;">Gender *</p>
                                <input type="radio" id="male" name="gender" value="male" <?php if($row['gender'] == 'male') echo 'checked'; ?>>
                                <label for="male" style="margin-right: 25px; font-size: 20px;">Male</label>
                                <input type="radio" id="female" name="gender" value="female" <?php if($row['gender'] == 'female') echo 'checked'; ?>>
                                <label for="female" style="font-size: 20px;">Female</label>
                            </div>

                            <!-- Nationality and Civil Status -->
                            <div class="dropdown">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nationality">Nationality *</label>
                                            <select class="form-control" id="nationality" name="nationality" required>
                                                <option value="">Select Nationality</option>
                                                <option value="filipino" <?php if($row['nationality'] == 'filipino') echo 'selected'; ?>>Filipino</option>
                                                <option value="american" <?php if($row['nationality'] == 'american') echo 'selected'; ?>>American</option>
                                                <option value="british" <?php if($row['nationality'] == 'british') echo 'selected'; ?>>British</option>
                                                <option value="chinese" <?php if($row['nationality'] == 'chinese') echo 'selected'; ?>>Chinese</option>                                                <!-- Add other options here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="civil_status">Civil Status *</label>
                                            <select class="form-control" id="civil_status" name="civil_status" required>
                                                <option value="">Select Civil Status</option>
                                                <option value="single" <?php if($row['civilstatus'] == 'single') echo 'selected'; ?>>Single</option>
                                                <option value="married" <?php if($row['civilstatus'] == 'married') echo 'selected'; ?>>Married</option>
                                                <option value="widowed" <?php if($row['civilstatus'] == 'widowed') echo 'selected'; ?>>Widowed</option>
                                                <option value="separated" <?php if($row['civilstatus'] == 'separated') echo 'selected'; ?>>Separated</option>                                                <!-- Add other options here -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="relationship">Relationship *</label>
                                    <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
                                        <option value="">Select Relationship</option>
                                        <option value="Spouse" <?php if($row['relationship'] == 'Spouse') echo 'selected'; ?>>Spouse</option>
                                        <option value="Parent" <?php if($row['relationship'] == 'Parent') echo 'selected'; ?>>Parent</option>
                                        <option value="Child" <?php if($row['relationship'] == 'Child') echo 'selected'; ?>>Child</option>
                                        <option value="Sibling" <?php if($row['relationship'] == 'Sibling') echo 'selected'; ?>>Sibling</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="philhealth_id">PhilHealth ID *</label>
                                    <input type="number" class="form-control" id="philhealth_id" name="philhealth_id" value="<?php echo $row['philhealth_id']; ?>" required>

                                </div>
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
                                        <option value="Bacolod City" <?php if($row['city_municipality'] == 'Bacolod City') echo 'selected'; ?>>Bacolod City</option>
                                        <option value="Bago City" <?php if($row['city_municipality'] == 'Bago City') echo 'selected'; ?>>Bago City</option>
                                        <option value="Cadiz City" <?php if($row['city_municipality'] == 'Cadiz City') echo 'selected'; ?>>Cadiz City</option>
                                        <option value="Escalante City" <?php if($row['city_municipality'] == 'Escalante City') echo 'selected'; ?>>Escalante City</option>
                                        <option value="Himamaylan City" <?php if($row['city_municipality'] == 'Himamaylan City') echo 'selected'; ?>>Himamaylan City</option>
                                        <option value="Kabankalan City" <?php if($row['city_municipality'] == 'Kabankalan City') echo 'selected'; ?>>Kabankalan City</option>                    <option value="La Carlota City" <?php if($row['city_municipality'] == 'La Carlota City') echo 'selected'; ?>>La Carlota City</option>
                                        <option value="Sagay City" <?php if($row['city_municipality'] == 'Sagay City') echo 'selected'; ?>>Sagay City</option>
                                        <option value="San Carlos City" <?php if($row['city_municipality'] == 'San Carlos City') echo 'selected'; ?>>San Carlos City</option>
                                        <option value="Silay City" <?php if($row['city_municipality'] == 'Silay City') echo 'selected'; ?>>Silay City</option>
                                        <option value="Sipalay City" <?php if($row['city_municipality'] == 'Sipalay City') echo 'selected'; ?>>Sipalay City</option>
                                        <option value="Talisay City" <?php if($row['city_municipality'] == 'Talisay City') echo 'selected'; ?>>Talisay City</option>                    <option value="Victorias City" <?php if($row['city_municipality'] == 'Victorias City') echo 'selected'; ?>>Victorias City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="barangay">Barangay *</label>
                                    <select class="form-control" id="barangay" name="barangay" required>
                                        <option value="">Select Barangay</option>
                                        <option value="Alangilan" <?php if($row['barangay'] == 'Alangilan') echo 'selected'; ?>>Alangilan</option>
                                        <option value="Alijis" <?php if($row['barangay'] == 'Alijis') echo 'selected'; ?>>Alijis</option>
                                        <option value="Bata" <?php if($row['barangay'] == 'Bata') echo 'selected'; ?>>Bata</option>
                                        <option value="Cabug" <?php if($row['barangay'] == 'Cabug') echo 'selected'; ?>>Cabug</option>
                                        <option value="Estefania" <?php if($row['barangay'] == 'Estefania') echo 'selected'; ?>>Estefania</option>
                                        <option value="Felisa" <?php if($row['barangay'] == 'Felisa') echo 'selected'; ?>>Felisa</option>
                                        <option value="Granada" <?php if($row['barangay'] == 'Granada') echo 'selected'; ?>>Granada</option>
                                        <option value="Handumanan" <?php if($row['barangay'] == 'Handumanan') echo 'selected'; ?>>Handumanan</option>
                                        <option value="Mandalagan" <?php if($row['barangay'] == 'Mandalagan') echo 'selected'; ?>>Mandalagan</option>
                                        <option value="Mansilingan" <?php if($row['barangay'] == 'Mansilingan') echo 'selected'; ?>>Mansilingan</option>
                                        <option value="Montevista" <?php if($row['barangay'] == 'Montevista') echo 'selected'; ?>>Montevista</option>
                                        <option value="Pahanocoy" <?php if($row['barangay'] == 'Pahanocoy') echo 'selected'; ?>>Pahanocoy</option>
                                        <option value="Punta Taytay" <?php if($row['barangay'] == 'Punta Taytay') echo 'selected'; ?>>Punta Taytay</option>
                                        <option value="Singcang-Airport" <?php if($row['barangay'] == 'Singcang-Airport') echo 'selected'; ?>>Singcang-Airport</option>
                                        <option value="Sum-ag" <?php if($row['barangay'] == 'Sum-ag') echo 'selected'; ?>>Sum-ag</option>
                                        <option value="Taculing" <?php if($row['barangay'] == 'Taculing') echo 'selected'; ?>>Taculing</option>
                                        <option value="Tangub" <?php if($row['barangay'] == 'Tangub') echo 'selected'; ?>>Tangub</option>
                                        <option value="Villamonte" <?php if($row['barangay'] == 'Villamonte') echo 'selected'; ?>>Villamonte</option>
                                        <option value="Vista Alegre" <?php if($row['barangay'] == 'Vista Alegre') echo 'selected'; ?>>Vista Alegre</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Resident Since and Contact Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="residence_since">Resident of Municipality since *</label>
                                    <input type="number" class="form-control" id="residence_since" name="residence_since" placeholder="YYYY" min="1900" max="2099" step="1" value="<?php echo $row['residence_since']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cellphone_number">Contact Number *</label>
                                    <input type="tel" class="form-control" id="cellphone_number" name="cellphone_number" value="<?php echo $row['cellphone_number']; ?>" required>
                                    <small class="form-text text-muted">Enter a valid 11-digit phone number (e.g., 09123456789).</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" class="form-control" id="email_address" name="email_address" value="<?php echo $row['email_address']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Contact form -->
                        <h3 style="opacity: 0.5;">Person to Notify in Case of Emergency</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergency_contact_name">Full Name *</label>
                                    <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" value="<?php echo $row['emergency_contact_name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="relationship">Relationship *</label>
                                    <select class="form-control" id="relationship" name="emer_relationship">
                                        <option value="">Select Relationship</option>
                                        <option value="Spouse" <?php if($row['emer_relationship'] == 'Spouse') echo 'selected'; ?>>Spouse</option>
                                        <option value="Parent" <?php if($row['emer_relationship'] == 'Parent') echo 'selected'; ?>>Parent</option>
                                        <option value="Child" <?php if($row['emer_relationship'] == 'Child') echo 'selected'; ?>>Child</option>
                                        <option value="Sibling" <?php if($row['emer_relationship'] == 'Sibling') echo 'selected'; ?>>Sibling</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergency_contact_number">Contact Number *</label>
                                    <input type="tel" class="form-control" id="emergency_contact_number" name="emergency_contact_number" value="<?php echo $row['emergency_contact_number']; ?>" required>
                                    <small class="form-text text-muted">Enter a valid 11-digit phone number (e.g., 09123456789).</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emergency_contact_address">Address *</label>
                                    <input type="text" class="form-control" id="emergency_contact_address" name="emergency_contact_address" value="<?php echo $row['emergency_contact_address']; ?>">
                                </div>
                            </div>
                        </div>
                            <input type="submit" name="update" id="update" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
