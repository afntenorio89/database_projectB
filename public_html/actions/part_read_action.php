<?php
session_start();

if(!isset($_SESSION['u_id']) || empty($_SESSION['u_id'])){
  header("location: ../errors/index.php");
  exit;
}

// Check existence of id parameter before processing further
if(isset($_GET["part_id"]) && !empty(trim($_GET["part_id"]))){
    // Include config file
    require_once '../configs/database.php';

    // Prepare a select statement
    $sql = "SELECT * FROM parts WHERE part_id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_part_id);

        // Set parameters
        $param_part_id = trim($_GET["part_id"]);

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
                $part_comment = $row["part_comment"];
                $part_hazardous = $row["part_hazardous"];
                $part_cers = $row["part_cers"];
                $part_msds = $row["part_msds"];
                $part_flamability = $row["part_flamability"];
                $part_health = $row["part_health"];
                $part_instability = $row["part_instability"];
                $part_specificHazard = $row["part_specificHazard"];
                $part_quantity = $row["part_quantity"];
                $part_secondaryQuantity = $row["part_secondaryQuantity"];
                $part_cleanroomQuantity = $row["part_cleanroomQuantity"];
                $part_unitOfMeasurement = $row["part_unitOfMeasurement"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1><?php echo $row["part_name"]; ?></h1>
                        <hr>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <h5>Project ID</h5>
                            <p class="form-control-static"><?php echo $row["project_id"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Part Number</h5>
                            <p class="form-control-static"><?php echo $row["part_number"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Name</h5>
                            <p class="form-control-static"><?php echo $row["part_name"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Primary Location</h5>
                            <p class="form-control-static"><?php echo $row["part_primaryLocation"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Secondary Location</h5>
                            <p class="form-control-static"><?php echo $row["part_secondaryLocation"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Cleanroom Location</h5>
                            <p class="form-control-static"><?php echo $row["part_cleanroomLocation"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Comment</h5>
                            <p class="form-control-static"><?php echo $row["part_comment"]; ?></p>
                        </div>
                      </div> <!-- col end -->

                      <div class="col-md-4">
                        <div class="form-group">
                            <h5>Total Quantity</h5>
                            <p class="form-control-static"><?php echo $row["part_quantity"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Secondary Quantity</h5>
                            <p class="form-control-static"><?php echo $row["part_secondaryQuantity"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Cleanroom Quantity</h5>
                            <p class="form-control-static"><?php echo $row["part_cleanroomQuantity"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Unit of Meas.</h5>
                            <p class="form-control-static"><?php echo $row["part_unitOfMeasurement"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Hazardous?</h5>
                            <p class="form-control-static"><?php echo $row["part_hazardous"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>CERS</h5>
                            <p class="form-control-static"><?php echo $row["part_cers"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>MSDS</h5>
                            <p class="form-control-static"><?php echo $row["part_msds"]; ?></p>
                        </div>
                      </div> <!-- 2nd col end -->

                      <div class="col-md-4">
                        <div class="form-group">
                            <h5>Flamability</h5>
                            <p class="form-control-static"><?php echo $row["part_flamability"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Health</h5>
                            <p class="form-control-static"><?php echo $row["part_health"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Instability</h5>
                            <p class="form-control-static"><?php echo $row["part_instability"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Specific Hazard</h5>
                            <p class="form-control-static"><?php echo $row["part_specificHazard"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Image</h5>
                            <img src="../images/<?php echo 'user.png'?>" alt="..." class=" ">
                        </div>
                      </div>
                    </div> <!-- row end-->




                    <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
