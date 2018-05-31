<?php
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


//Error value intilization for key VALUES
$project_id_err ="";

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
    $input_projectName = mysqli_real_escape_string($conn,$_POST["project_name"]);
    if(empty($input_projectName)){
        $project_name_err = 'Please enter project name.';
    } else{
        $project_name = $input_projectName;
    }

    $project_description = mysqli_real_escape_string($conn,$_POST["project_description"]);
    $project_manager = mysqli_real_escape_string($conn,$_POST["project_manager"]);
    $project_lead = mysqli_real_escape_string($conn,$_POST["project_lead"]);
    $project_members = mysqli_real_escape_string($conn,$_POST["project_members"]);
    $project_comment = mysqli_real_escape_string($conn,$_POST["project_comment"]);
    $project_status = mysqli_real_escape_string($conn,$_POST["project_status"]);



    // Check for duplicate
    //Template
    $dupesql = "SELECT * FROM projects WHERE project_id = ? AND project_name = ?";
    //Prepared statement
    $dupestmt = mysqli_stmt_init($conn);
    //Prepared statement prepared
    if(!mysqli_stmt_prepare($dupestmt, $dupesql)) {
      echo "SQL statement failed!";
    } else {
        //Bind parameters to placeholders
        mysqli_stmt_bind_param($dupestmt, "ss", $project_id, $project_name);
        //Run paramters inside Database
        mysqli_stmt_execute($dupestmt);
        $result = mysqli_stmt_get_result($dupestmt);
        $dupecount = mysqli_num_rows($result);
        if ($dupecount > 0) {
          echo "Project already exist!";
        }else {
        // Check input errors before inserting in database
        if(empty($project_id_err) && empty($project_name_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO projects (project_id, project_name, project_description, project_manager, project_lead, project_members, project_comment, project_status) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssss", $param_project_id, $param_project_name, $param_project_description, $param_project_manager, $param_project_lead, $param_project_members, $param_project_comment, $param_project_status);

                $param_project_id = $project_id;
                $param_project_name = $project_name;
                $param_project_description = $project_description;
                $param_project_manager = $project_manager;
                $param_project_lead = $project_lead;
                $param_project_members = $project_members;
                $param_project_comment = $project_comment;
                $param_project_status = $project_status;


                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    header("Location: ../index.php");
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
