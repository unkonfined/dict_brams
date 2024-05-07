<?php
include("includes/top_navbar.php");
include("includes/header.php");

// Initialize resident ID variable
$resident_id = "";

// Check if resident_id is set in the URL parameters
if(isset($_GET['resident_id'])) {
    // Retrieve the resident ID from the URL parameters
    $resident_id = $_GET['resident_id'];
} else {
    // Handle case when resident ID is not provided in the URL
    // You can customize this message or action as needed
    $error_message = "Resident ID not provided!";
    // You can redirect or display an error message here
}

// Check if specific purpose is set in the URL parameters
$purpose = isset($_GET['purpose']) ? $_GET['purpose'] : '';

?>

<style>
    /* Base styles */
    .container {
        max-width: 1200px; /* Adjust max-width as needed */
        margin: 0 auto;
        padding: 20px;
        text-align: center; /* Center align container content */
    }

    .menu {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Center align menu items */
    }

    .menurow {
    margin-bottom: 20px;
    width: 50%; /* Adjust the width of the menu rows */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 10px; /* Add rounded corners */
    background-color: #f9f9f9; /* Add background color */
    padding: 10px; /* Add padding */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}


    .menurow a {
        font-size: x-large;
        display: block;
        text-decoration: none;
        margin: 10px auto; /* Center align menu items */
    }

    .menurow input[type="image"] {
        max-width: 90%; /* Set the width to your desired size */
        height: auto; /* This ensures the image maintains its aspect ratio */
    }

    .logo-text {
        font-size: xx-large;
        font-weight: bold;
    }

    /* Responsive styles */
    @media (max-width: 1200px) {
        .container {
            padding: 10px;
        }
    }

    @media (max-width: 992px) {
        .menurow {
            width: 50%; /* Adjust width for smaller screens */
        }
    }

    @media (max-width: 768px) {
        .menurow {
            width: 100%; /* Adjust width for smaller screens */
        }

        .logo-text {
            font-size: large; /* Decrease font size for smaller screens */
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="Home.php" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="container" id="container_content">
                    <div class="logo">
                        <div class="logo-text">
                            Purpose Of Document <br>
                        </div>
                    </div>
                    <div class="menu">
                            <?php if ($purpose === 'certofresidency'): ?>
                                <!-- Menu for certofresidency purpose -->
                                <div class="menurow">
                                    <a href="cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Renewal of PWD ID" target="_blank">Renewal of PWD ID</a>
                                    <a href="cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Renewal of Senior ID" target="_blank">Renewal of Senior ID</a>
                                    <a href="cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Scholarship Requirement" target="_blank">Scholarship Requirement</a>
                                </div>  
                                <?php elseif ($purpose === 'brgyclearance'): ?>
                                <!-- Menu for brgyclearance purpose -->
                                <div class="menurow">
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Loan" target="_blank">Loan</a>
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Bank" target="_blank">Bank</a>
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Work Immersion" target="_blank">Work Immersion</a>
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=TIN ID" target="_blank">TIN ID</a>
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Postal ID" target="_blank">Postal ID</a>
                                    <a href="brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Philsys ID" target="_blank">Philsys ID</a>
                                </div>
                                <?php elseif ($purpose === 'certofindigency'): ?>
                                <!-- Menu for the certofindigency purpose -->
                                <div class="menurow">
                                    <a href="cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Educational Assistance" target="_blank">Educational Assistance</a>
                                    <a href="cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=School Requirement" target="_blank">School Requirement</a>
                                    <a href="cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Medical Assistance" target="_blank">Medical Assistance</a>
                                    <a href="cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Burial Assistance" target="_blank">Burial Assistance</a>
                                    <a href="cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Financial Assistance" target="_blank">Financial Assistance</a>
                                </div>
                                <?php elseif ($purpose === 'certification'): ?>
                                <!-- Menu for the certification purpose -->
                                <div class="menurow">
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=1st Time Job Seeker" target="_blank">1st Time Job Seeker</a>
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Educational Assistance" target="_blank">Educational Assistance</a>
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Scholarship" target="_blank">Scholarship</a>
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Comelec Registraton" target="_blank">Comelec Registraton</a>
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Applying Senior Citizen ID" target="_blank">Applying Senior Citizen ID</a>
                                    <a href="certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Applying for CENECO" target="_blank">Applying for CENECO</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<br><br>
<br><br>
<br><br>

<?php
include("includes/footer.php");
?>
