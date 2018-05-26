<?php
// Include config file
require_once '../configs/database.php';

// Define variables and initialize with empty values
$project_id ="";
$part_number ="";
$part_name ="";
$part_primaryLocation ="";
$part_secondaryLocation ="";
$part_cleanroomLocation ="";
$part_quantity ="";
$part_secondaryQuantity ="";
$part_cleanroomQuantity ="";
$part_unitOfMeasurement ="";
$part_expirationDate ="";
$part_comment ="";
$part_hazardous ="";
$part_cers ="";
$part_msds ="";
$part_flamability ="";
$part_instability ="";
$part_health ="";
$part_specificHazard ="";

//Error value intilization for key VALUES
$project_id_err ="";
$part_number_err = "";

// Process form data when submitted
if(isset($_POST['submit'])){
    // Validate project ID
    $input_projectID = mysqli_real_escape_string($conn,$_POST["project_id"]);
    if(empty($input_projectID)){
        $project_id_err = "Please enter project ID.";
    } else{
        $project_id = $input_projectID;
    }

    // Validate Part Name
    $input_partNumber = mysqli_real_escape_string($conn,$_POST["part_number"]);
    if(empty($input_partNumber)){
        $part_number_err = 'Please enter part number.';
    } else{
        $part_number = $input_partNumber;
    }

    $part_name = mysqli_real_escape_string($conn,$_POST["part_name"]);
    $part_primaryLocation = mysqli_real_escape_string($conn,$_POST["part_primaryLocation"]);
    $part_secondaryLocation = mysqli_real_escape_string($conn,$_POST["part_secondaryLocation"]);
    $part_cleanroomLocation = mysqli_real_escape_string($conn,$_POST["part_cleanroomLocation"]);
    $part_quantity = $_POST["part_quantity"];
    $part_unitOfMeasurement = mysqli_real_escape_string($conn,$_POST["part_unitOfMeasurement"]);
    $part_expirationDate = mysqli_real_escape_string($conn,$_POST["part_expirationDate"]);
    $part_comment = mysqli_real_escape_string($conn,$_POST["part_comment"]);
    $part_hazardous = mysqli_real_escape_string($conn,$_POST["part_hazardous"]);
    $part_cers = mysqli_real_escape_string($conn,$_POST["part_cers"]);
    $part_msds = mysqli_real_escape_string($conn,$_POST["part_msds"]);
    $part_flamability = mysqli_real_escape_string($conn,$_POST["part_flamability"]);
    $part_instability = mysqli_real_escape_string($conn,$_POST["part_instability"]);
    $part_health = mysqli_real_escape_string($conn,$_POST["part_health"]);
    $part_specificHazard = mysqli_real_escape_string($conn,$_POST["part_specificHazard"]);


    // Check for duplicate
    //Template
    $dupesql = "SELECT * FROM parts WHERE project_id = ? AND part_number = ?";
    //Prepared statement
    $dupestmt = mysqli_stmt_init($conn);
    //Prepared statement prepared
    if(!mysqli_stmt_prepare($dupestmt, $dupesql)) {
      echo "SQL statement failed!";
    } else {
        //Bind parameters to placeholders
        mysqli_stmt_bind_param($dupestmt, "ss", $project_id, $part_number);
        //Run paramters inside Database
        mysqli_stmt_execute($dupestmt);
        $result = mysqli_stmt_get_result($dupestmt);
        $dupecount = mysqli_num_rows($result);
        if ($dupecount > 0) {
          echo "Part already exist!";
        }else {
        // Check input errors before inserting in database
        if(empty($project_id_err) && empty($part_number_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO parts (project_id, part_number, part_name, part_primaryLocation, part_secondaryLocation, part_cleanroomLocation, part_quantity, part_unitOfMeasurement, part_expirationDate, part_comment, part_hazardous, part_cers, part_msds, part_flamability, part_instability, part_health, part_specificHazard) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssdssssssssss", $param_project_id, $param_part_number, $param_part_name, $param_part_primaryLocation, $param_part_secondaryLocation, $param_part_cleanroomLocation, $param_part_quantity, $param_part_unitOfMeasurement, $param_part_expirationDate, $param_part_comment, $param_part_hazardous, $param_part_cers, $param_part_msds, $param_part_flamability, $param_part_instability, $param_part_health, $param_part_specificHazard);

                // Set parameters
                $param_project_id = $project_id;
                $param_part_number = $part_number;
                $param_part_name = $part_name;
                $param_part_primaryLocation = $part_primaryLocation;
                $param_part_secondaryLocation = $part_secondaryLocation;
                $param_part_cleanroomLocation = $part_cleanroomLocation;
                $param_part_quantity = $part_quantity;
                $param_part_unitOfMeasurement = $part_unitOfMeasurement;
                $param_part_expirationDate = $part_expirationDate;
                $param_part_comment = $part_comment;
                $param_part_hazardous = $part_hazardous;
                $param_part_cers = $part_cers;
                $param_part_msds = $part_msds;
                $param_part_flamability = $part_flamability;
                $param_part_instability = $part_instability;
                $param_part_health = $part_health;
                $param_part_specificHazard = $part_specificHazard;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    header("location: ../index.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        } //Check input end
      }
}// Check for duplicate end
    // Close connection
    mysqli_close($conn);
}
?>
