<?php

session_start();

if(!isset($_SESSION['u_id']) || empty($_SESSION['u_id'])){
  header("location: ../errors/index.php");
  exit;
}

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


//Error messages
$project_id_err ="";
$part_number_err ="";
$part_name_err ="";
$part_primaryLocation_err ="";
$part_secondaryLocation_err ="";
$part_cleanroomLocation_err ="";
$part_quantity_err ="";
$part_secondaryQuantity_err ="";
$part_cleanroomQuantity_err ="";
$part_unitOfMeasurement_err ="";
$part_expirationDate_err ="";
$part_comment_err ="";
$part_hazardous_err ="";
$part_cers_err ="";
$part_msds_err ="";
$part_flamability_err ="";
$part_instability_err ="";
$part_health_err ="";
$part_specificHazard_err ="";


// Processing form data when form is submitted
if(isset($_POST["part_id"]) && !empty($_POST["part_id"])){
    // Get hidden input value
    $part_id = $_POST["part_id"];

    // // Validate Project ID
    // $input_projectID = trim($_POST["project_id"]);
    // if(empty($input_projectID)){
    //     $project_id_err = "Please enter a project id.";
    // } else{
    //     $project_id = $input_projectID;
    // }
    // // Validate product number
    // $input_partNumber = trim($_POST["part_number"]);
    // if(empty($input_partNumber)){
    //     $part_number_err = "Please enter a part number.";
    // } else{
    //     $part_number = $input_partNumber;
    // }
    $project_id = mysqli_real_escape_string($conn,$_POST["project_id"]);
    $part_number = mysqli_real_escape_string($conn,$_POST["part_number"]);
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

    // // Check for duplicate
    // //Template
    // $dupesql = "SELECT * FROM parts WHERE project_id = ? AND part_number = ?";
    // //Prepared statement
    // $dupestmt = mysqli_stmt_init($conn);
    // //Prepared statement prepared
    // if(!mysqli_stmt_prepare($dupestmt, $dupesql)) {
    //   echo "SQL statement failed!";
    // } else { //comment out
        //Bind parameters to placeholders
        // mysqli_stmt_bind_param($dupestmt, "ss", $project_id, $part_number);
        // //Run paramters inside Database
        // mysqli_stmt_execute($dupestmt);
        // $result = mysqli_stmt_get_result($dupestmt);
        // $dupecount = mysqli_num_rows($result);
        // if ($dupecount > 0) {
        //   echo "Part already exist!";
        // }else {
          // Check input errors before inserting in database
          if(empty($project_id_err) && empty($part_number_err)){
              // Prepare an update statement
              // $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
              $sql = "UPDATE parts SET part_name=?, part_primaryLocation=?, part_secondaryLocation=?, part_cleanroomLocation=?, part_quantity=?, part_secondaryQuantity=?, part_cleanroomQuantity=?, part_unitOfMeasurement=?, part_expirationDate=?, part_comment=?, part_hazardous=?, part_cers=?, part_msds=?, part_flamability=?, part_instability=?, part_health=?, part_specificHazard=? WHERE part_id=?";

              if($stmt = mysqli_prepare($conn, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "ssssdsssssssssssss", $param_part_name, $param_part_primaryLocation, $param_part_secondaryLocation, $param_part_cleanroomLocation, $param_part_quantity, $param_part_secondaryQuantity, $param_part_cleanroomQuantity, $param_part_unitOfMeasurement, $param_part_expirationDate, $param_part_comment, $param_part_hazardous, $param_part_cers, $param_part_msds, $param_part_flamability, $param_part_instability, $param_part_health, $param_part_specificHazard, $param_part_id);
                  // Set parameters
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
                  $param_part_id = $part_id;

                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      // Records updated successfully. Redirect to landing page
                      header("location: ../index.php");
                      exit();
                  } else{
                      echo "Something went wrong. Please try again later.";
                  }
              }
              // Close statement
              mysqli_stmt_close($stmt);
          }
        //} Dupe Check Disabled
    // Close connection
    mysqli_close($conn);
