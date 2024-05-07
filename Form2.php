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
                        <h3 style="opacity: 0.5;">Personal Information *</h3>
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
                                        <option value="member">Member</option>
                                        <option value="dependent">Dependent</option>
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
                                    <label for="educational_attainment">Educational Attainment *</label>
                                    <select class="form-control" id="education_occupation" name="educational_attainment" placeholder="Select Educational Attainment"required>
                                        <option value="none">None</option>
                                        <option value="elementary_level">Elementary Level</option>
                                        <option value="elementary_graduate">Elementary Graduate</option>
                                        <option value="high_school_level">High School Level</option>
                                        <option value="high_school_graduate">High School Graduate</option>
                                        <option value="vocational">Vocational</option>
                                        <option value="college_level">College Level</option>
                                        <option value="college_graduate">College Graduate</option>
                                        <option value="post_graduate">Postgraduate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wra">Occupation *</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation">
                                    </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nutrition_status">Remarks Nutrition Status *</label>
                                    <select class="form-control" id="nutrition_status" name="nutrition_status" placeholder="Select Nutrition Status"required>
                                        <option value="none">None</option>
                                        <option value="sam">SAM - Severe Acute Malnutrition</option>
                                        <option value="mam">Mam - Moderate Acute Malnutrition</option>
                                        <option value="st">ST - Stunted</option>
                                        <option value="for_updating">UP - for updating</option>
                                        <option value="transferred">Transfer of Residence</option>
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
                                    <input type="number" class="form-control" id="household_number" name="household_number" required>
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
                                <div class="nhts_information">
                                    <p style="font-size: 1rem;"> </p>
                                    <input type="radio" id="nhts_4ps" name="nhts_status" value="nhts_4ps">
                                    <label for="nhts_4ps" style="margin-right: 25px; font-size: 15px;">NHTS 4ps</label><br>
                                    <input type="radio" id="nhts_non4ps" name="nhts_status" value="nhts_non4ps">
                                    <label for="nhts_non4ps" style="font-size: 15px;">NHTS Non-4ps</label><br>
                                    <input type="radio" id="non_nhts" name="nhts_status" value="_non_nhts">
                                    <label for="non-nhts" style="font-size: 15px;">Non-NHTS</label><br><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ip_household_information">
                                    <p style="font-size: 1rem;"> </p>
                                    <input type="radio" id="ip_household" name="ip_household_status" value="ip_household">
                                    <label for="ip_household" style="margin-right: 25px; font-size: 15px;">IP Household</label><br>
                                    <input type="radio" id="non_ip_household" name="ip_household_status" value="non_ip_household">
                                    <label for="non_ip_household" style="font-size: 15px;">Non-IP Household</label><br><br>

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
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
                                        <option value="yes_blind_drainage">Yes</option>
                                        <option value="no_blind_drainage">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <h3 style="opacity: 0.5;">Business Information </h3>
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
                            <div class="row">
                            <h3 style="opacity: 0.5;">Household Members</h3>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_last_name">Last Name *</label>
                                        <input type="text" class="form-control" id="hh_last_name" name="hh_last_name" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_first_name">First Name *</label>
                                        <input type="text" class="form-control" id="hh_first_name" name="hh_first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="hh_suffix">Suffix</label>
                                        <select class="form-control" id="hh_suffix" name="hh_suffix">
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
                                        <label for="hh_relationship">Relationship to HH *</label>
                                        <select class="form-control" id="hh_relationship" name="hh_relationship" required onchange="checkRelationship()">
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
                                        <label for="hh_sex">Sex *</label>
                                        <select class="form-control" id="hh_sex" name="hh_sex" required onchange="checkRelationship()">
                                            <option value="">Select Sex</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="hh_date_of_birth">Date of Birth *</label>
                                            <input type="date" class="form-control" id="hh_date_of_birth" name="hh_date_of_birth" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_civil_status">Civil Status *</label>
                                        <select class="form-control" id="hh_civil_status" name="hh_civil_status" required>
                                            <option value="">Select Civil Status</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widow/Widower</option>
                                            <option value="separated">Live In</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="hh_form-group">
                                        <label for="philhealth_id">PhilHealth ID *</label>
                                        <input type="number" class="form-control" id="hh_philhealth_id" name="hh_philhealth_id" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_membership">Philhealth Membership</label>
                                        <select class="form-control" id="hh_membership" name="hh_membership" required onchange="checkMembership()">
                                            <option value="hh_membership">Select Membership</option>
                                            <option value="member">Member</option>
                                            <option value="dependent">Dependent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_wra">WRA </label>
                                        <input type="date" class="form-control" id="hh_wra" name="hh_wra">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_educational_attainment">Educational Attainment *</label>
                                        <select class="form-control" id="hh_educational_attainment" name="hh_educational_attainment" placeholder="Select Educational Attainment"required>
                                            <option value="none">None</option>
                                            <option value="elementary_level">Elementary Level</option>
                                            <option value="elementary_graduate">Elementary Graduate</option>
                                            <option value="high_school_level">High School Level</option>
                                            <option value="high_school_graduate">High School Graduate</option>
                                            <option value="vocational">Vocational</option>
                                            <option value="college_level">College Level</option>
                                            <option value="college_graduate">College Graduate</option>
                                            <option value="postgraduate">Postgraduate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hh_occupatiom">Occupation *</label>
                                        <input type="text" class="form-control" id="hh_occupation" name="hh_occupation">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="weight_remarks">Remarks *</label>
                                        <select class="form-control" id="weight_remarks" name="weight_remarksn" placeholder="Select Educational Attainment"required>
                                            <option value="none">None</option>
                                            <option value="sam">SAM - Severe Acute Malnutrition</option>
                                            <option value="mam">Mam - Moderate Acute Malnutrition</option>
                                            <option value="st">ST - Stunted</option>
                                            <option value="for_updating">UP - for updating</option>
                                            <option value="transferred">Transfer of Residence</option>
                                        </select>
                                    </div>
                                </div>

                            <input type="submit" name="submit" id="submit" class="btn-primary input-btn" value="Submit">
                
            </div>
        </div>
    </div>
</div>

    <?php
    include("includes/footer.php");
    ?>
