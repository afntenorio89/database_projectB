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
$project_name ="";
$project_description ="";
$project_manager ="";
$project_lead ="";
$project_members ="";
$project_comment ="";
$project_status ="";

//Error messages
$project_id_err ="";
$project_name_err ="";
$project_description_err ="";
$project_manager_err ="";
$project_lead_err ="";
$project_members_err ="";
$project_comment_err ="";
$project_status_err ="";


// Processing form data when form is submitted
if(isset($_POST["project_id"]) && !empty($_POST["project_id"])){
    // Get hidden input value
    $project_id = $_POST["project_id"];

    // // Validate Project ID
    // $input_projectID = trim($_POST["project_id"]);
    // if(empty($input_projectID)){
    //     $project_id_err = "Please enter a project id.";
    // } else{
    //     $project_id = $input_projectID;
    // }
    // // Validate product number
    // $input_projectNumber = trim($_POST["project_number"]);
    // if(empty($input_projectNumber)){
    //     $project_number_err = "Please enter a project number.";
    // } else{
    //     $project_number = $input_projectNumber;
    // }

    $project_id = mysqli_real_escape_string($conn,$_POST["project_id"]);
    $project_name = mysqli_real_escape_string($conn,$_POST["project_name"]);
    $project_description = mysqli_real_escape_string($conn,$_POST["project_description"]);
    $project_manager = mysqli_real_escape_string($conn,$_POST["project_manager"]);
    $project_lead = mysqli_real_escape_string($conn,$_POST["project_lead"]);
    $project_members = mysqli_real_escape_string($conn,$_POST["project_members"]);
    $project_comment = mysqli_real_escape_string($conn,$_POST["project_comment"]);
    $project_status = mysqli_real_escape_string($conn,$_POST["project_status"]);


    // // Check for duplicate
    // //Template
    // $dupesql = "SELECT * FROM projects WHERE project_id = ? AND project_number = ?";
    // //Prepared statement
    // $dupestmt = mysqli_stmt_init($conn);
    // //Prepared statement prepared
    // if(!mysqli_stmt_prepare($dupestmt, $dupesql)) {
    //   echo "SQL statement failed!";
    // } else { //comment out
        //Bind parameters to placeholders
        // mysqli_stmt_bind_param($dupestmt, "ss", $project_id, $project_number);
        // //Run paramters inside Database
        // mysqli_stmt_execute($dupestmt);
        // $result = mysqli_stmt_get_result($dupestmt);
        // $dupecount = mysqli_num_rows($result);
        // if ($dupecount > 0) {
        //   echo "project already exist!";
        // }else {
          // Check input errors before inserting in database
          if(empty($project_id_err) && empty($project_number_err)){
              // Prepare an update statement
              // $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
              $sql = "UPDATE projects SET project_name=?, project_description=?, project_manager=?, project_lead=?, project_members=?, project_comment=?, project_status=? WHERE project_id=?";

              if($stmt = mysqli_prepare($conn, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "ssssssss", $param_project_name, $param_project_description, $param_project_manager, $param_project_lead, $param_project_members, $param_project_comment, $param_project_status, $param_project_id);
                  // Set parameters
                  $param_project_name = $project_name;
                  $param_project_description = $project_description;
                  $param_project_manager = $project_manager;
                  $param_project_lead = $project_lead;
                  $param_project_members = $project_members;
                  $param_project_comment = $project_comment;
                  $param_project_status = $project_status;
                  $param_project_id = $project_id;


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
    if(isset($_GET["project_id"]) && !empty(trim($_GET["project_id"]))){
        // Get URL parameter
        $project_id =  trim($_GET["project_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM projects WHERE project_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_project_id);

            // Set parameters
            $param_project_id = $project_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $project_id = $row["project_id"];
                    $project_name = $row["project_name"];
                    $project_description = $row["project_description"];
                    $project_manager = $row["project_manager"];
                    $project_lead = $row["project_lead"];
                    $project_members = $row["project_members"];
                    $project_comment = $row["project_comment"];
                    $project_status = $row["project_status"];


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
                        <h2>Update Record for <?php echo $project_name; ?></h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($project_id_err)) ? 'has-error' : ''; ?>">
                            <label>Project ID</label>
                            <input disabled type="text" name="project_id" class="form-control" value="<?php echo $project_id; ?>">
                            <input type="hidden" value="<?php echo $project_id; ?>" name="project_id">
                            <span class="help-block"><?php echo $project_id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="project_name" class="form-control" value="<?php echo $project_name; ?>">
                            <span class="help-block"><?php echo $project_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <input type="text" name="project_description" class="form-control" value="<?php echo $project_description; ?>">
                            <span class="help-block"><?php echo $project_description_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_manager_err)) ? 'has-error' : ''; ?>">
                            <label>Manager</label>
                            <input type="text" name="project_manager" class="form-control" value="<?php echo $project_manager; ?>">
                            <span class="help-block"><?php echo $project_manager_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_lead_err)) ? 'has-error' : ''; ?>">
                            <label>Lead</label>
                            <input type="text" name="project_lead" class="form-control" value="<?php echo $project_lead; ?>">
                            <span class="help-block"><?php echo $project_lead_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_members_err)) ? 'has-error' : ''; ?>">
                            <label>Members</label>
                            <input type="text" name="project_members" class="form-control" value="<?php echo $project_members; ?>">
                            <span class="help-block"><?php echo $project_members_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_comment_err)) ? 'has-error' : ''; ?>">
                            <label>Comment</label>
                            <input type="text" name="project_comment" class="form-control" value="<?php echo $project_comment; ?>">
                            <span class="help-block"><?php echo $project_comment_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($project_status_err)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <input type="text" name="project_status" class="form-control" value="<?php echo $project_status; ?>">
                            <span class="help-block"><?php echo $project_status_err;?></span>
                        </div>
                        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
