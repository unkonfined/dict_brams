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
                    <a href="Home.php" class="btn btn-primary float-start">Back</a>
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
                                        <a href="#" onclick="printDocument('cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Renewal of PWD ID')">Renewal of PWD ID</a>
                                        <a href="#" onclick="printDocument('cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Renewal of Senior ID')">Renewal of Senior ID</a>
                                        <a href="#" onclick="printDocument('cert_of_residency.php?resident_id=<?php echo $resident_id; ?>&purpose=Scholarship Requirement')">Scholarship Requirement</a>
                                    </div>  
                                <?php elseif ($purpose === 'brgyclearance'): ?>
                                    <!-- Menu for brgyclearance purpose -->
                                    <div class="menurow">
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Loan')">Loan</a>
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Bank')">Bank</a>
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Work Immersion')">Work Immersion</a>
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=TIN ID')">TIN ID</a>
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Postal ID')">Postal ID</a>
                                        <a href="#" onclick="printDocument('brgy_clearance.php?resident_id=<?php echo $resident_id; ?>&purpose=Philsys ID')">Philsys ID</a>
                                    </div>
                                <?php elseif ($purpose === 'certofindigency'): ?>
                                    <!-- Menu for the certofindigency purpose -->
                                    <div class="menurow">
                                        <a href="#" onclick="printDocument('cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Educational Assistance')">Educational Assistance</a>
                                        <a href="#" onclick="printDocument('cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=School Requirement')">School Requirement</a>
                                        <a href="#" onclick="printDocument('cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Medical Assistance')">Medical Assistance</a>
                                        <a href="#" onclick="printDocument('cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Burial Assistance')">Burial Assistance</a>
                                        <a href="#" onclick="printDocument('cert_of_indigency.php?resident_id=<?php echo $resident_id; ?>&purpose=Financial Assistance')">Financial Assistance</a>
                                    </div>
                                <?php elseif ($purpose === 'certification'): ?>
                                    <!-- Menu for the certification purpose -->
                                    <div class="menurow">
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=1st Time Job Seeker')">1st Time Job Seeker</a>
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Educational Assistance')">Educational Assistance</a>
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Scholarship')">Scholarship</a>
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Comelec Registraton')">Comelec Registraton</a>
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Applying Senior Citizen ID')">Applying Senior Citizen ID</a>
                                        <a href="#" onclick="printDocument('certification.php?resident_id=<?php echo $resident_id; ?>&purpose=Applying for CENECO')">Applying for CENECO</a>
                                    </div>
                                <?php endif; ?>
                            </div>
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

<script>
    function printDocument(url) {
        // Open the URL in a hidden iframe
        var iframe = document.createElement('iframe');
        iframe.setAttribute('style', 'display:none;');
        document.body.appendChild(iframe);
        iframe.src = url;

        // Wait for the iframe to load the document
        iframe.onload = function () {
            // Print the document
            iframe.contentWindow.print();
        };
    }
</script>

<?php
include("includes/footer.php");
?>
