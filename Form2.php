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
                    <form action="insert_function.php" method="POST" id="combined_form">
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
                                    <label for="suffix">Suffix</label>
                                    <select class="form-control" id="suffix" name="suffix">
                                        <option value="">Select Suffix</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="Jr..">Jr.</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <!-- Gender -->
                         <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="relationship">Relationship to Household Head *</label>
                                        <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
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
                            <div class="col-md-6">
                                <div class="gendercheck">
                                    <p style="font-size: 1rem;">Gender *</p>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male" style="margin-right: 25px; font-size: 15px;">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female" style="font-size: 15px;">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth *</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    </div>
                             </div>
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
                        </div>
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
                                        <option value="Bata">Mam - Moderate Acute Malnutrition</option>
                                        <option value="Cabug">ST - Stunted</option>
                                        <option value="Estefania">UP - for updating</option>
                                        <option value="Felisa">Transfer of Residence</option>
                                    </select>
                                </div>
                            </div>

                        <!-- Contact Information form -->
                        <h3 style="opacity: 0.5;">Household Information</h3>
                        <div class="row">
                            <!-- City/Municipality and Barangay -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sitio_purok">Sitio/Purok *</label>
                                    <input type="text" class="form-control" id="sitio_purok" name="sitio_purok" required>
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
                                    <input type="number" class="form-control" id="household_number" name="household_numberr" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="renter">Renter? *</label>
                                        <select class="form-control" id="renter" name="renter" required>
                                            <option value="">Select</option>
                                            <option value="Renter_Yes">Yes</option>
                                            <option value="Renter_no">No</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="months">If renter, number of months </label>
                                    <input type="number" class="form-control" id="months" name="months">
                                </div>
                            </div>
                        </div>

                        <h3 style="opacity: 0.5;">Social Eoconomic Status *</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gendercheck">
                                    <p style="font-size: 1rem;"> </p>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male" style="margin-right: 25px; font-size: 15px;">NHTS 4ps</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female" style="font-size: 15px;">NHTS Non-4ps</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female" style="font-size: 15px;">Non-NHTS</label><br><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="gendercheck">
                                    <p style="font-size: 1rem;"> </p>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male" style="margin-right: 25px; font-size: 15px;">IP Household</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female" style="font-size: 15px;">Non-IP</label><br><br>

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Type of Water Source *</label>
                                    <select class="form-control" id="nationality" name="nationality" required>
                                        <option value="">Select Nationality</option>
                                        <option value="filipino">Level I - Point Source</option>
                                        <option value="american">Level II - Communal Faucet</option>
                                        <option value="british">Level III - Individual Connection</option>
                                        <option value="chinese">Others - For doubtful sources, open dug well, etc.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="civil_status">Type of Toilet Facility *</label>
                                    <select class="form-control" id="civil_status" name="civil_status" required>
                                        <option value="">Select Civil Status</option>
                                        <option value="single">A - Pour/Flush type connection to septic tank</option>
                                        <option value="married">B - Flush Toilet connection to septic tank and to sewage system</option>
                                        <option value="widowed">C - Ventilated Pit (VIP) Latrine</option>
                                        <option value="separated">D - Water-Sealed Toilet</option>
                                        <option value="separated">E - Over Hung latrine</option>
                                        <option value="separated">F - Open Pit Latrine</option>
                                        <option value="separated">G - Without Toilet</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Type of Waste Management *</label>
                                    <select class="form-control" id="civil_status" name="civil_status" required>
                                        <option value="">Select Civil Status</option>
                                        <option value="single">A - Waste Segregation</option>
                                        <option value="married">B - Backyard Composting</option>
                                        <option value="widowed">C - Recycled/Reuse</option>
                                        <option value="separated">D - Collected by City/Municipal Collection and Disposal System</option>
                                        <option value="separated">E - Others (Burning/Burying)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="civil_status">With Blind Drainage *</label>
                                    <select class="form-control" id="civil_status" name="civil_status" required>
                                        <option value="">Yes</option>
                                        <option value="single">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="show_member">
                            <div class="row">
                            <h3 style="opacity: 0.5;">Household Members</h3>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="suffix">Suffix</label>
                                        <select class="form-control" id="suffix" name="suffix">
                                            <option value="">Suffix</option>
                                            <option value="Sr.">Sr.</option>
                                            <option value="Jr..">Jr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="relationship">Relationship to HH *</label>
                                        <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
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
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="relationship">Sex *</label>
                                        <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
                                            <option value="">Select Sex</option>
                                            <option value="Spouse">Female</option>
                                            <option value="Spouse">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth *</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="philhealth_id">PhilHealth ID *</label>
                                        <input type="number" class="form-control" id="philhealth_id" name="philhealth_id" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="membership">Membership</label>
                                        <select class="form-control" id="membership" name="membership" required onchange="checkMembership()">
                                            <option value="">Select Membership</option>
                                            <option value="Spouse">Member</option>
                                            <option value="Parent">Dependent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="wra">WRA </label>
                                        <input type="date" class="form-control" id="wra" name="wra">
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="wra">Occupation *</label>
                                        <input type="text" class="form-control" id="wra" name="wra">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="education_occupation">Remarks *</label>
                                        <select class="form-control" id="education_occupation" name="education_occupation" placeholder="Select Educational Attainment"required>
                                            <option value="Alangilan">None</option>
                                            <option value="Alijis">SAM - Severe Acute Malnutrition</option>
                                            <option value="Bata">Mam - Moderate Acute Malnutrition</option>
                                            <option value="Cabug">ST - Stunted</option>
                                            <option value="Estefania">UP - for updating</option>
                                            <option value="Felisa">Transfer of Residence</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="cold-md-2">
                                    <button classs ="btn btn-success add_member_btn">Add Member</button>

                                </div>
                                <br>
                                <br>
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $(".add_member_btn").click(function(e) {
                                        e.preventDefault();
                                        $("#show_member").prepend('
                                        <div class="row">
                                            <h3 style="opacity: 0.5;">Household Member</h3>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name *</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name *</label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="suffix">Suffix</label>
                                                        <select class="form-control" id="suffix" name="suffix">
                                                            <option value="">Suffix</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="Jr..">Jr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                            <option value="VII">VII</option>
                                                            <option value="VIII">VIII</option>
                                                            <option value="IX">IX</option>
                                                            <option value="X">X</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="relationship">Relationship to HH *</label>
                                                        <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
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
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="relationship">Sex *</label>
                                                        <select class="form-control" id="relationship" name="relationship" required onchange="checkRelationship()">
                                                            <option value="">Select Sex</option>
                                                            <option value="Spouse">Female</option>
                                                            <option value="Spouse">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="date_of_birth">Date of Birth *</label>
                                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="philhealth_id">PhilHealth ID *</label>
                                                        <input type="number" class="form-control" id="philhealth_id" name="philhealth_id" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="membership">Membership</label>
                                                        <select class="form-control" id="membership" name="membership" required onchange="checkMembership()">
                                                            <option value="">Select Membership</option>
                                                            <option value="Spouse">Member</option>
                                                            <option value="Parent">Dependent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="wra">WRA </label>
                                                        <input type="date" class="form-control" id="wra" name="wra">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="wra">Occupation *</label>
                                                        <input type="text" class="form-control" id="wra" name="wra">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="education_occupation">Remarks *</label>
                                                        <select class="form-control" id="education_occupation" name="education_occupation" placeholder="Select Educational Attainment"required>
                                                            <option value="Alangilan">None</option>
                                                            <option value="Alijis">SAM - Severe Acute Malnutrition</option>
                                                            <option value="Bata">Mam - Moderate Acute Malnutrition</option>
                                                            <option value="Cabug">ST - Stunted</option>
                                                            <option value="Estefania">UP - for updating</option>
                                                            <option value="Felisa">Transfer of Residence</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="cold-md-2">
                                                    <button classs ="btn btn-danger remove_member_btn">Remove</button>
                                                </div>
                                                
                                            </div>');
                                });
                                });
                            </script>

                <input type="submit" name="submit" id="submit" class="btn-common input-btn" value="Submit">
                
            </div>
        </div>
    </div>
</div>

    <?php
    include("includes/footer.php");
    ?>
