<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonized Family / Household Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
        }
        .header-table, .content-table {
            margin-bottom: 20px;
        }
        .header-table th, .header-table td {
            border: none;
        }
        .no-border {
            border: none !important;
        }
        .small-text {
            font-size: 10px;
        }
        .section-title {
            background-color: #e0e0e0;
            font-weight: bold;
        }
    </style>
</head>
<body>

<table class="header-table">
    <tr>
        <td>Encoded by: ___________________________</td>
        <td>Date Encoded: ___________________________</td>
    </tr>
    <tr>
        <td>Signature over printed name of Encoder/Designation</td>
        <td>(mm-dd-yyyy)</td>
    </tr>
</table>

<table>
    <tr>
        <th colspan="4" class="no-border">HARMONIZED FAMILY / HOUSEHOLD PROFILE</th>
    </tr>
    <tr>
        <td colspan="4" class="no-border">
            <table class="no-border">
                <tr>
                    <td class="no-border">Sitio / Purok: <?php echo $sitio_purok ?? ''; ?></td>
                    <td class="no-border">NHTS 4Ps: <input type="checkbox" <?php echo ($nhts_4ps ?? false) ? 'checked' : ''; ?>></td>
                    <td class="no-border">IP Household: <input type="checkbox" <?php echo ($ip_household ?? false) ? 'checked' : ''; ?>></td>
                </tr>
                <tr>
                    <td class="no-border">Barangay: <?php echo $barangay ?? ''; ?></td>
                    <td class="no-border">NHTS Non-4Ps: <input type="checkbox" <?php echo ($nhts_non_4ps ?? false) ? 'checked' : ''; ?>></td>
                    <td class="no-border">Non-IP: <input type="checkbox" <?php echo ($non_ip ?? false) ? 'checked' : ''; ?>></td>
                </tr>
                <tr>
                    <td class="no-border">Household Number: <?php echo $household_number ?? ''; ?></td>
                    <td class="no-border">Renter: <input type="checkbox" <?php echo ($renter ?? false) ? 'checked' : ''; ?>></td>
                    <td class="no-border">Number of Months: <?php echo $renter_months ?? ''; ?></td>
                </tr>
                <tr>
                    <td class="no-border">Blind Drainage: <input type="checkbox" <?php echo ($blind_drainage ?? false) ? 'checked' : ''; ?>></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th colspan="4">NAME OF RESPONDENT</th>
    </tr>
    <tr>
        <td>Last Name: <?php echo $last_name ?? ''; ?></td>
        <td>First Name: <?php echo $first_name ?? ''; ?></td>
        <td>Middle Name: <?php echo $middle_name ?? ''; ?></td>
        <td>Relationship to HH Head: <?php echo $relationship_to_head ?? ''; ?></td>
    </tr>
    <tr>
        <td colspan="4">Date of Visit: <?php echo $date_of_visit ?? ''; ?></td>
    </tr>
</table>

<table>
    <tr>
        <th colspan="4">HOUSEHOLD INFORMATION</th>
    </tr>
    <tr>
        <td>Type of Water Source: <?php echo $type_of_water_source ?? ''; ?></td>
        <td>Type of Water Source: <?php echo $type_of_water_source ?? ''; ?></td>
        <td>Type of Sanitary Toilet Facility: <?php echo $type_of_sanitary_toilet ?? ''; ?></td>
        <td>Type of Unitary Toilet: <?php echo $type_of_unitary_toilet ?? ''; ?></td>
    </tr>
    <tr>
        <td colspan="2">Type of Water Source: <?php echo $type_of_water_source ?? ''; ?></td>
        <td>Type of Unitary Toilet: <?php echo $type_of_unitary_toilet ?? ''; ?></td>
        <td>Type of Waste Management: <?php echo $type_of_waste_management ?? ''; ?></td>
    </tr>
</table>

<table class="content-table">
    <tr>
        <th rowspan="2">Name of Household Members</th>
        <th rowspan="2">Relationship to HH Head</th>
        <th rowspan="2">Sex</th>
        <th rowspan="2">Date of Birth</th>
        <th rowspan="2">Civil Status</th>
        <th rowspan="2">PhilHealth ID Number</th>
        <th rowspan="2">Membership Type</th>
        <th colspan="2">Medical History</th>
        <th colspan="4">Personal/Social History</th>
        <th rowspan="2">WRA</th>
        <th rowspan="2">Classification by Age/Health Risk Group</th>
        <th rowspan="2">Education & Occupation</th>
        <th rowspan="2">Remarks</th>
    </tr>
    <tr>
        <th>Type</th>
        <th>Specific</th>
        <th>Smoker</th>
        <th>Alcohol Drinker</th>
        <th>Sexually Active</th>
        <th>Last Mens. Period</th>
    </tr>

    <?php
    // Sample data for household members. Replace with your actual data fetching logic.
    $household_members = [
        [
            'name' => 'John Doe',
            'relationship' => 'Head',
            'sex' => 'M',
            'dob' => '1980-01-01',
            'civil_status' => 'Married',
            'philhealth_id' => '1234567890',
            'membership_type' => 'Member',
            'medical_type' => 'None',
            'medical_specific' => '',
            'smoker' => 'No',
            'alcohol_drinker' => 'No',
            'sexually_active' => 'Yes',
            'last_mens_period' => '',
            'wra' => 'No',
            'age_health_risk' => 'Adult',
            'education_occupation' => 'College Graduate, Employed',
            'remarks' => 'None'
        ],
        // Add more household members as needed.
    ];

    foreach ($household_members as $member) {
        echo "<tr>";
        echo "<td>{$member['name']}</td>";
        echo "<td>{$member['relationship']}</td>";
        echo "<td>{$member['sex']}</td>";
        echo "<td>{$member['dob']}</td>";
        echo "<td>{$member['civil_status']}</td>";
        echo "<td>{$member['philhealth_id']}</td>";
        echo "<td>{$member['membership_type']}</td>";
        echo "<td>{$member['medical_type']}</td>";
        echo "<td>{$member['medical_specific']}</td>";
        echo "<td>{$member['smoker']}</td>";
        echo "<td>{$member['alcohol_drinker']}</td>";
        echo "<td>{$member['sexually_active']}</td>";
        echo "<td>{$member['last_mens_period']}</td>";
        echo "<td>{$member['wra']}</td>";
        echo "<td>{$member['age_health_risk']}</td>";
        echo "<td>{$member['education_occupation']}</td>";
        echo "<td>{$member['remarks']}</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
