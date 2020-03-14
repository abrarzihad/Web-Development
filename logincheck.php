<?php

include('utube.php');



if (isset($_POST['submit'])) {
  
  $email          = $_POST['email'];
  $password       = $_POST['password'];
  $has_warning    = 0;

  //Form Validation Starts
    
    if(empty($email)) {

      $emailErr = "Email is required";
      $has_warning = 1;
      redirect_form($emailErr, 'warning');

    } else {

      $email = form_input($email);
      
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $has_warning = 1;
        redirect_form($emailErr, 'warning');
      }

    }

    if(empty($password)) {

      $passwordErr = "password is required";
      $has_warning = 1;
      redirect_form($passwordErr, 'warning');

    }else {

      // check if name only contains letters and whitespace
      if (!strlen($password) > 5) {
        $passwordErr = "At least 5 digits are required";
        $has_warning = 1;
        redirect_form($passwordErr, 'warning');
      }

    }

  
  //Form Validation Ends

  //DB Insert
    
    if($has_warning != 1) {

      $query          = "SELECT * FROM `regtable` WHERE email = '". $email . "';";
      
      $result         = mysqli_query($conn, $query);
      
      if(!$result) {
        die("User Added Failed. Please Try Again." . mysqli_error($conn));
      }

    }

    $message = "User Logged In Successfully.";

    while($row = mysqli_fetch_assoc($result)) {

     // if(password_verify($password, $row['password'])){
          if($password==$row['password'])
         redirect_form_index($message, $row['ID']);

      //}

    }

    $message = "User Not Found";
    redirect_form($message, "Warning");
  //DB Insert Ends

}

//Form Data Sanitize
function form_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function redirect_form($message, $type){

  $_SESSION['message']          = $message;
  $_SESSION['message_type']     = $type;
  //echo $message;
header('Location: https://www.facebook.com');
 die();
}

function redirect_form_index($message, $user_id){

  $_SESSION['message']          = $message;
  $_SESSION['user_id']          = $user_id;
  
  //echo $message;
  header('Location: Loginform.php');
die();
}


?>