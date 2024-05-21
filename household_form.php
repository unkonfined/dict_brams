<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <?php
    // Establish connection
    $conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

    // Query to fetch all residents
    $sql = "SELECT * FROM personal_information";

    // Query to fetch all residents
    $result = mysqli_query($conn, $sql);
?>

<?php
// Display all PHP errors (useful for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Establish connection
$conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Function to escape input data
    function escapeInput($conn, $data) {
        return mysqli_real_escape_string($conn, trim($data));
    }

    // Retrieve and escape all POST data
    $last_name = escapeInput($conn, $_POST['last_name']);
    $first_name = escapeInput($conn, $_POST['first_name']);
    $middle_name = escapeInput($conn, $_POST['middle_name']);
    $relation_HHHead = escapeInput($conn, $_POST['relation_HHHead']);
    $sitio = escapeInput($conn, $_POST['sitio']);
    $barangay = escapeInput($conn, $_POST['barangay']);
    $household_number = escapeInput($conn, $_POST['household_number']);
    $renter = escapeInput($conn, $_POST['renter']);
    $renter_months = escapeInput($conn, $_POST['renter_months']);
    $nhts_status = escapeInput($conn, $_POST['nhts_status']);
    $tribe = escapeInput($conn, $_POST['tribe']);
    $water_source = escapeInput($conn, $_POST['water_source']);
    $toilet_facility = escapeInput($conn, $_POST['toilet_facility']);
    $waste_management = escapeInput($conn, $_POST['waste_management']);
    $blind_drainage = escapeInput($conn, $_POST['blind_drainage']);
    $business_name = escapeInput($conn, $_POST['business_name']);
    $business_address = escapeInput($conn, $_POST['business_address']);

    // Insert into name_of_respondent table
    $sql_respondent = "INSERT INTO name_of_respondent (last_name, first_name, middle_name, relation_HHHead) VALUES ('$last_name', '$first_name', '$middle_name', '$relation_HHHead')";
    $result_respondent = mysqli_query($conn, $sql_respondent);

    if ($result_respondent) {
        $respondent_id = mysqli_insert_id($conn); // Get the auto-generated ID of the inserted record

        // Insert into household_information table
        $sql_household = "INSERT INTO household_information (respondent_id, sitio, barangay, household_number, renter, renter_months) VALUES ('$respondent_id', '$sitio', '$barangay', '$household_number', '$renter', '$renter_months')";
        $result_household = mysqli_query($conn, $sql_household);

        if ($result_household) {
            // Insert into se_status table
            $sql_status = "INSERT INTO se_status (respondent_id, nhts_status, tribe, water_source, toilet_facility, waste_management, blind_drainage) VALUES ('$respondent_id', '$nhts_status', '$tribe', '$water_source', '$toilet_facility', '$waste_management', '$blind_drainage')";
            $result_status = mysqli_query($conn, $sql_status);

            if ($result_status) {
                // Insert into business_information table
                $sql_business = "INSERT INTO business_information (respondent_id, business_name, business_address) VALUES ('$respondent_id', '$business_name', '$business_address')";
                $result_business = mysqli_query($conn, $sql_business);

                if ($result_business) {
                    // Insert selected members into household_members table if any
                    if (isset($_POST['resident_id']) && is_array($_POST['resident_id'])) {
                        foreach ($_POST['resident_id'] as $member_id) {
                            $member_id = escapeInput($conn, $member_id);
                            $sql_insert_member = "INSERT INTO household_members (respondent_id, member_id) VALUES ('$respondent_id', '$member_id')";
                            $result_insert_member = mysqli_query($conn, $sql_insert_member);

                            if (!$result_insert_member) {
                                echo 'Error inserting into household_members table: ' . mysqli_error($conn);
                            }
                        }
                    }

                    // Redirect to Home.php after successful insertion
                    header("Location: Home.php");
                    exit(); // Ensure no further code execution after redirect
                } else {
                    echo 'Error inserting into business_information table: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error inserting into se_status table: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error inserting into household_information table: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error inserting into name_of_respondent table: ' . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

    // Assume respondent_id is available, e.g., from session or form input
    $respondent_id = mysqli_real_escape_string($conn, $_POST['respondent_id']);

    // Insert selected members into household_members table
    if (isset($_POST['resident_id']) && is_array($_POST['resident_id'])) {
        foreach ($_POST['resident_id'] as $member_id) {
            $member_id = mysqli_real_escape_string($conn, $member_id);
            $sql_insert_member = "INSERT INTO household_members (respondent_id, member_id) VALUES ('$respondent_id', '$member_id')";
            $result_insert_member = mysqli_query($conn, $sql_insert_member);

            if (!$result_insert_member) {
                echo 'Error inserting into household_members table: ' . mysqli_error($conn);
            }
        }

        // Redirect to Home.php after successful insertion
        header("Location: Home.php");
        exit(); // Ensure no further code execution after redirect
    } else {
        echo 'No members selected.';
    }

    // Close connection
    mysqli_close($conn);
}
?>




<style>
    /* Global styles */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        padding: 0 20px; /* Added padding for better mobile view */
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
        .form-group {
            margin-bottom: 15px;
        }

        .logo img {
            max-width: 80px;
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

        .logo-text h2 {
            font-size: 1rem;
        }

        .container {
            padding: 0 10px; /* Adjusted padding for smaller screens */
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

/* Styles for the search bar */
.search-bar {
    width: 300px; /* Adjust width as needed */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

/* Float the search bar to the right */
#show_member .search-bar {
    float: right;
}

/* Styles for the table */
.table {
    width: 100%;
}

/* Styles for table header */
.table th {
    font-weight: bold;
    text-align: left;
}

/* Styles for table rows */
.table td,
.table th {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

/* Hover effect for table rows */
.table tbody tr:hover {
    background-color: #f5f5f5;
}

.card-header {
    display: flex;
    justify-content: space-between;
}

.left-content {
    flex: 1;
}

.right-content {
    flex: 1;
    text-align: right;
}



</style>





                        </head>
                        <body>
                        <?php
                            include("includes/top_navbar.php");
                            include("includes/bot_navbar.php");
                            ?>


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
                                                    <img class="left-logo" src="elements/barangay8logo.png" alt="Left Logo">
                                                    <div class="logo-text">
                                                        <h2>HARMONIZED FAMILY/HOUSEHOLD PROFILE</h2>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="banner">
                                                <div class="banner-text">Please provide the information needed</div>
                                            </div>

                                            <!-- Registration form -->
                                            <form method="POST" id="combined_form">
                                                <!-- Personal Information fields -->
                                                <h3 style="opacity: 0.5;">Name of Respondent*</h3>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name *</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="first_name">First Name *</label>
                                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="middle_name">Middle Name</label>
                                                                <input type="text" class="form-control" id="middle_name" name="middle_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="relation_HHHead">Relationship to Household Head *</label>
                                                                <select class="form-control" id="relation_HHHead" name="relation_HHHead" required onchange="checkRelationship()">
                                                                    <option value="">Select Relationship</option>
                                                                    <option value="Spouse">Head</option>
                                                                    <option value="Spouse">Spouse</option>
                                                                    <option value="Parent">Son</option>
                                                                    <option value="Child">Daughter</option>
                                                                    <option value="Sibling">Parent</option>
                                                                    <option value="Spouse">Sibling</option>
                                                                    <option value="Spouse">Others</option>
                                                                </select>
                                                            </div>
                                                         </div>
                                                </div>
                                                <!-- Contact Information form -->
                                                <h3 style="opacity: 0.5;">Household Information</h3>
                                                <div class="row">
                                                    <!-- City/Municipality and Barangay -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sitio">Sitio/Purok *</label>
                                                            <select class="form-control" id="sitio" name="sitio" required>
                                                            <option value="">Select Sitio/Purok</option>
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
                                                            <label for="household_number">Household Number *</label>
                                                            <input type="number" class="form-control" id="household_number" name="household_number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="renter">Renter (Y/N) *</label>
                                                                <select class="form-control" id="renter" name="renter" required>
                                                                    <option value="">Select</option>
                                                                    <option value="Renter_Yes">Yes</option>
                                                                    <option value="Renter_no">No</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="renter_months">If Yes, No. of Months </label>
                                                            <input type="number" class="form-control" id="montrenter_monthshs" name="renter_months">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 style="opacity: 0.5;">Social Eoconomic Status *</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="nhts_information">
                                                            <p style="font-size: 1rem;"> </p>
                                                            <input type="radio" id="nhts_4ps" name="nhts_status" value="nhts_4ps">
                                                            <label for="nhts_4ps" style="margin-right: 25px; font-size: 15px;">NHTS 4ps</label><br>
                                                            <input type="radio" id="nhts_non4ps" name="nhts_status" value="nhts_non4ps">
                                                            <label for="nhts_non4ps" style="font-size: 15px;">NHTS Non-4ps</label><br>
                                                            <input type="radio" id="non_nhts" name="nhts_status" value="non_nhts">
                                                            <label for="non_nhts" style="font-size: 15px;">Non-NHTS</label><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="ip_household_information">
                                                            <p style="font-size: 1rem;"> </p>
                                                            <input type="radio" id="ip_household" name="nhts_status" value="ip_household">
                                                            <label for="ip_household" style="margin-right: 25px; font-size: 15px;">IP Household</label><br>
                                                            <input type="radio" id="non_ip_household" name="nhts_status" value="non_ip_household">
                                                            <label for="non_ip_household" style="font-size: 15px;">Non-IP Household</label><br><br>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tribe">if IP Household, indicate TRIBE: </label>
                                                            <input type="text" class="form-control" id="tribe" name="tribe">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="water_source">Type of Water Source *</label>
                                                            <select class="form-control" id="water_source" name="water_source" required>
                                                                <option value="">Select Water Source</option>
                                                                <option value="point_source">Level I - Point Source</option>
                                                                <option value="communal_faucet">Level II - Communal Faucet</option>
                                                                <option value="individual_connection">Level III - Individual Connection</option>
                                                                <option value="other_source">Others - For doubtful sources, open dug well, etc.</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="toilet_facility">Type of Toilet Facility *</label>
                                                            <select class="form-control" id="toilet_facility" name="toilet_facility" required>
                                                                <option value="">Select Toilet Facility</option>
                                                                <option value="pour_flash">A - Pour/Flush type connection to septic tank</option>
                                                                <option value="flush_toilet">B - Flush Toilet connection to septic tank and to sewage system</option>
                                                                <option value="ventilated_pit">C - Ventilated Pit (VIP) Latrine</option>
                                                                <option value="water_sealed">D - Water-Sealed Toilet</option>
                                                                <option value="open_hung">E - Over Hung latrine</option>
                                                                <option value="open_pit">F - Open Pit Latrine</option>
                                                                <option value="without_toilet">G - Without Toilet</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="waste_management">Type of Waste Management *</label>
                                                            <select class="form-control" id="waste_management" name="waste_management" required>
                                                                <option value="">Select Waste Management</option>
                                                                <option value="waste_segregation">A - Waste Segregation</option>
                                                                <option value="backyard_composting">B - Backyard Composting</option>
                                                                <option value="recycle_reuse">C - Recycled/Reuse</option>
                                                                <option value="collected">D - Collected by City/Municipal Collection and Disposal System</option>
                                                                <option value="other_management">E - Others (Burning/Burying)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="blind_drainage">With Blind Drainage *</label>
                                                            <select class="form-control" id="blind_drainage" name="blind_drainage" required>
                                                                <option value="">Select Barangay</option>
                                                                <option value="yes_blind_drainage">Yes</option>
                                                                <option value="no_blind_drainage">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <br>
                                                <h3 style="opacity: 0.5;">Business Information</h3>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="business_name">Business Name </label>
                                                        <input type="text" class="form-control" id="business_name" name="business_name">
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="business_address">Business Address </label>
                                                            <input type="text" class="form-control" id="business_address" name="business_address">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="show_member">
                                                            <div class="container">
                                                                <div class="card">
                                                                <div class="card-header">
                                                                        <div class="left-content">
                                                                            <h3 style="opacity: 0.5;">Choose Household Member</h3>
                                                                        </div>
                                                                        <div class="right-content">
                                                                            <!-- Search bar -->
                                                                            <input type="text" id="searchInput" class="search-bar" placeholder="Search by name...">
                                                                        </div>
                                                                        </div>
                                                                    <div class="card-body">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>First Name</th>
                                                                                    <th>Middle Name</th>
                                                                                    <th>Last Name</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                // Check if there are results
                                                                                if (mysqli_num_rows($result) > 0) {
                                                                                    // Output data of each row
                                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                                        echo "<tr>";
                                                                                        echo "<td><input type='checkbox' name='resident_id[]' value='{$row['id']}'></td>";
                                                                                        echo "<td>{$row['firstname']}</td>";
                                                                                        echo "<td>{$row['middlename']}</td>";
                                                                                        echo "<td>{$row['lastname']}</td>";
                                                                                        echo "</tr>";
                                                                                    }
                                                                                } else {
                                                                                    echo "<tr><td colspan='4'>No residents found</td></tr>";
                                                                                }

                                                                                // Close connection
                                                                                mysqli_close($conn);
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="display: flex; justify-content: center;">
                                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" style="width: 200px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<?php
include("includes/footer.php");
?>

<!-- JavaScript to handle search functionality -->
<script>
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.table tbody tr');

        searchInput.addEventListener('input', function () {
            const searchValue = this.value.toLowerCase().trim();
            tableRows.forEach(row => {
                const firstName = row.cells[1].textContent.toLowerCase();
                const middleName = row.cells[2].textContent.toLowerCase();
                const lastName = row.cells[3].textContent.toLowerCase();
                if (firstName.includes(searchValue) || middleName.includes(searchValue) || lastName.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
