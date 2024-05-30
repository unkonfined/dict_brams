<?php
// Establish connection
$conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

// Check if delete request is made
if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete from household_members
        $delete_household_members_query = "DELETE FROM household_members WHERE member_id = $delete_id";
        $result_household_members = mysqli_query($conn, $delete_household_members_query);
        if (!$result_household_members) {
            throw new Exception(mysqli_error($conn));
        }

        // Delete from contact_information
        $delete_contact_query = "DELETE FROM contact_information WHERE personal_id = $delete_id";
        $result_contact = mysqli_query($conn, $delete_contact_query);
        if (!$result_contact) {
            throw new Exception(mysqli_error($conn));
        }

        // Delete from emergency_contacts
        $delete_emergency_query = "DELETE FROM emergency_contacts WHERE personal_id = $delete_id";
        $result_emergency = mysqli_query($conn, $delete_emergency_query);
        if (!$result_emergency) {
            throw new Exception(mysqli_error($conn));
        }

        // Delete from personal_information
        $delete_personal_query = "DELETE FROM personal_information WHERE id = $delete_id";
        $result_personal = mysqli_query($conn, $delete_personal_query);
        if (!$result_personal) {
            throw new Exception(mysqli_error($conn));
        }

        // Commit transaction
        mysqli_commit($conn);
        // Display success alert box
        echo "<script>alert('Record deleted successfully.');</script>";
    } catch (Exception $e) {
        // Rollback transaction if deletion fails
        mysqli_rollback($conn);
        // Display error alert box
        echo "<script>alert('Error deleting record: " . $e->getMessage() . "');</script>";
    }
}

// Query to fetch all residents
$sql = "SELECT * FROM personal_information";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>List Of Residents</title>
  <style>
    @media (min-width: 576px) {
      .container {
        max-width: 540px;
      }
    }
    @media (min-width: 768px) {
      .container {
        max-width: 720px;
      }
    }
    @media (min-width: 992px) {
      .container {
        max-width: 960px;
      }
    }
    @media (min-width: 1200px) {
      .container {
        max-width: 1140px;
      }
    }
    .container {
      width: auto;
      height: 500px;
      margin-top: 40px;
    }
    .card {
      margin-bottom: 20px;
    }
    .card-header {
      padding: 1rem;
    }
    .card-body {
      padding: 1rem;
    }
    .table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }
    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
    .float-end {
      float: right;
    }
    .dropdown {
      position: relative;
    }
    .dropdown-toggle::after {
      display: none;
    }
    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 10rem;
      padding: 0.5rem 0;
      margin: 0.125rem 0 0;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      list-style: none;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 0.25rem;
    }
    .dropdown-menu.show {
      display: block;
    }
    .dropdown-menu a {
      display: block;
      padding: 0.25rem 1.5rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0;
    }
    .dropdown-menu a:hover,
    .dropdown-menu a:focus {
      color: #fff;
      text-decoration: none;
      background-color: #007bff;
    }
    .dropdown-menu a:active {
      color: #fff;
      background-color: #0056b3;
    }
    .dropdown-item {
      width: 100%;
    }
    .dropdown-menu::before {
      position: absolute;
      top: -0.5rem;
      left: 50%;
      display: inline-block;
      width: 1rem;
      height: 1rem;
      margin-left: -0.5rem;
      content: "";
      border-top: 0.5rem solid #fff;
      border-right: 0.5rem solid transparent;
      border-bottom: 0;
      border-left: 0.5rem solid transparent;
    }
    .dropdown-menu::after {
      position: absolute;
      bottom: -0.5rem;
      left: 50%;
      display: inline-block;
      width: 1rem;
      height: 1rem;
      margin-left: -0.5rem;
      content: "";
      border-top: 0;
      border-right: 0.5rem solid transparent;
      border-bottom: 0.5rem solid #fff;
      border-left: 0.5rem solid transparent;
    }
    .dropdown-menu a.delete {
      background-color: #dc3545;
    }
    .dropdown-menu a.delete:hover,
    .dropdown-menu a.delete:focus {
      background-color: #c82333;
    }
    .dropdown-menu a.delete:active {
      background-color: #bd2130;
    }
    * {
      box-sizing: border-box;
    }
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List Of Residents
          <!-- <a href="resident_form.php" class="btn btn-primary float-end">Upload Information</a> -->
          </h4>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Operation</th>
              </tr>
            </thead>
            <tbody>
<?php
// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>#{$row['id']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['middlename']}</td>";
        echo "<td>{$row['lastname']}</td>";
        // Add a dropdown menu for each resident
        echo "<td class='dropdown'>";
        echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>Actions</button>";
        echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
        // Add links to the dropdown menu
        echo "<li><a class='dropdown-item' href='print_templete.php?resident_id={$row['id']}'>Print</a></li>";
        echo "<li><a class='dropdown-item' href='update_form.php?resident_id={$row['id']}'>Edit</a></li>";
        // Add a styled delete button for each resident
        echo "<li><a class='dropdown-item delete' href='?delete_id={$row['id']}'>Delete</a></li>";
        echo "</ul>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No residents found</td></tr>";
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
</div>

<!-- JavaScript to handle search functionality -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('search-bar');
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
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
