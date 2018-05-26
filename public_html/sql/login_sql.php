<?php

session_start();

if (isset($_POST['submit'])) {

  include '../configs/database.php';

  $uid = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['password']);


  // VALIDATION
  // Check for empty Emptyfields
    if (empty($uid) || empty($pwd)) {
      header("Location: ../index.php?login=empty1");
      exit();
    } else {
      //Find is user exists using a prepared STATEMENT
      //Template
      $sql = "SELECT * FROM users WHERE user_name=? OR user_email=?";
      //Initialize statement
      $stmt = mysqli_stmt_init($conn);
      //Prepare initialized statement
      //Check if connection fails
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?login=error2");
        exit();
      } else {
        //Bind Parameters
        mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
        //Execute prepared statement
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        //if user doesn't exist else log user in
      if ($resultCheck < 1) {
        header("Location: ../index.php?login=error3");
        exit();
      } else {

          if ($row = mysqli_fetch_assoc($result)) {
              //Dehash password from database
              $hashedPasswordCheck = password_verify($pwd, $row['user_password']);
              if ($hashedPasswordCheck == false) {
                header("Location: ../index.php?login=errorA");
                exit();
              } elseif ($hashedPasswordCheck == true) {
                //Log in user
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_firstname'];
                $_SESSION['u_last'] = $row['user_lastname'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_uid'] = $row['user_name'];
                $_SESSION['u_permission'] = $row['user_permission'];
                header("Location: ../index.php?login=success");
                exit();
              }
            }
         }
      }
    }
} else {
    header("Location: ../index.php?login=error1");
    exit();
}

 ?>
