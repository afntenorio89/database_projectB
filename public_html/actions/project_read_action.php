<?php
session_start();

if(!isset($_SESSION['u_id']) || empty($_SESSION['u_id'])){
  header("location: ../errors/index.php");
  exit;
}

// Check existence of id parameter before processing further
if(isset($_GET["project_id"]) && !empty(trim($_GET["project_id"]))){
    // Include config file
    require_once '../configs/database.php';

    // Prepare a select statement
    $sql = "SELECT * FROM projects WHERE project_id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_project_id);

        // Set parameters
        $param_project_id = trim($_GET["project_id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $project_id = $row["project_id"];
                $project_name = $row["project_name"];
                $project_description = $row["project_description"];
                $project_manager = $row["project_manager"];
                $project_lead = $row["project_lead"];
                $project_members = $row["project_members"];
                $project_comment = $row["project_comment"];
                $project_status = $row["project_status"];

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
                        <h1><?php echo $row["project_name"]; ?></h1>
                        <hr>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <h5>Project ID</h5>
                            <p class="form-control-static"><?php echo $row["project_id"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Name</h5>
                            <p class="form-control-static"><?php echo $row["project_name"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Description</h5>
                            <p class="form-control-static"><?php echo $row["project_description"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Manager</h5>
                            <p class="form-control-static"><?php echo $row["project_manager"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Lead</h5>
                            <p class="form-control-static"><?php echo $row["project_lead"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Members</h5>
                            <p class="form-control-static"><?php echo $row["project_members"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Comment</h5>
                            <p class="form-control-static"><?php echo $row["project_comment"]; ?></p>
                        </div>
                        <div class="form-group">
                            <h5>Status</h5>
                            <p class="form-control-static"><?php echo $row["project_status"]; ?></p>
                        </div>
                      </div> <!-- col end -->

                    </div> <!-- row end-->




                    <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
