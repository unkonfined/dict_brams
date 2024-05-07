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
        /* width: 45%; Adjust the width of the menu rows */
    }

    .menurow a {
        display: block;
        text-decoration: none;
        margin: 10px auto; /*Center align menu items */
    }

    .menurow img {
        width: 300px;
        max-width: 100%; /* Set the maximum width to ensure images resize */
        height: auto; /* This ensures the image maintains its aspect ratio */
    }

    .logo-text {
        font-size: xx-large;
        font-weight: bold;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .menurow {
            width: 90%; /* Adjust width for smaller screens */
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
                            MENU OF DOCUMENTS <br>
                        </div>
                    </div>
                    <div class="menu">
                        <div class="menurow">
                            <!-- Modify href attribute to include resident_id -->
                            <a id="certofresidency" href="purpose_template.php?resident_id=<?php echo $resident_id; ?>&purpose=certofresidency"><img src="elements/group2.png" alt="certofresidency"></a>
                            <a id="brgyclearance" href="purpose_template.php?resident_id=<?php echo $resident_id; ?>&purpose=brgyclearance"><img src="elements/group3.png" alt="brgyclearance"></a>
                            <a id="certification" href="purpose_template.php?resident_id=<?php echo $resident_id; ?>&purpose=certification"><img src="elements/group8.png" alt="certification"></a>
                        </div>
                        <div class="menurow">
                            <a id="certofindigency" href="purpose_template.php?resident_id=<?php echo $resident_id; ?>&purpose=certofindigency"><img src="elements/group4.png" alt="certofindigency"></a>
                            <a href="cert_of_business_closer.php?resident_id=<?php echo $resident_id; ?>&purpose=certofbusinessscloser" target="_blank"><img src="elements/group7.png" alt="certofbusinessscloser"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
