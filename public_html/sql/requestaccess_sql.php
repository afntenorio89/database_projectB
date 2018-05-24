<?php

if (isset($_POST['submit'])) {

    include_once '../configs/database.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $initials = mysqli_real_escape_string($conn, $_POST['initials']);

    // INPUT VALIDATION
    // Emptyfields
    if (empty($firstname) || empty($lastname) || empty($email) ||
    empty($username) || empty($password) || empty($initials)) {

      header("Location: ../requestaccess_error.php?requestaccess=empty");
      exit();
    } else {
      //Check for invalid characters
        if (!preg_match("/^[a-zA-Z]*$/", $firstname)
        || !preg_match("/^[a-zA-Z]*$/", $lastname)) {

          header("Location: ../requestaccess.php?requestaccess=invalid");
          exit();
        } else {
          //Check for valid $email
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../requestaccess.php?requestaccess=email");
            exit();
          } else {
            //Check if username already exist using a prepared statement
            //Pulls all users with "user_id" that equals to entered $username
            //if mysqli_num_rows returns a number > 0, then exit
            //Template
            //TRIAL ----------------------------------------------
            $sqlC = "SELECT * FROM users WHERE user_initials=?";
            $stmtC = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmtC,$sqlC)) {
              echo "SQL FAILEDC";
            } else{
              mysqli_stmt_bind_param($stmtC, "s", $initials);
              mysqli_stmt_execute($stmtC);
              $resultC = mysqli_stmt_get_result($stmtC);
              $resultCheckC = mysqli_num_rows($resultC);

              if($resultCheckC > 0 ) {
                header("Location: ../requestaccess_error.php?requestaccess=initialsexist");
                exit();
              } else {
                //TRIAL ----------------------------------------------
                $sql = "SELECT * FROM users WHERE user_name=?";
                //Create Prepared statement
                $stmt = mysqli_stmt_init($conn);
                //Prepare prepared statement
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                  echo "SQL Statement Failed A";
                } else {
                  //Bind Parameters to the placeholders
                  mysqli_stmt_bind_param($stmt, "s", $username);
                  //Run statement with parameters inside database
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck > 0){
                    header("Location: ../requestaccess.php?requestaccess=userexist");
                    exit();
                  } else {
                    // PASSWORD HASHING
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    //Register User Prepared Statement
                    //Template
                    $sqlB = "INSERT INTO users (user_firstname, user_lastname, user_email, user_name, user_password, user_initials) VALUES ( ?, ?, ?, ?, ?, ?);";
                    //Create prepared STATEMENT
                    $stmtB = mysqli_stmt_init($conn);
                    //Prepare prepared statement
                    if(!mysqli_stmt_prepare($stmtB,$sqlB)){
                      echo "SQL Statement Failed A";
                    } else {
                      //Bind parameters to placeholders
                      mysqli_stmt_bind_param($stmtB, "ssssss", $firstname, $lastname, $email, $username, $hashedPassword, $initials);
                      //Run Statement with database Parameters
                      mysqli_stmt_execute($stmtB);
                      header("Location: ../requestaccess_error.php?requestaccess=success");
                      exit();
                    }
              }
            }
              }
            }
          }
        }
    }

} else {
  header("Location: ../requestaccess.php");
  exit();
}

 ?>
