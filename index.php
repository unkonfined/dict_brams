<?php
// Establish connection
$conn = mysqli_connect('localhost', 'root', '', 'db_bacolod') or die("Connection Failed: " . mysqli_connect_error());

// Check if delete request is made
if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])){
  $delete_id = $_GET['delete_id'];
  
  // Begin transaction
  mysqli_begin_transaction($conn);

  // Delete contact information
  $delete_contact_query = "DELETE FROM contact_information WHERE personal_id = $delete_id";
  $result_contact = mysqli_query($conn, $delete_contact_query);

  // Delete emergency contacts
  $delete_emergency_query = "DELETE FROM emergency_contacts WHERE personal_id = $delete_id";
  $result_emergency = mysqli_query($conn, $delete_emergency_query);

  // Delete personal information
  $delete_personal_query = "DELETE FROM personal_information WHERE id = $delete_id";
  $result_personal = mysqli_query($conn, $delete_personal_query);

  // Check if deletion was successful
  if($result_contact && $result_emergency && $result_personal) {
      // Commit transaction
      mysqli_commit($conn);
      // Display success alert box
      echo "<script>alert('Record deleted successfully.');</script>";
  } else {
      // Rollback transaction if deletion fails
      mysqli_rollback($conn);
      // Display error alert box
      echo "<script>alert('Error deleting record: " . mysqli_error($conn) . "');</script>";
  }
}

// Handle search query
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM personal_information";
if (!empty($search_query)) {
    $sql .= " WHERE firstname LIKE '%$search_query%' OR middlename LIKE '%$search_query%' OR lastname LIKE '%$search_query%'";
}

// Query to fetch all residents
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Paste the CSS code here */
    /* Responsive styles */
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

    .container{
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

        .topnav {
            overflow: hidden;
            background-color: #D8F1B9;
            padding: 10px;
        }

        .topnav img {
            max-width: 100px;
            height: auto;
            float: left;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 8px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            border-radius: 5px;
        }

        .topnav .search-container button {
            padding: 8px 12px;
            margin-top: 8px;
            background: #143A1F;
            color: #fff;
            font-size: 17px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @media screen and (max-width: 600px) {
            .topnav img {
                float: none;
                display: block;
                margin: 0 auto;
            }
            
            .topnav .search-container {
                float: none;
                text-align: center;
                margin-top: 10px;
            }

            .topnav input[type=text] {
                width: 80%;
            }

            .topnav .search-container button {
                width: 80%;
            }
        }

  </style>
</head>
<body>

<div class="topnav">
    <img src="elements/dict_logo2.png" alt="Company Logo">
    <div class="search-container">
        <form id="searchform" method="GET"> <!-- Update action to index.php -->
            <input type="text" id="search-bar" name="search" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List Of Residents
          <a href="Form.php" class="btn btn-primary float-end">Upload Information</a>
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
</body>
</html>