//} Duplicate Check Disabled
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["part_id"]) && !empty(trim($_GET["part_id"]))){
        // Get URL parameter
        $part_id =  trim($_GET["part_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM parts WHERE part_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_part_id);

            // Set parameters
            $param_part_id = $part_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $project_id = $row["project_id"];
                    $part_number = $row["part_number"];
                    $part_name = $row["part_name"];
                    $part_primaryLocation = $row["part_primaryLocation"];
                    $part_secondaryLocation = $row["part_secondaryLocation"];
                    $part_cleanroomLocation = $row["part_cleanroomLocation"];
                    $part_quantity = $row["part_quantity"];
                    $part_secondaryQuantity = $row["part_secondaryQuantity"];
                    $part_cleanroomQuantity = $row["part_cleanroomQuantity"];
                    $part_unitOfMeasurement = $row["part_unitOfMeasurement"];
                    $part_expirationDate = $row["part_expirationDate"];
                    $part_comment = $row["part_comment"];
                    $part_hazardous = $row["part_hazardous"];
                    $part_cers = $row["part_cers"];
                    $part_msds = $row["part_msds"];
                    $part_flamability = $row["part_flamability"];
                    $part_instability = $row["part_instability"];
                    $part_health = $row["part_health"];
                    $part_specificHazard = $row["part_specificHazard"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php include_once('../templates/header_secondary.php') ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record for <?php echo $part_name; ?></h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($project_id_err)) ? 'has-error' : ''; ?>">
                            <label>Project ID</label>
                            <input disabled type="text" name="project_id" class="form-control" value="<?php echo $project_id; ?>">
                            <input type="hidden" value="<?php echo $project_id; ?>" name="project_id">
                            <span class="help-block"><?php echo $project_id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_number_err)) ? 'has-error' : ''; ?>">
                            <label>Part Number</label>
                            <input disabled type="text" name="part_number" class="form-control" value="<?php echo $part_number; ?>">
                            <input type="hidden" value="<?php echo $part_number; ?>" name="part_number">
                            <span class="help-block"><?php echo $part_number_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="part_name" class="form-control" value="<?php echo $part_name; ?>">
                            <span class="help-block"><?php echo $part_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_primaryLocation_err)) ? 'has-error' : ''; ?>">
                            <label>Primary Location</label>
                            <input type="text" name="part_primaryLocation" class="form-control" value="<?php echo $part_primaryLocation; ?>">
                            <span class="help-block"><?php echo $part_primaryLocation_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_secondaryLocation_err)) ? 'has-error' : ''; ?>">
                            <label>Secondary Location</label>
                            <input type="text" name="part_secondaryLocation" class="form-control" value="<?php echo $part_secondaryLocation; ?>">
                            <span class="help-block"><?php echo $part_secondaryLocation_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_cleanroomLocation_err)) ? 'has-error' : ''; ?>">
                            <label>Cleanroom Location</label>
                            <input type="text" name="part_cleanroomLocation" class="form-control" value="<?php echo $part_cleanroomLocation; ?>">
                            <span class="help-block"><?php echo $part_cleanroomLocation_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Total Quantity</label>
                            <input type="number" step="0.01" name="part_quantity" class="form-control" value="<?php echo $part_quantity; ?>">
                            <span class="help-block"><?php echo $part_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_secondaryQuantity_err)) ? 'has-error' : ''; ?>">
                            <label>Secondary Quantity</label>
                            <input type="number" step="0.01" name="part_secondaryQuantity" class="form-control" value="<?php echo $part_secondaryQuantity; ?>">
                            <span class="help-block"><?php echo $part_secondaryQuantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_cleanroomQuantity_err)) ? 'has-error' : ''; ?>">
                            <label>Cleanroom Qty</label>
                            <input type="number" step="0.01" name="part_cleanroomQuantity" class="form-control" value="<?php echo $part_cleanroomQuantity; ?>">
                            <span class="help-block"><?php echo $part_cleanroomQuantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_unitOfMeasurement_err)) ? 'has-error' : ''; ?>">
                            <label>Unit of Measurement</label>
                            <input type="text" name="part_unitOfMeasurement" class="form-control" value="<?php echo $part_unitOfMeasurement; ?>">
                            <span class="help-block"><?php echo $part_unitOfMeasurement_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_expirationDate_err)) ? 'has-error' : ''; ?>">
                            <label>Expiration Date</label>
                            <input type="text" name="part_expirationDate" class="form-control" value="<?php echo $part_expirationDate; ?>">
                            <span class="help-block"><?php echo $part_expirationDate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_comment_err)) ? 'has-error' : ''; ?>">
                            <label>Comment</label>
                            <input type="text" name="part_comment" class="form-control" value="<?php echo $part_comment; ?>">
                            <span class="help-block"><?php echo $part_comment_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_hazardous_err)) ? 'has-error' : ''; ?>">
                            <label>Hazardous?</label>
                            <input type="text" name="part_hazardous" class="form-control" value="<?php echo $part_hazardous; ?>">
                            <span class="help-block"><?php echo $part_hazardous_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_cers_err)) ? 'has-error' : ''; ?>">
                            <label>CERS</label>
                            <input type="text" name="part_cers" class="form-control" value="<?php echo $part_cers; ?>">
                            <span class="help-block"><?php echo $part_cers_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_msds_err)) ? 'has-error' : ''; ?>">
                            <label>MSDS</label>
                            <input type="text" name="part_msds" class="form-control" value="<?php echo $part_msds; ?>">
                            <span class="help-block"><?php echo $part_msds_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_flamability_err)) ? 'has-error' : ''; ?>">
                            <label>Flamability</label>
                            <input type="text" name="part_flamability" class="form-control" value="<?php echo $part_flamability; ?>">
                            <span class="help-block"><?php echo $part_flamability_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_instability_err)) ? 'has-error' : ''; ?>">
                            <label>Instability</label>
                            <input type="text" name="part_instability" class="form-control" value="<?php echo $part_instability; ?>">
                            <span class="help-block"><?php echo $part_instability_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_health_err)) ? 'has-error' : ''; ?>">
                            <label>Health Hazard</label>
                            <input type="text" name="part_health" class="form-control" value="<?php echo $part_health; ?>">
                            <span class="help-block"><?php echo $part_health_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($part_specificHazard_err)) ? 'has-error' : ''; ?>">
                            <label>Specific Hazard</label>
                            <input type="text" name="part_specificHazard" class="form-control" value="<?php echo $part_specificHazard; ?>">
                            <span class="help-block"><?php echo $part_specificHazard_err;?></span>
                        </div>
                        <input type="hidden" name="part_id" value="<?php echo $part_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
