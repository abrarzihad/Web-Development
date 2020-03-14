
<?php

include('utube.php');

if (isset($_POST['save_user'])) {
  
  $type           	 = $_POST['type'];
  $username          = $_POST['username'];
  $password          = $_POST['password'];
  $email 			       = $_POST['email'];
  $university        = $_POST['university'];
  $department        = $_POST['department'];
  $hscbatch          = $_POST['hscbatch'];
  $has_warning       = 0;

  

  //DB Insert
    /* disable autocommit */
    $conn->autocommit(FALSE);
    
    if($has_warning != 1) {

      $query          = "INSERT INTO `regtable`(type,username,password,email,university,department,hscbatch) VALUES ('$type','$username',$password,'$email','$university','$department','$hscbatch')";
      $result         = mysqli_query($conn, $query);
      
      if(!$result) {
        
        /* Rollback */
        $conn->rollback();

      die("User Added Failed. Please Try Again." . $result->error);
      }

    }

    /* commit insert */
    $conn->commit();

    $message = "User Added Successfully.";

    redirect_form($message, 'success');
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

  header('Location: index.php');

}

?>
